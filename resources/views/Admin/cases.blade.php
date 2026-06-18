@extends('layouts.admin')

@section('title', 'Cases Management | LiverCare AI Dashboard')

@section('sidebar-extra')
    <p class="text-xs text-slate-500 mb-2">Case Management</p>
    <button id="addCaseBtn" class="w-full p-3 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center gap-2 justify-center hover:bg-accent-teal/20 transition-colors">
        <span class="material-symbols-outlined text-sm">add_circle</span>
        New Case
    </button>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div>
                <h1 class="text-3xl font-display font-bold text-white mb-2">Cases Management</h1>
                <p class="text-slate-400">Manage, track, and analyze all patient cases with AI insights</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <input type="text" id="searchCases" placeholder="Search cases..." class="pl-10 pr-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-accent-teal">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"><span class="material-symbols-outlined text-sm">search</span></span>
                </div>
                <button id="addCaseBtnContent" class="px-4 py-2 bg-accent-teal text-deep-navy font-bold rounded-xl flex items-center gap-2 hover:bg-accent-teal/90">
                    <span class="material-symbols-outlined text-sm">add_circle</span>
                    New Case
                </button>
                <button id="quickAnalysis" class="px-4 py-2 bg-white/10 text-white font-bold rounded-xl flex items-center gap-2 hover:bg-white/20">
                    <span class="material-symbols-outlined text-sm">psychology</span>
                    AI Analysis
                </button>
            </div>
        </div>
    </div>

    <!-- Cases Overview Stats -->
    <div class="mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex justify-between items-start">
                    <div><p class="text-sm text-slate-400">Total Cases</p><h3 class="text-3xl font-bold text-white mt-2" id="totalCasesCount">{{ $totalCases ?? 24817 }}</h3></div>
                    <div class="w-12 h-12 rounded-xl bg-accent-teal/10 flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">folder</span></div>
                </div>
                <div class="mt-4"><div class="flex justify-between text-sm text-slate-400 mb-1"><span>Active Cases</span><span class="font-bold text-accent-teal" id="activeCasesCount">{{ $activeCases ?? 12428 }}</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden"><div class="h-full bg-accent-teal rounded-full" style="width: 50%"></div></div></div>
            </div>
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex justify-between items-start">
                    <div><p class="text-sm text-slate-400">High Risk Cases</p><h3 class="text-3xl font-bold text-white mt-2" id="highRiskCount">{{ $highRiskCases ?? 824 }}</h3></div>
                    <div class="w-12 h-12 rounded-xl bg-danger/10 flex items-center justify-center"><span class="material-symbols-outlined text-danger">warning</span></div>
                </div>
                <div class="mt-4"><div class="flex justify-between text-sm text-slate-400 mb-1"><span>Require Attention</span><span class="font-bold text-danger" id="requireAttention">{{ $requireAttention ?? 142 }}</span></div><div class="h-2 bg-deep-navy rounded-full overflow-hidden"><div class="h-full bg-danger rounded-full" style="width: 17%"></div></div></div>
            </div>
            <div class="glass-card p-6 rounded-2xl neon-border">
                <div class="flex justify-between items-start mb-4"><div><p class="text-sm text-slate-400">New Today</p><h3 class="text-3xl font-bold text-white mt-2" id="newCasesCount">{{ $newCasesToday ?? 142 }}</h3></div><div class="w-12 h-12 rounded-xl bg-success/10 flex items-center justify-center"><span class="material-symbols-outlined text-success">add_circle</span></div></div>
                <div class="flex items-center gap-2"><span class="text-sm text-success flex items-center gap-1"><span class="material-symbols-outlined text-sm">trending_up</span> +8.3%</span><span class="text-sm text-slate-400">vs yesterday</span></div>
            </div>
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex justify-between items-start"><div><p class="text-sm text-slate-400">AI Prediction Accuracy</p><h3 class="text-3xl font-bold text-white mt-2" id="aiAccuracy">87.4%</h3></div><div class="w-12 h-12 rounded-xl bg-accent-blue/10 flex items-center justify-center"><span class="material-symbols-outlined text-accent-blue">psychology</span></div></div>
                <div class="mt-4"><button id="viewAccuracy" class="w-full py-2 bg-accent-blue/10 text-accent-blue rounded-xl text-sm hover:bg-accent-blue/20">View Details</button></div>
            </div>
        </div>
    </div>

    <!-- Disease Distribution & Quick Actions -->
    <div class="mb-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="glass-card p-6 rounded-2xl lg:col-span-2">
                <div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">Disease Distribution</h3><div class="text-xs px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full">Real-time</div></div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="p-4 rounded-xl bg-deep-navy/50 text-center"><div class="text-2xl font-bold text-blue-400 mb-1" id="hepbCount">{{ $hepatitisB ?? 1248 }}</div><div class="text-sm text-slate-400">Hepatitis B</div><div class="mt-2"><span class="text-xs px-2 py-1 bg-blue-500/10 text-blue-400 rounded-full">-3% this week</span></div></div>
                    <div class="p-4 rounded-xl bg-deep-navy/50 text-center"><div class="text-2xl font-bold text-purple-400 mb-1" id="hepcCount">{{ $hepatitisC ?? 3672 }}</div><div class="text-sm text-slate-400">Hepatitis C</div><div class="mt-2"><span class="text-xs px-2 py-1 bg-purple-500/10 text-purple-400 rounded-full">+7% this week</span></div></div>
                    <div class="p-4 rounded-xl bg-deep-navy/50 text-center"><div class="text-2xl font-bold text-orange-400 mb-1" id="cirrhosisCount">{{ $cirrhosis ?? 2891 }}</div><div class="text-sm text-slate-400">Liver Cirrhosis</div><div class="mt-2"><span class="text-xs px-2 py-1 bg-orange-500/10 text-orange-400 rounded-full">+2% this week</span></div></div>
                </div>
                <div class="chart-container"><canvas id="diseaseChart"></canvas></div>
            </div>

            <div class="glass-card p-6 rounded-2xl neon-border">
                <div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">Quick Actions</h3><span class="material-symbols-outlined text-accent-teal">bolt</span></div>
                <div class="space-y-3">
                    <button id="qaImportCases" class="w-full p-3 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center justify-between hover:bg-accent-teal/20"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">add_circle</span> Import Cases</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                    <button id="qaGenerateReport" class="w-full p-3 bg-accent-blue/10 text-accent-blue rounded-xl flex items-center justify-between hover:bg-accent-blue/20"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">summarize</span> Generate Report</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                    <button id="qaRunAI" class="w-full p-3 bg-success/10 text-success rounded-xl flex items-center justify-between hover:bg-success/20"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">monitoring</span> Run AI Analysis</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                    <button id="qaHighRisk" class="w-full p-3 bg-warning/10 text-warning rounded-xl flex items-center justify-between hover:bg-warning/20"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">warning</span> Review High Risk</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                    <button id="qaExportAll" class="w-full p-3 bg-white/10 text-white rounded-xl flex items-center justify-between hover:bg-white/20"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">download</span> Export All Data</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                </div>
                <div class="mt-6 p-4 rounded-xl bg-deep-navy/50"><p class="text-sm text-slate-400"><span class="font-bold text-accent-teal">Tip:</span> Use AI analysis to identify patterns and predict outcomes</p></div>
            </div>
        </div>
    </div>

    <!-- Cases Table -->
    <div class="mb-8">
        <div class="glass-card rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-white/10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div><h3 class="text-xl font-bold text-white mb-1">Recent Cases</h3><p class="text-sm text-slate-400" id="casesCountDisplay">Loading cases...</p></div>
                <div class="flex items-center gap-3">
                    <select id="filterRisk" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white text-sm"><option value="all">All Risk Levels</option><option value="high">High Risk</option><option value="medium">Medium Risk</option><option value="low">Low Risk</option></select>
                    <select id="filterDisease" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white text-sm"><option value="all">All Diseases</option><option value="hepb">Hepatitis B</option><option value="hepc">Hepatitis C</option><option value="cirrhosis">Liver Cirrhosis</option></select>
                    <select id="filterStatus" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white text-sm"><option value="all">All Status</option><option value="active">Active</option><option value="resolved">Resolved</option><option value="pending">Pending</option></select>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="cases-table w-full">
                    <thead class="bg-white/5 border-b border-white/10">
                        <tr>
                            <th class="w-12 p-4"><input type="checkbox" id="selectAllCases" class="rounded border-white/20"></th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Case ID</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Patient</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Disease</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Risk Level</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">AI Prediction</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Progress</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Status</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Last Updated</th>
                            <th class="text-left p-4 text-sm font-medium text-slate-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="casesTableBody"></tbody>
                </table>
            </div>
            <div class="p-6 border-t border-white/10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                <div class="flex items-center gap-3">
                    <button id="bulkActionCasesBtn" class="px-4 py-2 bg-white/5 text-white rounded-xl text-sm hover:bg-white/10">Bulk Actions</button>
                    <select id="bulkActionCasesSelect" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white text-sm"><option value="">Select Action</option><option value="analyze">Run AI Analysis</option><option value="export">Export Selected</option><option value="assign">Assign to Doctor</option><option value="archive">Archive Cases</option></select>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-slate-400">Rows per page</span>
                    <select id="casesPerPage" class="px-3 py-1 bg-deep-navy/50 border border-white/10 rounded-lg text-white text-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option></select>
                    <div class="flex items-center gap-2">
                        <button id="prevCasePage" class="p-2 text-slate-400 hover:text-white disabled:opacity-50"><span class="material-symbols-outlined">chevron_left</span></button>
                        <span class="text-sm text-white" id="currentCasePage">1</span>
                        <span class="text-sm text-slate-400">of</span>
                        <span class="text-sm text-slate-400" id="totalCasePages">1</span>
                        <button id="nextCasePage" class="p-2 text-slate-400 hover:text-white"><span class="material-symbols-outlined">chevron_right</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Case Analytics -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="glass-card p-6 rounded-2xl">
            <div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">Case Trends</h3><div class="flex gap-2"><button class="text-xs px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full">Weekly</button><button class="text-xs px-3 py-1 bg-white/5 text-slate-400 rounded-full">Monthly</button></div></div>
            <div class="chart-container"><canvas id="caseTrendsChart"></canvas></div>
            <div class="mt-4 text-center"><p class="text-sm text-slate-400">Average case resolution time: <span class="text-accent-teal font-bold">14.2 days</span></p></div>
        </div>
        <div class="glass-card p-6 rounded-2xl neon-border">
            <div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">AI Performance Metrics</h3><div class="text-success text-sm font-medium"><span class="material-symbols-outlined align-middle text-sm">trending_up</span> +2.1%</div></div>
            <div class="space-y-4">
                <div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300">Prediction Accuracy</span><span class="font-bold text-success">87.4%</span></div><div class="progress-bar"><div class="h-full bg-success rounded-full" style="width:87.4%"></div></div></div>
                <div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300">Early Detection Rate</span><span class="font-bold text-accent-teal">76.2%</span></div><div class="progress-bar"><div class="h-full bg-accent-teal rounded-full" style="width:76.2%"></div></div></div>
                <div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300">False Positive Rate</span><span class="font-bold text-warning">4.8%</span></div><div class="progress-bar"><div class="h-full bg-warning rounded-full" style="width:4.8%"></div></div></div>
                <div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300">Model Confidence</span><span class="font-bold text-accent-blue">92.1%</span></div><div class="progress-bar"><div class="h-full bg-accent-blue rounded-full" style="width:92.1%"></div></div></div>
            </div>
            <div class="mt-6 p-4 rounded-xl bg-deep-navy/50"><p class="text-sm text-slate-400"><span class="font-bold text-accent-teal">AI Insight:</span> Model shows strong performance in detecting Hepatitis C cases with 94% accuracy</p></div>
        </div>
    </div>
</div>

<!-- Add Case Modal -->
<div id="addCaseModal" class="hidden fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4">
    <div class="glass-card rounded-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-white/10 flex justify-between items-center"><h3 class="text-xl font-bold text-white">Add New Case</h3><button id="closeAddCaseModal" class="text-slate-400 hover:text-white"><span class="material-symbols-outlined">close</span></button></div>
        <form id="addCaseForm" class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Patient Name</label><input type="text" id="patientName" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Enter patient name" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Patient Age</label><input type="number" id="patientAge" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Age" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Gender</label><select id="patientGender" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="male">Male</option><option value="female">Female</option><option value="other">Other</option></select></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Primary Disease</label><select id="primaryDisease" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="hepb">Hepatitis B</option><option value="hepc">Hepatitis C</option><option value="cirrhosis">Liver Cirrhosis</option><option value="other">Other Liver Disease</option></select></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">ALT Level (U/L)</label><input type="number" step="0.1" id="altLevel" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Enter ALT value" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">AST Level (U/L)</label><input type="number" step="0.1" id="astLevel" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Enter AST value" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Bilirubin (mg/dL)</label><input type="number" step="0.01" id="bilirubinLevel" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Enter bilirubin value" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Albumin (g/dL)</label><input type="number" step="0.1" id="albuminLevel" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Enter albumin value" required></div>
            </div>
            <div class="mb-6"><label class="block text-sm font-medium text-slate-300 mb-2">Assign to Physician</label><select id="assignPhysician" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="">Select Physician</option><option value="dr_ahmed">Dr. Ahmed Mohamed</option><option value="dr_sarah">Dr. Sarah Chen</option><option value="dr_james">Dr. James Wilson</option><option value="dr_fatima">Dr. Fatima Al-Mansoori</option></select></div>
            <div class="flex justify-end gap-4"><button type="button" id="cancelAddCase" class="px-6 py-3 bg-white/5 text-white rounded-xl hover:bg-white/10">Cancel</button><button type="submit" class="px-6 py-3 bg-accent-teal text-deep-navy font-bold rounded-xl hover:bg-accent-teal/90">Add Case & Run AI Analysis</button></div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sample cases data – replace with Laravel data (e.g., @json($cases))
    let allCases = @json($cases ?? []);
    let filteredCases = [...allCases];
    let currentPage = 1;
    let rowsPerPage = 10;

    // Fallback sample data if empty
    if (allCases.length === 0) {
        allCases = [
            { id: "LC-2024-001", patientName: "Sarah Abdullah", age: 42, gender: "female", disease: "hepb", diseaseText: "Hepatitis B", riskLevel: "low", aiPrediction: 22, progress: 65, status: "active", lastUpdated: "2 days ago" },
            { id: "LC-2024-002", patientName: "Mohamed Khalid", age: 58, gender: "male", disease: "hepc", diseaseText: "Hepatitis C", riskLevel: "medium", aiPrediction: 58, progress: 42, status: "active", lastUpdated: "4 days ago" },
            { id: "LC-2024-003", patientName: "Fatima Ali", age: 65, gender: "female", disease: "cirrhosis", diseaseText: "Liver Cirrhosis", riskLevel: "high", aiPrediction: 82, progress: 28, status: "active", lastUpdated: "9 days ago" },
            { id: "LC-2024-004", patientName: "Omar Hassan", age: 48, gender: "male", disease: "hepb", diseaseText: "Hepatitis B", riskLevel: "low", aiPrediction: 18, progress: 89, status: "resolved", lastUpdated: "1 week ago" },
            { id: "LC-2024-005", patientName: "Aisha Mahmoud", age: 35, gender: "female", disease: "hepc", diseaseText: "Hepatitis C", riskLevel: "medium", aiPrediction: 47, progress: 56, status: "active", lastUpdated: "Yesterday" }
        ];
        filteredCases = [...allCases];
    }

    function renderTable() {
        const tbody = document.getElementById('casesTableBody');
        const start = (currentPage - 1) * rowsPerPage;
        const paginated = filteredCases.slice(start, start + rowsPerPage);
        tbody.innerHTML = '';
        paginated.forEach(c => {
            let riskClass = 'risk-low'; let riskText = 'Low Risk';
            if (c.riskLevel === 'medium') { riskClass = 'risk-medium'; riskText = 'Medium Risk'; }
            else if (c.riskLevel === 'high') { riskClass = 'risk-high'; riskText = 'High Risk'; }
            let statusClass = 'status-active'; let statusText = 'Active';
            if (c.status === 'resolved') { statusClass = 'status-resolved'; statusText = 'Resolved'; }
            else if (c.status === 'pending') { statusClass = 'status-pending'; statusText = 'Pending'; }
            let diseaseClass = 'disease-hepb';
            if (c.disease === 'hepc') diseaseClass = 'disease-hepc';
            else if (c.disease === 'cirrhosis') diseaseClass = 'disease-cirrhosis';
            let predictionColor = 'text-success';
            if (c.aiPrediction > 70) predictionColor = 'text-danger';
            else if (c.aiPrediction > 30) predictionColor = 'text-warning';
            const row = `<tr class="border-b border-white/10 hover:bg-white/5">
                <td class="p-4"><input type="checkbox" class="case-checkbox rounded border-white/20" data-case-id="${c.id}"></td>
                <td class="p-4"><div class="font-bold text-white">${c.id}</div><div class="text-xs text-slate-400">Age: ${c.age}, ${c.gender}</div></td>
                <td class="p-4 font-medium text-white">${c.patientName}</td>
                <td class="p-4"><span class="disease-badge ${diseaseClass}">${c.diseaseText}</span></td>
                <td class="p-4"><span class="risk-badge ${riskClass}">${riskText}</span></td>
                <td class="p-4"><div class="flex items-center gap-2"><span class="font-bold ${predictionColor}">${c.aiPrediction}%</span><div class="progress-bar w-16"><div class="h-full ${c.aiPrediction > 70 ? 'bg-danger' : (c.aiPrediction > 30 ? 'bg-warning' : 'bg-success')} rounded-full" style="width:${c.aiPrediction}%"></div></div></div></td>
                <td class="p-4"><div class="flex items-center gap-2"><span class="font-bold text-white">${c.progress}%</span><div class="progress-bar w-20"><div class="h-full bg-accent-teal rounded-full" style="width:${c.progress}%"></div></div></div></td>
                <td class="p-4"><span class="status-badge ${statusClass}">${statusText}</span></td>
                <td class="p-4 text-slate-400">${c.lastUpdated}</td>
                <td class="p-4"><div class="flex gap-2"><button class="action-btn text-accent-teal view-case" data-case-id="${c.id}"><span class="material-symbols-outlined text-sm">visibility</span></button><button class="action-btn text-accent-blue analyze-case" data-case-id="${c.id}"><span class="material-symbols-outlined text-sm">psychology</span></button><button class="action-btn text-warning edit-case" data-case-id="${c.id}"><span class="material-symbols-outlined text-sm">edit</span></button></div></td>
            </tr>`;
            tbody.insertAdjacentHTML('beforeend', row);
        });
        document.getElementById('casesCountDisplay').innerText = `Showing ${filteredCases.length} cases`;
        const totalPages = Math.ceil(filteredCases.length / rowsPerPage);
        document.getElementById('totalCasePages').innerText = totalPages || 1;
        document.getElementById('currentCasePage').innerText = currentPage;
        document.getElementById('prevCasePage').disabled = currentPage === 1;
        document.getElementById('nextCasePage').disabled = currentPage === totalPages || totalPages === 0;
        attachCaseButtons();
    }

    function attachCaseButtons() {
        document.querySelectorAll('.view-case').forEach(btn => btn.addEventListener('click', (e) => { const id = btn.dataset.caseId; showNotification(`Viewing case ${id}`, 'info'); }));
        document.querySelectorAll('.analyze-case').forEach(btn => btn.addEventListener('click', (e) => { const id = btn.dataset.caseId; showNotification(`Running AI analysis on case ${id}...`, 'info'); setTimeout(() => showNotification(`Analysis complete for ${id}`, 'success'), 1500); }));
        document.querySelectorAll('.edit-case').forEach(btn => btn.addEventListener('click', (e) => { const id = btn.dataset.caseId; showNotification(`Editing case ${id}`, 'info'); }));
    }

    function filterCases() {
        const risk = document.getElementById('filterRisk').value;
        const disease = document.getElementById('filterDisease').value;
        const status = document.getElementById('filterStatus').value;
        const search = document.getElementById('searchCases').value.toLowerCase();
        filteredCases = allCases.filter(c => {
            if (risk !== 'all' && c.riskLevel !== risk) return false;
            if (disease !== 'all' && c.disease !== disease) return false;
            if (status !== 'all' && c.status !== status) return false;
            if (search && !c.patientName.toLowerCase().includes(search) && !c.id.toLowerCase().includes(search)) return false;
            return true;
        });
        currentPage = 1;
        renderTable();
        updateStats();
    }

    function updateStats() {
        const total = allCases.length;
        const high = allCases.filter(c => c.riskLevel === 'high').length;
        const active = allCases.filter(c => c.status === 'active').length;
        const newToday = allCases.filter(c => c.lastUpdated === 'Just now' || c.lastUpdated === 'Today').length;
        document.getElementById('totalCasesCount').innerText = total;
        document.getElementById('highRiskCount').innerText = high;
        document.getElementById('newCasesCount').innerText = newToday || 0;
        document.getElementById('activeCasesCount').innerText = active;
        const activePercent = total ? Math.round(active / total * 100) : 0;
        document.querySelector('#totalCasesCount + .mt-4 .bg-accent-teal').style.width = `${activePercent}%`;
    }

    function showNotification(msg, type) {
        const n = document.createElement('div');
        n.className = `fixed bottom-4 right-4 glass-card p-4 rounded-xl flex items-center gap-3 z-50 ${type === 'success' ? 'border-green-500/30 bg-green-500/10' : 'border-blue-500/30 bg-blue-500/10'}`;
        n.innerHTML = `<span class="material-symbols-outlined ${type === 'success' ? 'text-green-500' : 'text-blue-500'}">${type === 'success' ? 'check_circle' : 'info'}</span><span>${msg}</span>`;
        document.body.appendChild(n);
        setTimeout(() => n.remove(), 3000);
    }

    // Event listeners
    document.getElementById('searchCases').addEventListener('input', filterCases);
    document.getElementById('filterRisk').addEventListener('change', filterCases);
    document.getElementById('filterDisease').addEventListener('change', filterCases);
    document.getElementById('filterStatus').addEventListener('change', filterCases);
    document.getElementById('casesPerPage').addEventListener('change', (e) => { rowsPerPage = parseInt(e.target.value); currentPage = 1; renderTable(); });
    document.getElementById('prevCasePage').addEventListener('click', () => { if (currentPage > 1) { currentPage--; renderTable(); } });
    document.getElementById('nextCasePage').addEventListener('click', () => { const total = Math.ceil(filteredCases.length / rowsPerPage); if (currentPage < total) { currentPage++; renderTable(); } });
    document.getElementById('selectAllCases').addEventListener('change', (e) => { document.querySelectorAll('.case-checkbox').forEach(cb => cb.checked = e.target.checked); });
    document.getElementById('bulkActionCasesBtn').addEventListener('click', () => { const action = document.getElementById('bulkActionCasesSelect').value; const selected = Array.from(document.querySelectorAll('.case-checkbox:checked')).map(cb => cb.dataset.caseId); if (selected.length === 0) { showNotification('Select cases first', 'error'); return; } showNotification(`${action} on ${selected.length} cases`, 'info'); });
    document.getElementById('quickAnalysis').addEventListener('click', () => showNotification('Running AI analysis on all active cases...', 'info'));
    document.getElementById('viewAccuracy').addEventListener('click', () => showNotification('Opening AI performance dashboard', 'info'));

    // Modal — defined FIRST so openModal/closeModal are available to all listeners below
    const modal = document.getElementById('addCaseModal');
    const openModal = () => modal.classList.remove('hidden');
    const closeModal = () => modal.classList.add('hidden');
    document.getElementById('addCaseBtn')?.addEventListener('click', openModal);
    document.getElementById('addCaseBtnContent').addEventListener('click', openModal);
    document.getElementById('closeAddCaseModal').addEventListener('click', closeModal);
    document.getElementById('cancelAddCase').addEventListener('click', closeModal);
    document.getElementById('addCaseForm').addEventListener('submit', (e) => { e.preventDefault(); showNotification('Case added successfully', 'success'); closeModal(); });
    modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

    // Quick Actions
    document.getElementById('qaImportCases').addEventListener('click', () => { openModal(); });
    document.getElementById('qaGenerateReport').addEventListener('click', () => { window.location.href = '{{ route("admin.reports") }}'; });
    document.getElementById('qaRunAI').addEventListener('click', () => { showNotification('Running AI analysis on all active cases...', 'info'); setTimeout(() => showNotification('AI analysis complete!', 'success'), 2000); });
    document.getElementById('qaHighRisk').addEventListener('click', () => { document.getElementById('filterRisk').value = 'high'; filterCases(); showNotification('Filtered to high risk cases', 'info'); });
    document.getElementById('qaExportAll').addEventListener('click', () => { const dataStr = JSON.stringify(allCases, null, 2); const blob = new Blob([dataStr], {type:'application/json'}); const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href = url; a.download = 'cases-export.json'; a.click(); URL.revokeObjectURL(url); showNotification('Cases exported successfully', 'success'); });

    // Charts
    new Chart(document.getElementById('diseaseChart'), {
        type: 'bar',
        data: { labels: ['Hepatitis B', 'Hepatitis C', 'Liver Cirrhosis', 'Other'], datasets: [{ label: 'Number of Cases', data: [{{ $hepatitisB ?? 1248 }}, {{ $hepatitisC ?? 3672 }}, {{ $cirrhosis ?? 2891 }}, 500], backgroundColor: ['rgba(59,130,246,0.8)', 'rgba(139,92,246,0.8)', 'rgba(249,115,22,0.8)', 'rgba(148,163,184,0.8)'], borderWidth: 0 }] },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } }, scales: { y: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#94a3b8' } }, x: { ticks: { color: '#94a3b8' } } } }
    });
    new Chart(document.getElementById('caseTrendsChart'), {
        type: 'line',
        data: { labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'], datasets: [{ label: 'New Cases', data: [3200,2980,3450,4210,3890,4320,4510], borderColor: '#14B8A6', backgroundColor: 'rgba(20,184,166,0.1)', fill: true, tension: 0.4 }, { label: 'Resolved Cases', data: [2800,2650,3100,3850,3500,3980,4120], borderColor: '#10B981', backgroundColor: 'rgba(16,185,129,0.1)', fill: true, tension: 0.4 }] },
        options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { labels: { color: '#94a3b8' } } }, scales: { y: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#94a3b8' } }, x: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#94a3b8' } } } }
    });

    renderTable();
    updateStats();
});
</script>
@endpush