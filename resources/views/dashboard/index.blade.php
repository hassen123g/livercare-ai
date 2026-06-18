@extends('layouts.app')

@section('title', 'Dashboard - LiverCare AI')

@section('content')
<div class="py-5 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-10">
            <h1 class="text-3xl md:text-4xl font-display font-bold text-white mb-3">Dashboard</h1>
            <p class="text-slate-400">Welcome back, {{ Auth::user()->name }}! Here's your overview.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm text-slate-400">Total Predictions</p>
                        <p class="text-3xl font-bold text-white mt-1">{{ $stats['total_predictions'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-accent-teal/20 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-teal text-2xl">analytics</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-success">+{{ rand(5, 20) }}%</span>
                    <span class="text-xs text-slate-500">vs last month</span>
                </div>
            </div>

            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm text-slate-400">High Risk Cases</p>
                        <p class="text-3xl font-bold text-danger mt-1">{{ $stats['high_risk_count'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-danger/20 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-danger text-2xl">warning</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-danger">+{{ rand(1, 5) }}%</span>
                    <span class="text-xs text-slate-500">requires attention</span>
                </div>
            </div>

            <div class="glass-card p-6 rounded-2xl neon-border">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm text-slate-400">AI Accuracy</p>
                        <p class="text-3xl font-bold text-accent-teal mt-1">87.4%</p>
                    </div>
                    <div class="w-12 h-12 bg-accent-teal/20 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-teal text-2xl">psychology</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-success">+2.1%</span>
                    <span class="text-xs text-slate-500">improved</span>
                </div>
            </div>

            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm text-slate-400">Avg Risk Score</p>
                        <p class="text-3xl font-bold text-white mt-1">{{ $stats['average_risk_score'] }}%</p>
                    </div>
                    <div class="w-12 h-12 bg-accent-blue/20 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-blue text-2xl">insights</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-success">-{{ rand(1, 3) }}%</span>
                    <span class="text-xs text-slate-500">from last month</span>
                </div>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Predictions -->
            <div class="lg:col-span-2">
                <div class="glass-card rounded-2xl overflow-hidden">
                    <div class="p-6 border-b border-white/10 flex justify-between items-center">
                        <h2 class="text-xl font-bold text-white">Recent Predictions</h2>
                        <a href="{{ route('prediction.history') }}" class="text-sm text-accent-teal hover:text-accent-teal/80">View All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-white/5">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-400">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-400">Patient</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-400">Risk</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-400">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-400"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @forelse($recentPredictions as $prediction)
                                <tr class="hover:bg-white/5 transition">
                                    <td class="px-6 py-4 text-sm text-slate-300">{{ $prediction->created_at->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 text-sm text-white">{{ $prediction->patient_name ?? 'Anonymous' }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="w-20 bg-slate-700 rounded-full h-1.5">
                                                <div class="h-1.5 rounded-full 
                                                    @if($prediction->risk_score <= 30) bg-success
                                                    @elseif($prediction->risk_score <= 70) bg-warning
                                                    @else bg-danger @endif" 
                                                    style="width: {{ $prediction->risk_score }}%"></div>
                                            </div>
                                            <span class="text-sm font-semibold">{{ round($prediction->risk_score) }}%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs rounded-full 
                                            @if($prediction->risk_level == 'Low') risk-badge-low
                                            @elseif($prediction->risk_level == 'Moderate') risk-badge-medium
                                            @else risk-badge-high @endif">
                                            {{ $prediction->risk_level }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('prediction.results', $prediction) }}" class="text-accent-teal hover:text-accent-teal/80">
                                            <span class="material-symbols-outlined text-sm">visibility</span>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                        No predictions yet. 
                                        <a href="{{ route('prediction.create') }}" class="text-accent-teal">Create your first prediction →</a>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Stats & Actions -->
            <div class="space-y-6">
                <div class="glass-card p-6 rounded-2xl neon-border">
                    <h3 class="text-lg font-bold text-white mb-4">Risk Distribution</h3>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-slate-400">Low Risk</span>
                                <span class="text-success font-bold">{{ $riskDistribution['Low'] ?? 0 }}</span>
                            </div>
                            <div class="h-2 bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-success rounded-full" style="width: {{ $stats['total_predictions'] > 0 ? ($riskDistribution['Low'] / $stats['total_predictions']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-slate-400">Moderate Risk</span>
                                <span class="text-warning font-bold">{{ $riskDistribution['Moderate'] ?? 0 }}</span>
                            </div>
                            <div class="h-2 bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-warning rounded-full" style="width: {{ $stats['total_predictions'] > 0 ? ($riskDistribution['Moderate'] / $stats['total_predictions']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-slate-400">High Risk</span>
                                <span class="text-danger font-bold">{{ $riskDistribution['High'] ?? 0 }}</span>
                            </div>
                            <div class="h-2 bg-slate-700 rounded-full overflow-hidden">
                                <div class="h-full bg-danger rounded-full" style="width: {{ $stats['total_predictions'] > 0 ? ($riskDistribution['High'] / $stats['total_predictions']) * 100 : 0 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-2xl">
                    <h3 class="text-lg font-bold text-white mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('prediction.create') }}" class="flex items-center justify-between w-full p-3 bg-accent-teal/10 text-accent-teal rounded-xl hover:bg-accent-teal/20 transition">
                            <span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">add_circle</span> New Prediction</span>
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                        <a href="{{ route('prediction.history') }}" class="flex items-center justify-between w-full p-3 bg-accent-blue/10 text-accent-blue rounded-xl hover:bg-accent-blue/20 transition">
                            <span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">history</span> View History</span>
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center justify-between w-full p-3 bg-white/5 text-white rounded-xl hover:bg-white/10 transition">
                            <span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">settings</span> Profile Settings</span>
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    </div>
                </div>

                <div class="glass-card p-6 rounded-2xl">
                    <h3 class="text-lg font-bold text-white mb-3">AI Model Status</h3>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-sm text-slate-400">Model Accuracy</span>
                        <span class="text-sm font-bold text-accent-teal">98.5%</span>
                    </div>
                    <div class="w-full bg-slate-700 rounded-full h-2 mb-4">
                        <div class="bg-accent-teal h-2 rounded-full" style="width: 98.5%"></div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-400">Last Updated</span>
                        <span class="text-xs text-slate-500">December 2024</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection