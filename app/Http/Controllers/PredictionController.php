<?php

namespace App\Http\Controllers;

use App\Models\Prediction;
use App\Services\LiverPredictionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    protected $predictionService;

    public function __construct(LiverPredictionService $predictionService)
    {
        $this->predictionService = $predictionService;
    }

    /**
     * Display a listing of predictions (Database/History page)
     */
    public function index()
    {
        $predictions = Auth::user()->predictions()->latest()->paginate(10);
        return view('prediction.index', compact('predictions'));
    }

    /**
     * Show the form for creating a new prediction
     */
    public function create()
    {
        return view('prediction.create');
    }

    /**
     * Store a newly created prediction using AI analysis
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'patient_name' => 'nullable|string|max:255',
            'age' => 'required|numeric|min:0|max:120',
            'gender' => 'required|in:male,female,0,1',
            'total_bilirubin' => 'required|numeric|min:0|max:50',
            'direct_bilirubin' => 'required|numeric|min:0|max:20',
            'alkaline_phosphotase' => 'required|numeric|min:0|max:1000',
            'alamine_aminotransferase' => 'required|numeric|min:0|max:1000',
            'aspartate_aminotransferase' => 'required|numeric|min:0|max:1000',
            'total_protiens' => 'required|numeric|min:0|max:15',
            'albumin' => 'required|numeric|min:0|max:10',
            'albumin_and_globulin_ratio' => 'required|numeric|min:0|max:5',
            'lab_report' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'ultrasound_image' => 'nullable|file|mimes:jpg,jpeg,png|max:20480',
        ]);

        // Format gender for the AI service
        $genderValue = in_array($validated['gender'], ['male', 1, '1']) ? 1 : 0;

        // Prepare data for AI prediction
        $aiData = [
            'age' => (float) $validated['age'],
            'gender' => $genderValue,
            'total_bilirubin' => (float) $validated['total_bilirubin'],
            'direct_bilirubin' => (float) $validated['direct_bilirubin'],
            'alkaline_phosphotase' => (float) $validated['alkaline_phosphotase'],
            'alt' => (float) $validated['alamine_aminotransferase'],
            'ast' => (float) $validated['aspartate_aminotransferase'],
            'total_proteins' => (float) $validated['total_protiens'],
            'albumin' => (float) $validated['albumin'],
            'albumin_globulin_ratio' => (float) $validated['albumin_and_globulin_ratio'],
        ];

        // Handle file uploads
        $labReportPath = null;
        if ($request->hasFile('lab_report')) {
            $labReportPath = $request->file('lab_report')->store('lab_reports', 'public');
        }

        $ultrasoundImagePath = null;
        if ($request->hasFile('ultrasound_image')) {
            $ultrasoundImagePath = $request->file('ultrasound_image')->store('ultrasound_images', 'public');
            
            // Optional: Also send to scan endpoint
            try {
                $scanResult = $this->sendToScanEndpoint($request->file('ultrasound_image'));
            } catch (\Exception $e) {
                // Log error but continue
                \Log::error('Scan failed: ' . $e->getMessage());
            }
        }

        // Get AI prediction from Python microservice
        try {
            $aiResult = $this->predictionService->predict($aiData);
            
            $riskScore = $aiResult['risk_percentage'] ?? 0;
            $riskLevel = ucfirst($aiResult['risk_level'] ?? 'Low');
            $recommendations = $this->getRecommendationsFromRisk($riskLevel);
            $scanRecommendation = $aiResult['scan_recommendation'] ?? null;
            
        } catch (\Exception $e) {
            // Fallback to local calculation if AI service is down
            \Log::error('AI Service error: ' . $e->getMessage());
            $riskScore = $this->calculateFallbackRisk($aiData);
            $riskLevel = $this->getRiskLevelFromScore($riskScore);
            $recommendations = $this->getRecommendationsFromRisk($riskLevel);
            $scanRecommendation = null;
        }

        // Save prediction to database
        $prediction = Prediction::create([
            'user_id' => Auth::id(),
            'patient_name' => $request->patient_name,
            'age' => $request->age,
            'bilirubin_total' => $request->total_bilirubin,
            'bilirubin_direct' => $request->direct_bilirubin,
            'alkaline_phosphatase' => $request->alkaline_phosphotase,
            'alanine_aminotransferase' => $request->alamine_aminotransferase,
            'aspartate_aminotransferase' => $request->aspartate_aminotransferase,
            'total_protein' => $request->total_protiens,
            'albumin' => $request->albumin,
            'risk_score' => $riskScore,
            'risk_level' => $riskLevel,
            'recommendations' => $recommendations,
            'prediction_details' => $aiResult ?? null,
            'lab_report_path' => $labReportPath,
            'ultrasound_image_path' => $ultrasoundImagePath,
        ]);

        return redirect()->route('prediction.results', $prediction)
            ->with('success', 'Analysis completed successfully!');
    }

    /**
     * Display the specified prediction results
     */
    public function results(Prediction $prediction)
    {
        if ($prediction->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('prediction.results', compact('prediction'));
    }

    /**
     * Display prediction history
     */
    public function history()
    {
        $predictions = Auth::user()->predictions()->latest()->paginate(10);
        return view('prediction.history', compact('predictions'));
    }

    /**
     * Export prediction results
     */
    public function export(Prediction $prediction)
    {
        if ($prediction->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $data = [
            'patient_name' => $prediction->patient_name,
            'age' => $prediction->age,
            'risk_score' => $prediction->risk_score,
            'risk_level' => $prediction->risk_level,
            'predictions' => $prediction->prediction_details,
            'recommendations' => $prediction->recommendations,
            'date' => $prediction->created_at->format('Y-m-d H:i:s'),
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified prediction
     */
    public function destroy(Prediction $prediction)
    {
        if ($prediction->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        if ($prediction->lab_report_path) {
            Storage::disk('public')->delete($prediction->lab_report_path);
        }
        if ($prediction->ultrasound_image_path) {
            Storage::disk('public')->delete($prediction->ultrasound_image_path);
        }
        
        $prediction->delete();
        
        return redirect()->route('prediction.history')
            ->with('success', 'Prediction deleted successfully!');
    }

    /**
     * Original predict method (AJAX endpoint)
     */
    public function predict(Request $request)
    {
        $validated = $request->validate([
            'age' => 'required|numeric',
            'gender' => 'required|integer', 
            'total_bilirubin' => 'required|numeric',
            'direct_bilirubin' => 'required|numeric',
            'alkaline_phosphotase' => 'required|numeric',
            'alamine_aminotransferase' => 'required|numeric',
            'aspartate_aminotransferase' => 'required|numeric',
            'total_protiens' => 'required|numeric',
            'albumin' => 'required|numeric',
            'albumin_and_globulin_ratio' => 'required|numeric',
        ]);

        try {
            $formattedData = $this->predictionService->formatInput($validated);
            $result = $this->predictionService->predict($formattedData);

            return response()->json([
                'success' => true,
                'has_disease' => $result['prediction'] ?? 0,
                'confidence' => $result['risk_percentage'] ?? 0,
                'risk_level' => $result['risk_level'] ?? 'low',
                'scan_recommendation' => $result['scan_recommendation'] ?? null,
                'inputs' => $validated
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Send image to scan endpoint
     */
    private function sendToScanEndpoint($image)
    {
        $pythonUrl = env('AI_PYTHON_URL', 'http://localhost:5000');
        
        $response = Http::attach(
            'image', file_get_contents($image->getRealPath()), $image->getClientOriginalName()
        )->post($pythonUrl . '/scan');
        
        return $response->json();
    }

    /**
     * Fallback risk calculation if AI service is down
     */
    private function calculateFallbackRisk(array $data): float
    {
        $riskScore = 0;
        
        // Bilirubin check
        if (($data['total_bilirubin'] ?? 0) > 1.2) $riskScore += 20;
        if (($data['direct_bilirubin'] ?? 0) > 0.3) $riskScore += 15;
        
        // Enzyme checks
        if (($data['alt'] ?? 0) > 56) $riskScore += 25;
        if (($data['ast'] ?? 0) > 40) $riskScore += 25;
        
        // Protein checks
        if (($data['total_proteins'] ?? 0) < 6.0) $riskScore += 10;
        if (($data['albumin'] ?? 0) < 3.5) $riskScore += 15;
        
        return min($riskScore, 100);
    }

    /**
     * Get risk level from score
     */
    private function getRiskLevelFromScore(float $score): string
    {
        if ($score <= 30) return 'Low';
        if ($score <= 70) return 'Moderate';
        return 'High';
    }

    /**
     * Get recommendations based on risk level
     */
    private function getRecommendationsFromRisk(string $riskLevel): array
    {
        return match($riskLevel) {
            'Low' => [
                'Regular monitoring every 6-12 months',
                'Maintain a healthy diet and lifestyle',
                'Limit alcohol consumption',
                'Exercise regularly',
                'Get vaccinated against hepatitis A and B',
            ],
            'Moderate' => [
                'Consult with a hepatologist within 2-4 weeks',
                'Repeat liver function tests in 3 months',
                'Consider liver ultrasound',
                'Avoid alcohol and hepatotoxic medications',
                'Evaluate for underlying liver disease risk factors',
            ],
            'High' => [
                'Seek immediate medical attention',
                'Schedule urgent consultation with a hepatologist',
                'Complete liver panel with additional testing',
                'Consider liver imaging (ultrasound/CT/MRI)',
                'Avoid all hepatotoxic substances including alcohol',
                'Monitor for signs of liver failure',
            ],
            default => ['Please consult with a healthcare provider for more information.']
        };
    }
}