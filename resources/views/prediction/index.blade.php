@extends('layouts.app')

@section('title', 'Prediction Database - LiverCare AI')

@section('content')
<div class="py-8 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <div>
                <h1 class="text-3xl font-display font-bold bg-gradient-to-r from-emerald-400 to-cyan-400 bg-clip-text text-transparent">
                    Prediction Database
                </h1>
                <p class="text-gray-400 mt-2">View and manage all your liver disease predictions</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('prediction.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-cyan-600 rounded-lg hover:from-emerald-500 hover:to-cyan-500 transition">
                    <span class="material-symbols-outlined text-sm mr-2">add</span>
                    New Prediction
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="glass-card rounded-xl border border-gray-800 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Total Predictions</p>
                        <p class="text-2xl font-bold text-white">{{ $predictions->total() }}</p>
                    </div>
                    <div class="w-10 h-10 bg-emerald-500/20 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-emerald-400">analytics</span>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-xl border border-gray-800 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">High Risk</p>
                        <p class="text-2xl font-bold text-red-400">
                            {{ $predictions->where('risk_level', 'High')->count() }}
                        </p>
                    </div>
                    <div class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-red-400">warning</span>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-xl border border-gray-800 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Moderate Risk</p>
                        <p class="text-2xl font-bold text-yellow-400">
                            {{ $predictions->where('risk_level', 'Moderate')->count() }}
                        </p>
                    </div>
                    <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-yellow-400">priority</span>
                    </div>
                </div>
            </div>

            <div class="glass-card rounded-xl border border-gray-800 p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-400 text-sm">Low Risk</p>
                        <p class="text-2xl font-bold text-green-400">
                            {{ $predictions->where('risk_level', 'Low')->count() }}
                        </p>
                    </div>
                    <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-green-400">check_circle</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="glass-card rounded-xl border border-gray-800 p-4 mb-8">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1 relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span>
                    <input type="text" id="searchInput" placeholder="Search by patient name..." 
                           class="w-full pl-10 pr-4 py-2 bg-deep-navy/50 border border-white/10 rounded-lg focus:border-accent-teal focus:outline-none text-gray-300">
                </div>
                <div class="flex gap-3">
                    <select id="riskFilter" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-lg text-gray-300 focus:border-accent-teal focus:outline-none">
                        <option value="all">All Risks</option>
                        <option value="Low">Low Risk</option>
                        <option value="Moderate">Moderate Risk</option>
                        <option value="High">High Risk</option>
                    </select>
                    <button id="exportBtn" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-lg hover:bg-white/5 transition flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">download</span>
                        Export CSV
                    </button>
                </div>
            </div>
        </div>

        <!-- Predictions Table -->
        <div class="glass-card rounded-2xl border border-gray-800 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-800/50 border-b border-gray-800">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Date</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Patient</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Age</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Risk Score</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-400 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        @forelse($predictions as $prediction)
                        <tr class="hover:bg-gray-800/30 transition prediction-row" 
                            data-risk="{{ $prediction->risk_level }}"
                            data-name="{{ strtolower($prediction->patient_name ?? 'anonymous') }}">
                            <td class="px-6 py-4 text-sm text-gray-300 whitespace-nowrap">
                                {{ $prediction->created_at->format('M d, Y') }}
                                <div class="text-xs text-gray-500">{{ $prediction->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-300">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-emerald-500/20 to-cyan-500/20 rounded-full flex items-center justify-center">
                                        <span class="text-xs font-semibold">
                                            {{ strtoupper(substr($prediction->patient_name ?? 'A', 0, 2)) }}
                                        </span>
                                    </div>
                                    <span>{{ $prediction->patient_name ?? 'Anonymous Patient' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-300">{{ $prediction->age ?? '—' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="flex-1">
                                        <div class="bg-gray-700 rounded-full h-2 w-24">
                                            <div class="rounded-full h-2 transition-all duration-500
                                                @if($prediction->risk_score <= 30) bg-green-500
                                                @elseif($prediction->risk_score <= 70) bg-yellow-500
                                                @else bg-red-500 @endif"
                                                style="width: {{ $prediction->risk_score }}%">
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-sm font-semibold">{{ round($prediction->risk_score) }}%</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium 
                                    @if($prediction->risk_level == 'Low') bg-green-500/20 text-green-400 border border-green-500/50
                                    @elseif($prediction->risk_level == 'Moderate') bg-yellow-500/20 text-yellow-400 border border-yellow-500/50
                                    @else bg-red-500/20 text-red-400 border border-red-500/50 @endif">
                                    <span class="w-1.5 h-1.5 rounded-full mr-1.5
                                        @if($prediction->risk_level == 'Low') bg-green-400
                                        @elseif($prediction->risk_level == 'Moderate') bg-yellow-400
                                        @else bg-red-400 @endif">
                                    </span>
                                    {{ $prediction->risk_level }} Risk
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('prediction.results', $prediction) }}" class="text-emerald-400 hover:text-emerald-300" title="View Results">
                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                    </a>
                                    <a href="{{ route('prediction.export', $prediction) }}" class="text-gray-400 hover:text-gray-300" title="Export Results">
                                        <span class="material-symbols-outlined text-sm">download</span>
                                    </a>
                                    <button onclick="confirmDelete({{ $prediction->id }})" class="text-red-400 hover:text-red-300" title="Delete">
                                        <span class="material-symbols-outlined text-sm">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <span class="material-symbols-outlined text-slate-600 text-5xl mb-4">folder_off</span>
                                    <p class="text-gray-400 text-lg mb-2">No predictions yet</p>
                                    <p class="text-gray-500 text-sm mb-4">Start by creating your first AI prediction</p>
                                    <a href="{{ route('prediction.create') }}" class="px-4 py-2 bg-emerald-600 rounded-lg hover:bg-emerald-500 transition">
                                        Create First Prediction
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($predictions->hasPages())
            <div class="px-6 py-4 border-t border-gray-800">
                {{ $predictions->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-gray-900 rounded-2xl border border-gray-800 p-6 max-w-md w-full mx-4">
        <div class="flex items-center justify-center mb-4">
            <div class="w-12 h-12 bg-red-500/20 rounded-full flex items-center justify-center">
                <span class="material-symbols-outlined text-red-400 text-2xl">warning</span>
            </div>
        </div>
        <h3 class="text-xl font-bold text-center mb-2">Delete Prediction</h3>
        <p class="text-gray-400 text-center mb-6">Are you sure you want to delete this prediction? This action cannot be undone.</p>
        <div class="flex gap-3">
            <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2 bg-gray-800 rounded-lg hover:bg-gray-700 transition">
                Cancel
            </button>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 rounded-lg hover:bg-red-500 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    form.action = `/prediction/${id}`;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Search and filter
const searchInput = document.getElementById('searchInput');
const riskFilter = document.getElementById('riskFilter');
const rows = document.querySelectorAll('.prediction-row');

function filterTable() {
    const searchTerm = searchInput.value.toLowerCase();
    const riskValue = riskFilter.value;
    
    rows.forEach(row => {
        const name = row.dataset.name;
        const risk = row.dataset.risk;
        
        const matchesSearch = name.includes(searchTerm);
        const matchesRisk = riskValue === 'all' || risk === riskValue;
        
        row.style.display = matchesSearch && matchesRisk ? '' : 'none';
    });
}

searchInput.addEventListener('input', filterTable);
riskFilter.addEventListener('change', filterTable);

// Export functionality
document.getElementById('exportBtn')?.addEventListener('click', function() {
    const data = [];
    
    document.querySelectorAll('.prediction-row').forEach(row => {
        if (row.style.display !== 'none') {
            const cells = row.querySelectorAll('td');
            if (cells.length >= 4) {
                data.push({
                    date: cells[0]?.innerText.trim() || '',
                    patient: cells[1]?.innerText.trim() || '',
                    age: cells[2]?.innerText.trim() || '',
                    risk_score: cells[3]?.innerText.trim() || '',
                    risk_level: cells[4]?.innerText.trim() || ''
                });
            }
        }
    });
    
    const csv = [['Date', 'Patient Name', 'Age', 'Risk Score', 'Risk Level']];
    data.forEach(item => {
        csv.push([item.date, item.patient, item.age, item.risk_score, item.risk_level]);
    });
    
    const csvContent = csv.map(row => row.join(',')).join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = 'predictions_export.csv';
    link.click();
    URL.revokeObjectURL(link.href);
});

// Close modal when clicking outside
document.getElementById('deleteModal')?.addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
</script>
@endsection