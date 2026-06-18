<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LiverPredictionService
{
    /**
     * URL of the Python AI microservice
     */
    protected $aiUrl;

    public function __construct()
    {
        $this->aiUrl = env('AI_PYTHON_URL', 'http://localhost:5000');
    }

    /**
     * Execute the AI model prediction via HTTP
     *
     * @param array $data Ordered array of features or associative array
     * @return array
     * @throws \Exception
     */
    public function predict(array $data): array
    {
        // Check if data is associative (has keys) or indexed
        if (array_keys($data) !== range(0, count($data) - 1)) {
            // Associative array - convert to indexed in correct order
            $data = $this->formatInput($data);
        }

        try {
            $response = Http::timeout(30)->post($this->aiUrl . '/predict', [
                'age' => $data[0],
                'gender' => $data[1],
                'total_bilirubin' => $data[2],
                'direct_bilirubin' => $data[3],
                'alkaline_phosphotase' => $data[4],
                'alt' => $data[5],
                'ast' => $data[6],
                'total_proteins' => $data[7],
                'albumin' => $data[8],
                'albumin_globulin_ratio' => $data[9],
            ]);

            if ($response->successful()) {
                return $response->json();
            }
            
            throw new \Exception('AI service returned error: ' . $response->status());

        } catch (\Exception $e) {
            Log::error("AI Service Error", [
                'error' => $e->getMessage(),
                'url' => $this->aiUrl
            ]);
            
            // Return fallback calculation
            return $this->fallbackPrediction($data);
        }
    }

    /**
     * Fallback prediction when AI service is unavailable
     */
    private function fallbackPrediction(array $data): array
    {
        $riskScore = 0;
        
        // Simple rule-based fallback
        if (($data[2] ?? 0) > 1.2) $riskScore += 20; // Total bilirubin
        if (($data[3] ?? 0) > 0.3) $riskScore += 15; // Direct bilirubin
        if (($data[5] ?? 0) > 56) $riskScore += 25;  // ALT
        if (($data[6] ?? 0) > 40) $riskScore += 25;  // AST
        if (($data[8] ?? 0) < 3.5) $riskScore += 15; // Albumin
        
        $riskScore = min($riskScore, 100);
        
        return [
            'prediction' => $riskScore > 50 ? 1 : 0,
            'risk_percentage' => $riskScore,
            'risk_level' => $this->getRiskLevel($riskScore),
            'probabilities' => [
                'healthy' => round((100 - $riskScore) / 100, 4),
                'disease' => round($riskScore / 100, 4)
            ],
            'scan_recommendation' => $this->getScanRecommendation($riskScore),
            'source' => 'fallback'
        ];
    }

    private function getRiskLevel(float $score): string
    {
        if ($score >= 65) return 'high';
        if ($score >= 40) return 'medium';
        return 'low';
    }

    private function getScanRecommendation(float $score): array
    {
        if ($score >= 65) {
            return [
                'recommend' => true,
                'urgency' => 'urgent',
                'reason_en' => 'High risk detected. Liver scan required.',
                'reason_ar' => 'تم اكتشاف خطورة عالية. يُنصح بعمل أشعة على الكبد.'
            ];
        } elseif ($score >= 40) {
            return [
                'recommend' => true,
                'urgency' => 'advised',
                'reason_en' => 'Borderline indicators detected. Scan advised.',
                'reason_ar' => 'توجد مؤشرات غير واضحة — يُنصح بالأشعة.'
            ];
        }
        
        return [
            'recommend' => false,
            'urgency' => 'none',
            'reason_en' => 'Low risk. No immediate scan required.',
            'reason_ar' => 'المؤشرات منخفضة — لا يوجد ما يستدعي الأشعة حالياً.'
        ];
    }

    /**
     * Format input to the 10 features expected by the AI model
     */
    public function formatInput(array $validated): array
    {
        // Check if already in correct format
        if (array_keys($validated) === range(0, count($validated) - 1)) {
            return $validated;
        }
        
        return [
            (float) ($validated['age'] ?? 0),
            (int) ($validated['gender'] ?? 0),
            (float) ($validated['total_bilirubin'] ?? 0),
            (float) ($validated['direct_bilirubin'] ?? 0),
            (float) ($validated['alkaline_phosphotase'] ?? 0),
            (float) ($validated['alamine_aminotransferase'] ?? 0),
            (float) ($validated['aspartate_aminotransferase'] ?? 0),
            (float) ($validated['total_protiens'] ?? 0),
            (float) ($validated['albumin'] ?? 0),
            (float) ($validated['albumin_and_globulin_ratio'] ?? 0),
        ];
    }
}