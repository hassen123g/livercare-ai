@extends('layouts.app')

@section('title', 'All Cases - LiverCare AI')

@section('content')
<div class="pt-32 pb-24 px-6">
    <div class="max-w-5xl mx-auto">
        <div class="flex items-center gap-2 text-sm text-slate-400 mb-8">
            <a href="{{ route('profile') }}" class="hover:text-accent-teal transition-colors">Profile</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-white font-medium">All Cases</span>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div><h1 class="text-3xl font-display font-bold text-white mb-2">All Patient Cases</h1><p class="text-slate-400 text-sm">Manage and track all your patient cases</p></div>
            <div class="flex gap-3">
                <select id="riskFilter" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:border-accent-teal"><option value="all">All Risks</option><option value="Low">Low Risk</option><option value="Medium">Medium Risk</option><option value="High">High Risk</option></select>
                <div class="relative"><span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">search</span><input type="text" id="searchInput" placeholder="Search cases..." class="pl-9 pr-4 py-2 bg-deep-navy/50 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:border-accent-teal w-48"></div>
            </div>
        </div>

        <div id="casesContainer" class="space-y-4">
            @php
                $cases = [
                    ['id' => 1, 'name' => 'Sarah Abdullah', 'caseNo' => 'LC-2024-001', 'risk' => 'Low', 'riskValue' => 22, 'lastCheck' => '2 days ago'],
                    ['id' => 2, 'name' => 'Mohamed Khalid', 'caseNo' => 'LC-2024-002', 'risk' => 'Medium', 'riskValue' => 58, 'lastCheck' => '4 days ago'],
                    ['id' => 3, 'name' => 'Fatima Ali', 'caseNo' => 'LC-2024-003', 'risk' => 'High', 'riskValue' => 82, 'lastCheck' => '9 days ago'],
                    ['id' => 4, 'name' => 'Omar Hassan', 'caseNo' => 'LC-2024-004', 'risk' => 'Low', 'riskValue' => 18, 'lastCheck' => '1 week ago'],
                    ['id' => 5, 'name' => 'Youssef Ibrahim', 'caseNo' => 'LC-2024-005', 'risk' => 'Low', 'riskValue' => 12, 'lastCheck' => '2 weeks ago'],
                    ['id' => 6, 'name' => 'Layla Mahmoud', 'caseNo' => 'LC-2024-006', 'risk' => 'Low', 'riskValue' => 25, 'lastCheck' => '3 weeks ago'],
                ];
            @endphp

            @foreach($cases as $case)
            <a href="{{ route('cases.show', $case['id']) }}" class="block p-5 glass-card rounded-xl hover:border-accent-teal/40 transition-colors case-item" data-risk="{{ $case['risk'] }}" data-name="{{ strtolower($case['name']) }}">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4"><div class="w-12 h-12 bg-accent-teal/20 rounded-full flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">person</span></div><div><h3 class="font-bold text-white">{{ $case['name'] }}</h3><p class="text-xs text-slate-400">{{ $case['caseNo'] }} • Last check: {{ $case['lastCheck'] }}</p></div></div>
                    <div class="flex items-center gap-4"><div class="text-right hidden md:block"><div class="text-sm font-bold @if($case['risk'] == 'Low') text-success @elseif($case['risk'] == 'Medium') text-warning @else text-danger @endif">{{ $case['riskValue'] }}%</div><div class="text-xs text-slate-400">Risk</div></div><span class="px-3 py-1 text-xs rounded-full @if($case['risk'] == 'Low') bg-green-500/20 text-green-500 border border-green-500/30 @elseif($case['risk'] == 'Medium') bg-yellow-500/20 text-yellow-500 border border-yellow-500/30 @else bg-red-500/20 text-red-500 border border-red-500/30 @endif">{{ $case['risk'] }} Risk</span><span class="material-symbols-outlined text-slate-400">chevron_right</span></div>
                </div>
            </a>
            @endforeach
        </div>

        <div id="emptyState" class="hidden text-center py-12"><span class="material-symbols-outlined text-slate-600 text-5xl mb-4">folder_off</span><p class="text-slate-400">No cases found matching your criteria</p></div>

        <div class="flex items-center justify-center gap-2 mt-8">
            <button class="w-10 h-10 rounded-lg bg-deep-navy/50 border border-white/10 flex items-center justify-center text-slate-400 hover:border-accent-teal/40"><span class="material-symbols-outlined text-sm">chevron_left</span></button>
            <button class="w-10 h-10 rounded-lg bg-accent-teal/20 border border-accent-teal/50 flex items-center justify-center text-accent-teal font-bold text-sm">1</button>
            <button class="w-10 h-10 rounded-lg bg-deep-navy/50 border border-white/10 flex items-center justify-center text-slate-400 hover:border-accent-teal/40 text-sm">2</button>
            <button class="w-10 h-10 rounded-lg bg-deep-navy/50 border border-white/10 flex items-center justify-center text-slate-400 hover:border-accent-teal/40 text-sm">3</button>
            <button class="w-10 h-10 rounded-lg bg-deep-navy/50 border border-white/10 flex items-center justify-center text-slate-400 hover:border-accent-teal/40"><span class="material-symbols-outlined text-sm">chevron_right</span></button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const riskFilter = document.getElementById('riskFilter');
    const searchInput = document.getElementById('searchInput');
    const cases = document.querySelectorAll('.case-item');
    const emptyState = document.getElementById('emptyState');

    function filterCases() {
        const risk = riskFilter.value;
        const search = searchInput.value.toLowerCase();
        let visibleCount = 0;

        cases.forEach(caseItem => {
            const caseRisk = caseItem.dataset.risk;
            const caseName = caseItem.dataset.name;
            const matchesRisk = risk === 'all' || caseRisk === risk;
            const matchesSearch = caseName.includes(search);
            if (matchesRisk && matchesSearch) { caseItem.style.display = 'block'; visibleCount++; }
            else { caseItem.style.display = 'none'; }
        });
        emptyState.classList.toggle('hidden', visibleCount > 0);
    }

    riskFilter.addEventListener('change', filterCases);
    searchInput.addEventListener('input', filterCases);
</script>
@endpush
@endsection