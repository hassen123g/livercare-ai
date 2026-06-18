<?php

namespace App\Http\Controllers;

use App\Models\Prediction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Remove the __construct() method entirely
    
    public function index()
    {
        $user = Auth::user();
        
        $recentPredictions = Prediction::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();
        
        $totalPredictions = Prediction::where('user_id', $user->id)->count();
        $highRiskCount = Prediction::where('user_id', $user->id)
            ->where('risk_level', 'High')
            ->count();
        $averageRiskScore = Prediction::where('user_id', $user->id)
            ->avg('risk_score') ?? 0;
        
        $riskDistribution = [
            'Low' => Prediction::where('user_id', $user->id)->where('risk_level', 'Low')->count(),
            'Moderate' => Prediction::where('user_id', $user->id)->where('risk_level', 'Moderate')->count(),
            'High' => Prediction::where('user_id', $user->id)->where('risk_level', 'High')->count(),
        ];
        
        $monthlyTrends = Prediction::where('user_id', $user->id)
            ->where('created_at', '>=', now()->subMonths(6))
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        
        $stats = [
            'total_predictions' => $totalPredictions,
            'high_risk_count' => $highRiskCount,
            'average_risk_score' => round($averageRiskScore, 1),
            'low_risk_percentage' => $totalPredictions > 0 ? round(($riskDistribution['Low'] / $totalPredictions) * 100) : 0,
        ];
        
        return view('dashboard.index', compact('recentPredictions', 'stats', 'riskDistribution', 'monthlyTrends'));
    }
}