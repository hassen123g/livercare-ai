@extends('layouts.admin')

@section('title', 'System Dashboard | LiverCare AI')

@section('sidebar-extra')
    <p class="text-xs text-slate-500 mb-2">Quick Actions</p>
    <a href="{{ route('admin.reports') }}" class="w-full p-3 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center gap-2 justify-center hover:bg-accent-teal/20 transition-colors">
        <span class="material-symbols-outlined text-sm">add</span>
        New Report
    </a>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div>
                <h1 class="text-3xl font-display font-bold text-white mb-2">System Dashboard</h1>
                <p class="text-slate-400">Real-time monitoring and analytics for LiverCare AI platform</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm text-slate-400">Last updated:</span>
                <span class="text-sm text-accent-teal font-medium" id="lastUpdated">Just now</span>
                <button id="refreshBtn" class="p-2 text-slate-400 hover:text-accent-teal hover:rotate-180 transition-all duration-300">
                    <span class="material-symbols-outlined">refresh</span>
                </button>
            </div>
        </div>
    </div>

    <!-- KPI Stats Grid -->
    <div class="mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="glass-card p-6 rounded-2xl stat-card">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-slate-400">Total Users</p>
                        <h3 class="text-3xl font-bold text-white mt-2" id="totalUsers">{{ $totalUsers ?? 1842 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-accent-teal/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-teal">group</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-success flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        +12.5%
                    </span>
                    <span class="text-sm text-slate-400">vs last month</span>
                </div>
            </div>
            <div class="glass-card p-6 rounded-2xl stat-card">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-slate-400">Total Cases</p>
                        <h3 class="text-3xl font-bold text-white mt-2" id="totalCases">{{ $totalCases ?? 24817 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-accent-blue/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-blue">folder</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-success flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        +8.3%
                    </span>
                    <span class="text-sm text-slate-400">vs last week</span>
                </div>
            </div>
            <div class="glass-card p-6 rounded-2xl stat-card neon-border">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-slate-400">AI Model Accuracy</p>
                        <h3 class="text-3xl font-bold text-white mt-2" id="aiAccuracy">87.4%</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-success/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-success">psychology</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-success flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        +2.1%
                    </span>
                    <span class="text-sm text-slate-400">improved this month</span>
                </div>
            </div>
            <div class="glass-card p-6 rounded-2xl stat-card">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-slate-400">System Uptime</p>
                        <h3 class="text-3xl font-bold text-white mt-2" id="systemUptime">99.9%</h3>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-info/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-info">monitor_heart</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-success">All systems normal</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Risk Distribution & Case Progress -->
    <div class="mb-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Risk Distribution</h3>
                    <div class="flex gap-2">
                        <button class="text-xs px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full">Weekly</button>
                        <button class="text-xs px-3 py-1 bg-white/5 text-slate-400 rounded-full">Monthly</button>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="riskDistributionChart"></canvas>
                </div>
                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div class="text-center p-3 rounded-xl bg-danger/10">
                        <div class="text-2xl font-bold text-danger" id="highRiskCount">{{ $highRiskCount ?? 824 }}</div>
                        <div class="text-sm text-slate-400">High Risk</div>
                    </div>
                    <div class="text-center p-3 rounded-xl bg-warning/10">
                        <div class="text-2xl font-bold text-warning" id="mediumRiskCount">{{ $mediumRiskCount ?? 4217 }}</div>
                        <div class="text-sm text-slate-400">Medium Risk</div>
                    </div>
                    <div class="text-center p-3 rounded-xl bg-success/10">
                        <div class="text-2xl font-bold text-success" id="lowRiskCount">{{ $lowRiskCount ?? 19776 }}</div>
                        <div class="text-sm text-slate-400">Low Risk</div>
                    </div>
                </div>
            </div>

            <div class="glass-card p-6 rounded-2xl neon-border">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Case Progress Overview</h3>
                    <div class="text-accent-teal text-sm font-medium">
                        <span class="material-symbols-outlined align-middle text-sm">trending_up</span>
                        Overall +15%
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-slate-300">Treatment Success Rate</span>
                            <span class="font-bold text-success">76%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="h-full bg-success rounded-full" style="width: 76%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-slate-300">Early Detection Rate</span>
                            <span class="font-bold text-accent-teal">68%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="h-full bg-accent-teal rounded-full" style="width: 68%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-slate-300">Patient Follow-up Rate</span>
                            <span class="font-bold text-accent-blue">82%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="h-full bg-accent-blue rounded-full" style="width: 82%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-2">
                            <span class="text-slate-300">AI Prediction Accuracy</span>
                            <span class="font-bold text-success">87%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="h-full bg-success rounded-full" style="width: 87%"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 grid grid-cols-2 gap-4">
                    <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                        <div class="text-2xl font-bold text-white mb-1" id="improvedCases">{{ $improvedCases ?? 3842 }}</div>
                        <div class="text-sm text-slate-400">Improved Cases</div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                        <div class="text-2xl font-bold text-white mb-1" id="stableCases">{{ $stableCases ?? 18492 }}</div>
                        <div class="text-sm text-slate-400">Stable Cases</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics & Trends -->
    <div class="mb-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">User Growth Trend</h3>
                    <div class="text-success text-sm font-medium">
                        <span class="material-symbols-outlined align-middle text-sm">trending_up</span>
                        +24% growth
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="userGrowthChart"></canvas>
                </div>
                <div class="mt-4 text-center">
                    <p class="text-sm text-slate-400">Total active users: <span class="text-accent-teal font-bold" id="totalActiveUsers">{{ $totalActiveUsers ?? 1842 }}</span></p>
                </div>
            </div>

            <div class="glass-card p-6 rounded-2xl neon-border">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Case Analysis</h3>
                    <div class="text-xs px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full">Real-time</div>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="p-4 rounded-xl bg-deep-navy/50">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-lg bg-accent-teal/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-accent-teal">add_circle</span>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-white" id="newCasesToday">{{ $newCasesToday ?? 142 }}</div>
                                <div class="text-sm text-slate-400">New Cases Today</div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 rounded-xl bg-deep-navy/50">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-lg bg-success/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-success">check_circle</span>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-white" id="resolvedCases">{{ $resolvedCases ?? 89 }}</div>
                                <div class="text-sm text-slate-400">Resolved Today</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Hepatitis B Cases</span>
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-white">1,248</span>
                            <span class="text-xs px-2 py-1 bg-success/10 text-success rounded-full">-3%</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Hepatitis C Cases</span>
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-white">3,672</span>
                            <span class="text-xs px-2 py-1 bg-danger/10 text-danger rounded-full">+7%</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Liver Cirrhosis</span>
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-white">2,891</span>
                            <span class="text-xs px-2 py-1 bg-warning/10 text-warning rounded-full">+2%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- System Performance & Recent Activity -->
    <div class="mb-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="glass-card p-6 rounded-2xl lg:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">System Performance</h3>
                    <div class="flex gap-2">
                        <button class="text-xs px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full">CPU</button>
                        <button class="text-xs px-3 py-1 bg-white/5 text-slate-400 rounded-full">Memory</button>
                        <button class="text-xs px-3 py-1 bg-white/5 text-slate-400 rounded-full">Storage</button>
                    </div>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                        <div class="text-2xl font-bold text-white mb-1" id="cpuUsage">42%</div>
                        <div class="text-sm text-slate-400">CPU Usage</div>
                        <div class="h-2 mt-2 bg-deep-navy rounded-full overflow-hidden">
                            <div class="h-full bg-accent-teal rounded-full" style="width: 42%"></div>
                        </div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                        <div class="text-2xl font-bold text-white mb-1" id="memoryUsage">68%</div>
                        <div class="text-sm text-slate-400">Memory</div>
                        <div class="h-2 mt-2 bg-deep-navy rounded-full overflow-hidden">
                            <div class="h-full bg-accent-blue rounded-full" style="width: 68%"></div>
                        </div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                        <div class="text-2xl font-bold text-white mb-1" id="storageUsage">34%</div>
                        <div class="text-sm text-slate-400">Storage</div>
                        <div class="h-2 mt-2 bg-deep-navy rounded-full overflow-hidden">
                            <div class="h-full bg-success rounded-full" style="width: 34%"></div>
                        </div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                        <div class="text-2xl font-bold text-white mb-1" id="responseTime">124ms</div>
                        <div class="text-sm text-slate-400">Avg. Response</div>
                        <div class="h-2 mt-2 bg-deep-navy rounded-full overflow-hidden">
                            <div class="h-full bg-success rounded-full" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="performanceChart"></canvas>
                </div>
            </div>

            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Recent Activity</h3>
                    <button class="text-xs text-accent-teal hover:text-accent-teal/80">View All</button>
                </div>
                <div class="space-y-4 max-h-[400px] overflow-y-auto pr-2">
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-deep-navy/50">
                        <div class="w-8 h-8 rounded-lg bg-accent-teal/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-accent-teal text-sm">person_add</span>
                        </div>
                        <div>
                            <p class="text-sm text-white">New user registered: Dr. Sarah Chen</p>
                            <p class="text-xs text-slate-400">2 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-deep-navy/50">
                        <div class="w-8 h-8 rounded-lg bg-success/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-success text-sm">check_circle</span>
                        </div>
                        <div>
                            <p class="text-sm text-white">Case #LC-2024-891 resolved successfully</p>
                            <p class="text-xs text-slate-400">15 minutes ago</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-deep-navy/50">
                        <div class="w-8 h-8 rounded-lg bg-warning/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-warning text-sm">warning</span>
                        </div>
                        <div>
                            <p class="text-sm text-white">High risk detected in case #LC-2024-924</p>
                            <p class="text-xs text-slate-400">1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-deep-navy/50">
                        <div class="w-8 h-8 rounded-lg bg-accent-blue/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-accent-blue text-sm">update</span>
                        </div>
                        <div>
                            <p class="text-sm text-white">System backup completed successfully</p>
                            <p class="text-xs text-slate-400">3 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-deep-navy/50">
                        <div class="w-8 h-8 rounded-lg bg-info/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-info text-sm">analytics</span>
                        </div>
                        <div>
                            <p class="text-sm text-white">Monthly analytics report generated</p>
                            <p class="text-xs text-slate-400">5 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats & Export -->
    <div class="max-w-7xl mx-auto">
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-6">
                <div>
                    <h3 class="text-xl font-bold text-white mb-2">Platform Summary</h3>
                    <p class="text-slate-400">Comprehensive overview of LiverCare AI platform performance</p>
                </div>
                <div class="flex gap-3">
                    <button class="px-6 py-3 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center gap-2 hover:bg-accent-teal/20">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Export Report
                    </button>
                    <button class="px-6 py-3 bg-accent-teal text-deep-navy font-bold rounded-xl flex items-center gap-2 hover:bg-accent-teal/90">
                        <span class="material-symbols-outlined text-sm">print</span>
                        Print Summary
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                    <div class="text-lg font-bold text-white mb-1">24/7</div>
                    <div class="text-sm text-slate-400">Uptime</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                    <div class="text-lg font-bold text-white mb-1">99.95%</div>
                    <div class="text-sm text-slate-400">Accuracy Rate</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                    <div class="text-lg font-bold text-white mb-1">142</div>
                    <div class="text-sm text-slate-400">Active Sessions</div>
                </div>
                <div class="text-center p-4 rounded-xl bg-deep-navy/50">
                    <div class="text-lg font-bold text-white mb-1">18</div>
                    <div class="text-sm text-slate-400">Countries</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Risk Distribution Chart
    new Chart(document.getElementById('riskDistributionChart'), {
        type: 'doughnut',
        data: {
            labels: ['High Risk', 'Medium Risk', 'Low Risk'],
            datasets: [{
                data: [{{ $highRiskCount ?? 824 }}, {{ $mediumRiskCount ?? 4217 }}, {{ $lowRiskCount ?? 19776 }}],
                backgroundColor: ['rgba(239,68,68,0.8)', 'rgba(245,158,11,0.8)', 'rgba(16,185,129,0.8)'],
                borderWidth: 0
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, cutout: '70%', plugins: { legend: { position: 'bottom', labels: { color: '#94a3b8' } } } }
    });

    // User Growth Chart
    new Chart(document.getElementById('userGrowthChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Active Users', data: [1200, 1350, 1420, 1520, 1650, 1780, {{ $totalActiveUsers ?? 1842 }}],
                borderColor: '#14B8A6', backgroundColor: 'rgba(20,184,166,0.1)', fill: true, tension: 0.4, borderWidth: 2
            }]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true, grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#94a3b8' } }, x: { grid: { display: false }, ticks: { color: '#94a3b8' } } } }
    });

    // Performance Chart
    new Chart(document.getElementById('performanceChart'), {
        type: 'line',
        data: {
            labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00', '00:00'],
            datasets: [
                { label: 'CPU Usage', data: [45, 52, 48, 60, 55, 58, 50], borderColor: '#14B8A6', backgroundColor: 'rgba(20,184,166,0.1)', fill: true, tension: 0.4, borderWidth: 2 },
                { label: 'Memory Usage', data: [65, 68, 72, 70, 65, 68, 64], borderColor: '#3B82F6', backgroundColor: 'rgba(59,130,246,0.1)', fill: true, tension: 0.4, borderWidth: 2 }
            ]
        },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { labels: { color: '#94a3b8' } } }, scales: { y: { beginAtZero: true, max: 100, grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#94a3b8' } }, x: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#94a3b8' } } } }
    });

    // Refresh button simulation
    const refreshBtn = document.getElementById('refreshBtn');
    const lastUpdatedSpan = document.getElementById('lastUpdated');
    function updateDashboardData() {
        lastUpdatedSpan.textContent = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        // Simulate small random changes
        document.getElementById('totalUsers').innerText = ({{ $totalUsers ?? 1842 }} + Math.floor(Math.random() * 10)).toLocaleString();
        document.getElementById('totalCases').innerText = ({{ $totalCases ?? 24817 }} + Math.floor(Math.random() * 50)).toLocaleString();
        document.getElementById('newCasesToday').innerText = ({{ $newCasesToday ?? 142 }} + Math.floor(Math.random() * 5)).toString();
        document.getElementById('resolvedCases').innerText = ({{ $resolvedCases ?? 89 }} + Math.floor(Math.random() * 3)).toString();
        document.getElementById('improvedCases').innerText = ({{ $improvedCases ?? 3842 }} + Math.floor(Math.random() * 20)).toLocaleString();
        document.getElementById('stableCases').innerText = ({{ $stableCases ?? 18492 }} + Math.floor(Math.random() * 30)).toLocaleString();
        document.getElementById('highRiskCount').innerText = ({{ $highRiskCount ?? 824 }} + Math.floor(Math.random() * 5)).toLocaleString();
        document.getElementById('mediumRiskCount').innerText = ({{ $mediumRiskCount ?? 4217 }} + Math.floor(Math.random() * 20)).toLocaleString();
        document.getElementById('lowRiskCount').innerText = ({{ $lowRiskCount ?? 19776 }} + Math.floor(Math.random() * 40)).toLocaleString();
        document.getElementById('cpuUsage').innerText = (42 + Math.floor(Math.random() * 10)) + '%';
        document.getElementById('memoryUsage').innerText = (68 + Math.floor(Math.random() * 5)) + '%';
        document.getElementById('storageUsage').innerText = (34 + Math.floor(Math.random() * 2)) + '%';
        document.getElementById('responseTime').innerText = (124 + Math.floor(Math.random() * 10)) + 'ms';
        document.getElementById('aiAccuracy').innerText = (87.4 + (Math.random() - 0.5) * 0.2).toFixed(1) + '%';
    }
    refreshBtn.addEventListener('click', function() { this.classList.add('rotate-180'); updateDashboardData(); setTimeout(() => this.classList.remove('rotate-180'), 300); });
    setInterval(updateDashboardData, 30000);
});
</script>
@endpush