<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prediction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display the reports management page.
     */
    public function index(Request $request)
    {
        // Get filter parameters
        $type = $request->get('type', 'all');
        $status = $request->get('status', 'all');
        $period = $request->get('period', 'all');
        $search = $request->get('search', '');

        // Build query for reports (using predictions as base data)
        $query = Prediction::query()->with('user');

        // Apply filters
        if ($type !== 'all') {
            // In a real app, you'd have a 'report_type' column; here we map from risk_level or add logic
            if ($type === 'clinical') {
                $query->whereNotNull('risk_level');
            } elseif ($type === 'analytics') {
                $query->whereNotNull('risk_score');
            }
        }

        if ($status !== 'all') {
            // Example: status could be 'completed', 'processing', 'pending'
            // You may need a 'status' column in predictions table
            $query->where('status', $status);
        }

        if ($period !== 'all') {
            if ($period === 'today') {
                $query->whereDate('created_at', today());
            } elseif ($period === 'week') {
                $query->where('created_at', '>=', now()->subDays(7));
            } elseif ($period === 'month') {
                $query->where('created_at', '>=', now()->subDays(30));
            }
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('patient_name', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function($uq) use ($search) {
                      $uq->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Paginate results
        $reports = $query->latest()->paginate(15);

        // Prepare statistics for the dashboard
        $totalReports = Prediction::count();
        $clinicalReports = Prediction::whereNotNull('risk_level')->count();
        $analyticsReports = Prediction::whereNotNull('risk_score')->count();
        $researchReports = Prediction::whereNotNull('prediction_details')->count();
        $auditReports = 0; // Placeholder if no audit table

        $aiReports = Prediction::whereNotNull('prediction_details')->count();
        $thisMonthReports = Prediction::whereMonth('created_at', now()->month)->count();
        $scheduledReports = 0; // Placeholder if scheduling exists

        $stats = [
            'total' => $totalReports,
            'clinical' => $clinicalReports,
            'analytics' => $analyticsReports,
            'research' => $researchReports,
            'audit' => $auditReports,
            'ai' => $aiReports,
            'this_month' => $thisMonthReports,
            'scheduled' => $scheduledReports,
        ];

        return view('admin.reports', compact('reports', 'stats'));
    }

    /**
     * Generate a report (AJAX endpoint)
     */
    public function generate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'date_range' => 'string',
            'format' => 'string',
        ]);

        // Simulate report generation
        // In real app, you would queue a job to generate report and store it

        $reportId = 'REP-' . now()->format('Ymd') . '-' . rand(1000, 9999);

        // Store report metadata in database (you'd need a reports table)

        return response()->json([
            'success' => true,
            'message' => 'Report generated successfully',
            'report_id' => $reportId,
            'report_name' => $request->name,
        ]);
    }

    /**
     * Export all reports data (JSON/CSV)
     */
    public function exportAll(Request $request)
    {
        $format = $request->get('format', 'json');
        $reports = Prediction::with('user')->latest()->get();

        $data = $reports->map(function($report) {
            return [
                'id' => $report->id,
                'patient_name' => $report->patient_name,
                'age' => $report->age,
                'risk_score' => $report->risk_score,
                'risk_level' => $report->risk_level,
                'created_at' => $report->created_at->toDateTimeString(),
                'user_name' => $report->user->name ?? null,
                'user_email' => $report->user->email ?? null,
            ];
        });

        if ($format === 'csv') {
            $csv = $this->arrayToCsv($data->toArray());
            return response($csv, 200, [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="livercare-reports.csv"',
            ]);
        }

        return response()->json($data);
    }

    /**
     * Helper to convert array to CSV string
     */
    private function arrayToCsv(array $data)
    {
        if (empty($data)) return '';
        $output = fopen('php://temp', 'r+');
        fputcsv($output, array_keys($data[0]));
        foreach ($data as $row) {
            fputcsv($output, $row);
        }
        rewind($output);
        $csv = stream_get_contents($output);
        fclose($output);
        return $csv;
    }

    /**
     * Download a specific report by ID
     */
    public function download($id)
    {
        $report = Prediction::findOrFail($id);
        $data = [
            'report_id' => $report->id,
            'patient_name' => $report->patient_name,
            'risk_score' => $report->risk_score,
            'risk_level' => $report->risk_level,
            'recommendations' => $report->recommendations,
            'generated_at' => $report->created_at->toDateTimeString(),
        ];
        return response()->json($data);
    }

    /**
     * Delete a report
     */
    public function destroy($id)
    {
        $report = Prediction::findOrFail($id);
        $report->delete();
        return redirect()->route('admin.reports')->with('success', 'Report deleted successfully');
    }
}