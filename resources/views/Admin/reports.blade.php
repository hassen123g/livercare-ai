@extends('layouts.admin')

@section('title', 'Reports & Analytics | LiverCare AI Dashboard')

@section('sidebar-extra')
    <p class="text-xs text-slate-500 mb-2">Report Actions</p>
    <button id="createReportBtn" class="w-full p-3 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center gap-2 justify-center hover:bg-accent-teal/20 transition-colors">
        <span class="material-symbols-outlined text-sm">add</span>
        New Report
    </button>
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div><h1 class="text-3xl font-display font-bold text-white mb-2">Reports & Analytics</h1><p class="text-slate-400">Generate, manage, and analyze comprehensive reports with AI insights</p></div>
            <div class="flex items-center gap-3">
                <div class="relative"><input type="text" id="searchReports" placeholder="Search reports..." class="pl-10 pr-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400"><span class="material-symbols-outlined text-sm">search</span></span></div>
                <button id="createReportBtnContent" class="px-4 py-2 bg-accent-teal text-deep-navy font-bold rounded-xl flex items-center gap-2 hover:bg-accent-teal/90"><span class="material-symbols-outlined text-sm">add</span> New Report</button>
                <button id="bulkExport" class="px-4 py-2 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center gap-2 hover:bg-accent-teal/20"><span class="material-symbols-outlined text-sm">download</span> Export All</button>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="glass-card p-6 rounded-2xl"><div class="flex justify-between items-start"><div><p class="text-sm text-slate-400">Total Reports</p><h3 class="text-3xl font-bold text-white mt-2" id="totalReportsCount">{{ $totalReports ?? 1248 }}</h3></div><div class="w-12 h-12 rounded-xl bg-accent-teal/10 flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">summarize</span></div></div><div class="mt-4"><div class="flex justify-between text-sm text-slate-400 mb-1"><span>This Month</span><span class="font-bold text-accent-teal" id="thisMonthCount">{{ $thisMonthReports ?? 142 }}</span></div><div class="h-2 bg-deep-navy rounded-full"><div class="h-full bg-accent-teal rounded-full" style="width:{{ $thisMonthPercent ?? 45 }}%"></div></div></div></div>
        <div class="glass-card p-6 rounded-2xl"><div class="flex justify-between items-start"><div><p class="text-sm text-slate-400">Scheduled</p><h3 class="text-3xl font-bold text-white mt-2" id="scheduledReportsCount">{{ $scheduledReports ?? 24 }}</h3></div><div class="w-12 h-12 rounded-xl bg-warning/10 flex items-center justify-center"><span class="material-symbols-outlined text-warning">schedule</span></div></div><div class="mt-4"><button id="viewScheduled" class="w-full py-2 bg-warning/10 text-warning rounded-xl text-sm hover:bg-warning/20">View Schedule</button></div></div>
        <div class="glass-card p-6 rounded-2xl neon-border"><div class="flex justify-between items-start mb-4"><div><p class="text-sm text-slate-400">AI Generated</p><h3 class="text-3xl font-bold text-white mt-2" id="aiReportsCount">{{ $aiReports ?? 892 }}</h3></div><div class="w-12 h-12 rounded-xl bg-accent-blue/10 flex items-center justify-center"><span class="material-symbols-outlined text-accent-blue">psychology</span></div></div><div class="flex items-center gap-2"><span class="text-sm text-success flex items-center gap-1"><span class="material-symbols-outlined text-sm">trending_up</span> <span id="aiPercentage">{{ $aiPercentage ?? 71.5 }}</span>%</span><span class="text-sm text-slate-400">of all reports</span></div></div>
        <div class="glass-card p-6 rounded-2xl"><div class="flex justify-between items-start"><div><p class="text-sm text-slate-400">Storage Used</p><h3 class="text-3xl font-bold text-white mt-2" id="storageUsed">{{ $storageUsed ?? 4.2 }} GB</h3></div><div class="w-12 h-12 rounded-xl bg-info/10 flex items-center justify-center"><span class="material-symbols-outlined text-info">database</span></div></div><div class="mt-4"><div class="flex justify-between text-sm text-slate-400 mb-1"><span>Total: 10 GB</span><span class="font-bold text-info" id="storagePercent">{{ $storagePercent ?? 42 }}%</span></div><div class="h-2 bg-deep-navy rounded-full"><div id="storageBar" class="h-full bg-info rounded-full" style="width:{{ $storagePercent ?? 42 }}%"></div></div></div></div>
    </div>

    <!-- Report Types & Quick Generate -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="glass-card p-6 rounded-2xl lg:col-span-2">
            <div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">Report Types Distribution</h3><div class="text-xs px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full">Last 30 days</div></div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div class="p-4 rounded-xl bg-deep-navy/50 text-center"><div class="text-2xl font-bold text-accent-teal mb-1" id="clinicalReports">{{ $clinicalReports ?? 568 }}</div><div class="text-sm text-slate-400">Clinical</div><div class="mt-2"><span class="text-xs px-2 py-1 bg-accent-teal/10 text-accent-teal rounded-full">+12%</span></div></div>
                <div class="p-4 rounded-xl bg-deep-navy/50 text-center"><div class="text-2xl font-bold text-accent-blue mb-1" id="analyticsReports">{{ $analyticsReports ?? 342 }}</div><div class="text-sm text-slate-400">Analytics</div><div class="mt-2"><span class="text-xs px-2 py-1 bg-accent-blue/10 text-accent-blue rounded-full">+24%</span></div></div>
                <div class="p-4 rounded-xl bg-deep-navy/50 text-center"><div class="text-2xl font-bold text-purple-400 mb-1" id="researchReports">{{ $researchReports ?? 198 }}</div><div class="text-sm text-slate-400">Research</div><div class="mt-2"><span class="text-xs px-2 py-1 bg-purple-500/10 text-purple-400 rounded-full">+8%</span></div></div>
                <div class="p-4 rounded-xl bg-deep-navy/50 text-center"><div class="text-2xl font-bold text-warning mb-1" id="auditReports">{{ $auditReports ?? 140 }}</div><div class="text-sm text-slate-400">Audit</div><div class="mt-2"><span class="text-xs px-2 py-1 bg-warning/10 text-warning rounded-full">+5%</span></div></div>
            </div>
            <div class="chart-container"><canvas id="reportsChart"></canvas></div>
        </div>
        <div class="glass-card p-6 rounded-2xl neon-border">
            <div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">Quick Generate</h3><span class="material-symbols-outlined text-accent-teal">bolt</span></div>
            <div class="space-y-4">
                <button class="quick-report w-full p-3 bg-accent-teal/10 text-accent-teal rounded-xl flex items-center justify-between" data-type="weekly"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">summarize</span> Weekly Summary</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                <button class="quick-report w-full p-3 bg-accent-blue/10 text-accent-blue rounded-xl flex items-center justify-between" data-type="monthly"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">calendar_month</span> Monthly Analytics</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                <button class="quick-report w-full p-3 bg-success/10 text-success rounded-xl flex items-center justify-between" data-type="ai"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">psychology</span> AI Insights Report</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                <button class="quick-report w-full p-3 bg-warning/10 text-warning rounded-xl flex items-center justify-between" data-type="risk"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">warning</span> Risk Assessment</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
                <button class="quick-report w-full p-3 bg-purple-500/10 text-purple-400 rounded-xl flex items-center justify-between" data-type="research"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">science</span> Research Data</span><span class="material-symbols-outlined text-sm">chevron_right</span></button>
            </div>
            <div class="mt-6 p-4 rounded-xl bg-deep-navy/50"><p class="text-sm text-slate-400"><span class="font-bold text-accent-teal">Tip:</span> Use AI-generated reports for deeper insights</p></div>
        </div>
    </div>

    <!-- Reports Table -->
    <div class="glass-card rounded-2xl overflow-hidden mb-8">
        <div class="p-6 border-b border-white/10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div><h3 class="text-xl font-bold text-white mb-1">Recent Reports</h3><p class="text-sm text-slate-400" id="reportsCountDisplay">Loading reports...</p></div>
            <div class="flex items-center gap-3">
                <select id="filterType" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="all">All Types</option><option value="clinical">Clinical</option><option value="analytics">Analytics</option><option value="research">Research</option><option value="audit">Audit</option></select>
                <select id="filterStatus" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="all">All Status</option><option value="completed">Completed</option><option value="processing">Processing</option><option value="pending">Pending</option></select>
                <select id="filterPeriod" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="all">All Time</option><option value="today">Today</option><option value="week">This Week</option><option value="month">This Month</option></select>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="reports-table w-full">
                <thead class="bg-white/5 border-b border-white/10">
                    <tr><th class="w-12 p-4"><input type="checkbox" id="selectAllReports"></th><th>Report ID</th><th>Report Name</th><th>Type</th><th>Generated By</th><th>Size</th><th>Status</th><th>Generated On</th><th>Actions</th></tr>
                </thead>
                <tbody id="reportsTableBody"></tbody>
            </table>
        </div>
        <div class="p-6 border-t border-white/10 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div class="flex items-center gap-3"><button id="bulkActionReportsBtn" class="px-4 py-2 bg-white/5 text-white rounded-xl text-sm">Bulk Actions</button><select id="bulkActionReportsSelect" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="">Select Action</option><option value="download">Download Selected</option><option value="archive">Archive Reports</option><option value="delete">Delete Reports</option><option value="share">Share Reports</option></select></div>
            <div class="flex items-center gap-4"><span class="text-sm text-slate-400">Rows per page</span><select id="reportsPerPage" class="px-3 py-1 bg-deep-navy/50 border border-white/10 rounded-lg text-white"><option value="10">10</option><option value="25">25</option><option value="50">50</option></select><div class="flex items-center gap-2"><button id="prevReportPage" class="p-2 text-slate-400 hover:text-white"><span class="material-symbols-outlined">chevron_left</span></button><span class="text-sm text-white" id="currentReportPage">1</span><span class="text-sm text-slate-400">of</span><span class="text-sm text-slate-400" id="totalReportPages">1</span><button id="nextReportPage" class="p-2 text-slate-400 hover:text-white"><span class="material-symbols-outlined">chevron_right</span></button></div></div>
        </div>
    </div>

    <!-- Analytics Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="glass-card p-6 rounded-2xl"><div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">Generation Trends</h3><div class="flex gap-2"><button class="trend-daily text-xs px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full">Daily</button><button class="trend-weekly text-xs px-3 py-1 bg-white/5 text-slate-400 rounded-full">Weekly</button></div></div><div class="chart-container"><canvas id="generationChart"></canvas></div><div class="mt-4 text-center"><p class="text-sm text-slate-400">Average generation time: <span class="text-accent-teal font-bold">2.4 seconds</span></p></div></div>
        <div class="glass-card p-6 rounded-2xl neon-border"><div class="flex items-center justify-between mb-6"><h3 class="text-xl font-bold text-white">Report Performance</h3><div class="text-success text-sm font-medium"><span class="material-symbols-outlined align-middle text-sm">trending_up</span> +18.2%</div></div><div class="space-y-4"><div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300">AI Report Accuracy</span><span class="font-bold text-success">94.2%</span></div><div class="h-2 bg-deep-navy rounded-full"><div class="h-full bg-success rounded-full" style="width:94.2%"></div></div></div><div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300">User Satisfaction</span><span class="font-bold text-accent-teal">88.7%</span></div><div class="h-2 bg-deep-navy rounded-full"><div class="h-full bg-accent-teal rounded-full" style="width:88.7%"></div></div></div><div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300">Report Utilization</span><span class="font-bold text-accent-blue">76.4%</span></div><div class="h-2 bg-deep-navy rounded-full"><div class="h-full bg-accent-blue rounded-full" style="width:76.4%"></div></div></div><div><div class="flex justify-between text-sm mb-2"><span class="text-slate-300">Automation Rate</span><span class="font-bold text-purple-400">82.9%</span></div><div class="h-2 bg-deep-navy rounded-full"><div class="h-full bg-purple-400 rounded-full" style="width:82.9%"></div></div></div></div><div class="mt-6 p-4 rounded-xl bg-deep-navy/50"><p class="text-sm text-slate-400"><span class="font-bold text-accent-teal">Insight:</span> AI-generated reports show 32% higher accuracy</p></div></div>
    </div>
</div>

<!-- Create Report Modal -->
<div id="createReportModal" class="hidden fixed inset-0 bg-black/70 z-50 flex items-center justify-center p-4">
    <div class="glass-card rounded-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-white/10 flex justify-between items-center"><h3 class="text-xl font-bold text-white">Create New Report</h3><button id="closeCreateReportModal" class="text-slate-400 hover:text-white"><span class="material-symbols-outlined">close</span></button></div>
        <form id="createReportForm" class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Report Name</label><input type="text" id="reportName" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white" placeholder="Enter report name" required></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Report Type</label><select id="reportType" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="clinical">Clinical Report</option><option value="analytics">Analytics Report</option><option value="research">Research Report</option><option value="audit">Audit Report</option></select></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Date Range</label><select id="dateRange" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="today">Today</option><option value="week">Last 7 Days</option><option value="month">Last 30 Days</option><option value="quarter">Last Quarter</option><option value="year">Last Year</option></select></div>
                <div><label class="block text-sm font-medium text-slate-300 mb-2">Format</label><select id="reportFormat" class="w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white"><option value="pdf">PDF Document</option><option value="excel">Excel Spreadsheet</option><option value="csv">CSV Data</option><option value="html">HTML Report</option></select></div>
            </div>
            <div class="mb-6"><label class="block text-sm font-medium text-slate-300 mb-2">AI Analysis Level</label><input type="range" id="aiLevel" min="0" max="100" value="75" class="w-full h-2 bg-deep-navy rounded-lg appearance-none cursor-pointer form-range"><div class="flex justify-between text-xs text-slate-500 mt-1"><span>Basic</span><span id="aiLevelValue" class="text-accent-teal font-bold">Advanced (75%)</span><span>Deep AI</span></div></div>
            <div class="flex justify-end gap-4"><button type="button" id="cancelCreateReport" class="px-6 py-3 bg-white/5 text-white rounded-xl">Cancel</button><button type="submit" class="px-6 py-3 bg-gradient-to-r from-accent-teal to-accent-blue text-deep-navy font-bold rounded-xl flex items-center gap-2"><span class="material-symbols-outlined">psychology</span> Generate with AI</button></div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let allReports = @json($reports ?? []);
    if (allReports.length === 0) {
        allReports = [
            { id:1, name:"Weekly Clinical Summary", type:"clinical", generatedBy:"AI System", size:"2.4 MB", status:"completed", generatedOn:"Today, 10:30 AM", format:"pdf", aiGenerated:true },
            { id:2, name:"Monthly Analytics Report", type:"analytics", generatedBy:"Dr. Ahmed", size:"4.8 MB", status:"completed", generatedOn:"Yesterday", format:"excel", aiGenerated:false },
            { id:3, name:"Hepatitis C Research", type:"research", generatedBy:"AI System", size:"8.2 MB", status:"processing", generatedOn:"Today", format:"csv", aiGenerated:true },
            { id:4, name:"System Audit Log", type:"audit", generatedBy:"Admin", size:"1.2 MB", status:"completed", generatedOn:"2 days ago", format:"pdf", aiGenerated:false }
        ];
    }
    let filteredReports = [...allReports];
    let currentPage = 1;
    let rowsPerPage = 10;

    function renderTable() {
        const tbody = document.getElementById('reportsTableBody');
        const start = (currentPage - 1) * rowsPerPage;
        const paginated = filteredReports.slice(start, start + rowsPerPage);
        tbody.innerHTML = '';
        paginated.forEach(r => {
            let typeClass = 'report-type-clinical', typeText = 'Clinical';
            if (r.type === 'analytics') { typeClass = 'report-type-analytics'; typeText = 'Analytics'; }
            else if (r.type === 'research') { typeClass = 'report-type-research'; typeText = 'Research'; }
            else if (r.type === 'audit') { typeClass = 'report-type-audit'; typeText = 'Audit'; }
            let statusClass = 'status-completed', statusText = 'Completed';
            if (r.status === 'processing') { statusClass = 'status-processing'; statusText = 'Processing'; }
            else if (r.status === 'pending') { statusClass = 'status-pending'; statusText = 'Pending'; }
            let formatIcon = 'description';
            if (r.format === 'excel') formatIcon = 'table';
            else if (r.format === 'csv') formatIcon = 'table_chart';
            const row = `<tr class="border-b border-white/10 hover:bg-white/5">
                <td class="p-4"><input type="checkbox" class="report-checkbox rounded border-white/20" data-id="${r.id}"></td>
                <td class="p-4"><div class="font-bold text-white">REP-${r.id}</div><div class="text-xs text-slate-400">${r.format.toUpperCase()}</div></td>
                <td class="p-4"><div class="font-medium text-white">${r.name}</div><div class="text-xs text-slate-400">${r.aiGenerated ? '🤖 AI Generated' : 'Manual'}</div></td>
                <td class="p-4"><span class="report-badge ${typeClass}">${typeText}</span></td>
                <td class="p-4 text-slate-300">${r.generatedBy}</td>
                <td class="p-4"><div class="flex items-center gap-2"><span class="material-symbols-outlined text-sm">${formatIcon}</span><span class="font-bold text-white">${r.size}</span></div></td>
                <td class="p-4"><span class="status-badge ${statusClass}">${statusText}</span></td>
                <td class="p-4 text-slate-400">${r.generatedOn}</td>
                <td class="p-4"><div class="flex gap-2"><button class="action-btn text-accent-teal view-report" data-id="${r.id}"><span class="material-symbols-outlined text-sm">visibility</span></button><button class="action-btn text-accent-blue download-report" data-id="${r.id}"><span class="material-symbols-outlined text-sm">download</span></button><button class="action-btn text-warning share-report" data-id="${r.id}"><span class="material-symbols-outlined text-sm">share</span></button></div></td>
            </tr>`;
            tbody.insertAdjacentHTML('beforeend', row);
        });
        document.getElementById('reportsCountDisplay').innerText = `Showing ${filteredReports.length} reports`;
        const totalPages = Math.ceil(filteredReports.length / rowsPerPage);
        document.getElementById('totalReportPages').innerText = totalPages || 1;
        document.getElementById('currentReportPage').innerText = currentPage;
        attachReportButtons();
        updateStats();
    }

    function attachReportButtons() {
        document.querySelectorAll('.view-report').forEach(btn => btn.addEventListener('click', (e) => { const id = btn.dataset.id; showNotification(`Viewing report ${id}`, 'info'); }));
        document.querySelectorAll('.download-report').forEach(btn => btn.addEventListener('click', (e) => { const id = btn.dataset.id; showNotification(`Downloading report ${id}`, 'success'); }));
        document.querySelectorAll('.share-report').forEach(btn => btn.addEventListener('click', (e) => { const id = btn.dataset.id; showNotification(`Sharing report ${id}`, 'info'); }));
    }

    function filterReports() {
        const type = document.getElementById('filterType').value;
        const status = document.getElementById('filterStatus').value;
        const period = document.getElementById('filterPeriod').value;
        const search = document.getElementById('searchReports').value.toLowerCase();
        filteredReports = allReports.filter(r => {
            if (type !== 'all' && r.type !== type) return false;
            if (status !== 'all' && r.status !== status) return false;
            if (period === 'today' && !r.generatedOn.includes('Today')) return false;
            if (period === 'week' && !r.generatedOn.includes('Today') && !r.generatedOn.includes('Yesterday')) return false;
            if (search && !r.name.toLowerCase().includes(search) && !r.generatedBy.toLowerCase().includes(search)) return false;
            return true;
        });
        currentPage = 1;
        renderTable();
    }

    function updateStats() {
        const total = allReports.length;
        const ai = allReports.filter(r => r.aiGenerated).length;
        const clinical = allReports.filter(r => r.type === 'clinical').length;
        const analytics = allReports.filter(r => r.type === 'analytics').length;
        const research = allReports.filter(r => r.type === 'research').length;
        const audit = allReports.filter(r => r.type === 'audit').length;
        const scheduled = allReports.filter(r => r.status === 'pending').length;
        const thisMonth = allReports.filter(r => r.generatedOn.includes('Today') || r.generatedOn.includes('Yesterday')).length;
        document.getElementById('totalReportsCount').innerText = total;
        document.getElementById('aiReportsCount').innerText = ai;
        document.getElementById('clinicalReports').innerText = clinical;
        document.getElementById('analyticsReports').innerText = analytics;
        document.getElementById('researchReports').innerText = research;
        document.getElementById('auditReports').innerText = audit;
        document.getElementById('scheduledReportsCount').innerText = scheduled;
        document.getElementById('thisMonthCount').innerText = thisMonth;
        const aiPercent = total ? Math.round(ai / total * 100) : 0;
        document.getElementById('aiPercentage').innerText = aiPercent;
        const storageGb = (total * 3.4 / 1024).toFixed(1);
        const storagePercent = Math.min(100, Math.round((total * 3.4 / 1024) / 10 * 100));
        document.getElementById('storageUsed').innerText = storageGb + ' GB';
        document.getElementById('storagePercent').innerText = storagePercent + '%';
        document.getElementById('storageBar').style.width = storagePercent + '%';
    }

    function showNotification(msg, type) {
        const n = document.createElement('div');
        n.className = `fixed bottom-4 right-4 glass-card p-4 rounded-xl flex items-center gap-3 z-50 ${type === 'success' ? 'border-green-500/30' : 'border-blue-500/30'}`;
        n.innerHTML = `<span class="material-symbols-outlined ${type === 'success' ? 'text-green-500' : 'text-blue-500'}">${type === 'success' ? 'check_circle' : 'info'}</span><span>${msg}</span>`;
        document.body.appendChild(n);
        setTimeout(() => n.remove(), 3000);
    }

    document.getElementById('searchReports').addEventListener('input', filterReports);
    document.getElementById('filterType').addEventListener('change', filterReports);
    document.getElementById('filterStatus').addEventListener('change', filterReports);
    document.getElementById('filterPeriod').addEventListener('change', filterReports);
    document.getElementById('reportsPerPage').addEventListener('change', (e) => { rowsPerPage = parseInt(e.target.value); currentPage = 1; renderTable(); });
    document.getElementById('prevReportPage').addEventListener('click', () => { if (currentPage > 1) { currentPage--; renderTable(); } });
    document.getElementById('nextReportPage').addEventListener('click', () => { const total = Math.ceil(filteredReports.length / rowsPerPage); if (currentPage < total) { currentPage++; renderTable(); } });
    document.getElementById('selectAllReports').addEventListener('change', (e) => { document.querySelectorAll('.report-checkbox').forEach(cb => cb.checked = e.target.checked); });
    document.getElementById('bulkActionReportsBtn').addEventListener('click', () => { const action = document.getElementById('bulkActionReportsSelect').value; const selected = Array.from(document.querySelectorAll('.report-checkbox:checked')).map(cb => cb.dataset.id); if (selected.length === 0) { showNotification('Select reports first', 'error'); return; } showNotification(`${action} on ${selected.length} reports`, 'info'); });
    document.getElementById('bulkExport').addEventListener('click', () => { const dataStr = JSON.stringify(allReports); const blob = new Blob([dataStr], {type:'application/json'}); const url = URL.createObjectURL(blob); const a = document.createElement('a'); a.href = url; a.download = 'reports.json'; a.click(); URL.revokeObjectURL(url); showNotification('Exported all reports', 'success'); });
    document.getElementById('viewScheduled').addEventListener('click', () => { document.getElementById('filterStatus').value = 'pending'; filterReports(); });
    document.querySelectorAll('.quick-report').forEach(btn => btn.addEventListener('click', () => { const type = btn.dataset.type; let name = type === 'weekly' ? 'Weekly Summary' : type === 'monthly' ? 'Monthly Analytics' : 'AI Report'; showNotification(`Generating ${name}...`, 'info'); setTimeout(() => showNotification(`${name} generated!`, 'success'), 2000); }));

    const modal = document.getElementById('createReportModal');
    const openModal = () => modal.classList.remove('hidden');
    const closeModal = () => modal.classList.add('hidden');
    document.getElementById('createReportBtn')?.addEventListener('click', openModal);
    document.getElementById('createReportBtnContent').addEventListener('click', openModal);
    document.getElementById('closeCreateReportModal').addEventListener('click', closeModal);
    document.getElementById('cancelCreateReport').addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });

    document.getElementById('createReportForm').addEventListener('submit', (e) => { e.preventDefault(); const name = document.getElementById('reportName').value; showNotification(`Generating "${name}"...`, 'info'); closeModal(); });
    document.getElementById('aiLevel').addEventListener('input', (e) => { const val = e.target.value; let text = val > 66 ? 'Deep AI' : (val > 33 ? 'Advanced' : 'Basic'); document.getElementById('aiLevelValue').innerText = `${text} (${val}%)`; });

    // Charts
    new Chart(document.getElementById('reportsChart'), { type: 'doughnut', data: { labels: ['Clinical', 'Analytics', 'Research', 'Audit'], datasets: [{ data: [{{ $clinicalReports ?? 568 }}, {{ $analyticsReports ?? 342 }}, {{ $researchReports ?? 198 }}, {{ $auditReports ?? 140 }}], backgroundColor: ['rgba(20,184,166,0.8)', 'rgba(59,130,246,0.8)', 'rgba(139,92,246,0.8)', 'rgba(245,158,11,0.8)'], borderWidth: 0 }] }, options: { responsive: true, maintainAspectRatio: false, cutout: '70%', plugins: { legend: { position: 'bottom', labels: { color: '#94a3b8' } } } } });
    new Chart(document.getElementById('generationChart'), { type: 'line', data: { labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'], datasets: [{ label: 'AI Generated', data: [24,28,32,30,35,28,32], borderColor: '#14B8A6', backgroundColor: 'rgba(20,184,166,0.1)', fill: true, tension: 0.4 }, { label: 'Manual', data: [12,10,14,12,15,8,10], borderColor: '#3B82F6', backgroundColor: 'rgba(59,130,246,0.1)', fill: true, tension: 0.4 }] }, options: { responsive: true, maintainAspectRatio: false, scales: { y: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#94a3b8' } }, x: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#94a3b8' } } }, plugins: { legend: { labels: { color: '#94a3b8' } } } } });

    renderTable();
});
</script>
@endpush