<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Prediction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPredictions = Prediction::count();
        $highRiskCount = Prediction::where('risk_level', 'High')->count();
        $avgRiskScore = Prediction::avg('risk_score') ?? 0;
        
        $recentPredictions = Prediction::with('user')->latest()->take(10)->get();
        $recentUsers = User::latest()->take(5)->get();
        
        // Stats for charts
        $riskDistribution = [
            'Low' => Prediction::where('risk_level', 'Low')->count(),
            'Moderate' => Prediction::where('risk_level', 'Moderate')->count(),
            'High' => $highRiskCount,
        ];
        
        $monthlyPredictions = Prediction::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        
        return view('admin.dashboard', compact(
            'totalUsers', 'totalPredictions', 'highRiskCount', 'avgRiskScore',
            'recentPredictions', 'recentUsers', 'riskDistribution', 'monthlyPredictions'
        ));
    }
}