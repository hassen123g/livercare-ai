@extends('layouts.app')

@section('title', 'Case Details - LiverCare AI')

@section('content')
<div class="pt-32 pb-24 px-6">
    <div class="max-w-5xl mx-auto">
        <div class="flex items-center gap-2 text-sm text-slate-400 mb-8">
            <a href="{{ route('profile') }}" class="hover:text-accent-teal transition-colors">Profile</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <a href="{{ route('cases.index') }}" class="hover:text-accent-teal transition-colors">All Cases</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-white font-medium">Case #{{ $case['caseNo'] ?? 'LC-2024-001' }}</span>
        </div>

        <div class="glass-card p-8 rounded-2xl mb-8 neon-border">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="flex items-center gap-5"><div class="w-16 h-16 bg-accent-teal/20 rounded-full flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal text-3xl">person</span></div><div><h1 class="text-2xl font-display font-bold text-white">{{ $case['name'] ?? 'Ahmed Mohamed' }}</h1><p class="text-slate-400 text-sm">{{ $case['caseNo'] ?? 'LC-2024-001' }} • Male, {{ $case['age'] ?? 45 }} years • Registered: {{ $case['registered'] ?? 'March 15, 2026' }}</p></div></div>
                <div class="flex items-center gap-3"><span class="px-4 py-2 text-sm font-bold rounded-full @if(($case['risk'] ?? 'Medium') == 'Low') bg-green-500/20 text-green-500 @elseif(($case['risk'] ?? 'Medium') == 'Medium') bg-yellow-500/20 text-yellow-500 @else bg-red-500/20 text-red-500 @endif">{{ $case['risk'] ?? 'Medium' }} Risk</span><button class="p-2 bg-deep-navy/50 rounded-lg border border-white/10 hover:border-accent-teal/40"><span class="material-symbols-outlined text-accent-teal">print</span></button></div>
            </div>
        </div>

        <div class="glass-card p-8 rounded-2xl mb-8">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">monitoring</span></div><h2 class="text-xl font-display font-bold text-white">Current Prediction</h2></div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="p-4 bg-deep-navy/50 rounded-xl border border-white/5 text-center"><div class="text-2xl font-bold text-yellow-500">{{ $case['riskValue'] ?? 56 }}%</div><div class="text-xs text-slate-400">Overall Risk</div></div>
                <div class="p-4 bg-deep-navy/50 rounded-xl border border-white/5 text-center"><div class="text-2xl font-bold text-accent-teal">{{ $case['condition'] ?? 'Hepatitis B' }}</div><div class="text-xs text-slate-400">Primary Condition</div></div>
                <div class="p-4 bg-deep-navy/50 rounded-xl border border-white/5 text-center"><div class="text-2xl font-bold text-accent-blue">{{ $case['progress'] ?? 65 }}%</div><div class="text-xs text-slate-400">Treatment Progress</div></div>
                <div class="p-4 bg-deep-navy/50 rounded-xl border border-white/5 text-center"><div class="text-2xl font-bold text-white">{{ $case['analyses'] ?? 3 }}</div><div class="text-xs text-slate-400">Total Analyses</div></div>
            </div>
        </div>

        <div class="glass-card p-8 rounded-2xl mb-8">
            <div class="flex items-center justify-between mb-6"><div class="flex items-center gap-3"><div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center"><span class="material-symbols-outlined text-accent-blue">labs</span></div><div><h2 class="text-xl font-display font-bold text-white">Lab Results</h2><p class="text-xs text-slate-400">Latest: {{ $case['lastLabDate'] ?? 'April 1, 2026' }}</p></div></div></div>
            <div class="overflow-x-auto"><table class="w-full text-sm"><thead><tr class="border-b border-white/10"><th class="text-left py-3 px-4 text-slate-400 font-medium">Biomarker</th><th class="text-center py-3 px-4 text-slate-400 font-medium">Value</th><th class="text-center py-3 px-4 text-slate-400 font-medium">Normal Range</th><th class="text-center py-3 px-4 text-slate-400 font-medium">Status</th></tr></thead>
            <tbody>
                @php $labResults = $case['labResults'] ?? [ ['name' => 'ALT', 'value' => '78 U/L', 'normal' => '7-56 U/L', 'status' => 'High'], ['name' => 'AST', 'value' => '62 U/L', 'normal' => '10-40 U/L', 'status' => 'High'], ['name' => 'Total Bilirubin', 'value' => '0.9 mg/dL', 'normal' => '0.1-1.2 mg/dL', 'status' => 'Normal'], ['name' => 'Albumin', 'value' => '4.1 g/dL', 'normal' => '3.5-5.5 g/dL', 'status' => 'Normal'], ['name' => 'ALP', 'value' => '95 U/L', 'normal' => '44-147 U/L', 'status' => 'Normal'] ]; @endphp
                @foreach($labResults as $lab)
                <tr class="border-b border-white/5 hover:bg-white/5"><td class="py-3 px-4 text-white font-medium">{{ $lab['name'] }}</td><td class="py-3 px-4 text-center @if($lab['status'] == 'High') text-yellow-500 font-bold @elseif($lab['status'] == 'Low') text-yellow-500 font-bold @else text-success @endif">{{ $lab['value'] }}</td><td class="py-3 px-4 text-center text-slate-400">{{ $lab['normal'] }}</td><td class="py-3 px-4 text-center"><span class="px-2 py-1 text-xs rounded-full @if($lab['status'] == 'High') bg-yellow-500/20 text-yellow-500 @elseif($lab['status'] == 'Low') bg-yellow-500/20 text-yellow-500 @else bg-green-500/20 text-green-500 @endif">{{ $lab['status'] }}</span></td></tr>
                @endforeach
            </tbody></table></div>
        </div>

        <div class="glass-card p-8 rounded-2xl">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">timeline</span></div><h2 class="text-xl font-display font-bold text-white">Analysis History</h2></div>
            <div class="relative space-y-6 before:absolute before:top-2 before:bottom-0 before:ml-4 before:w-0.5 before:bg-gradient-to-b before:from-accent-teal/50 before:via-accent-blue/50 before:to-transparent">
                @php $history = $case['history'] ?? [ ['title' => 'Analysis #3 — Latest', 'date' => 'April 1, 2026', 'risk' => 'Medium', 'riskValue' => 56, 'note' => 'ALT improved from 92 to 78. Treatment showing positive progress.'], ['title' => 'Analysis #2', 'date' => 'March 15, 2026', 'risk' => 'Medium', 'riskValue' => 64, 'note' => 'Initial treatment started. ALT at 92, AST at 71.'], ['title' => 'Analysis #1 — Initial', 'date' => 'February 28, 2026', 'risk' => 'High', 'riskValue' => 72, 'note' => 'First diagnosis. Elevated ALT (105), AST (85).'] ]; @endphp
                @foreach($history as $index => $item)
                <div class="relative pl-12"><div class="absolute left-0 top-1 w-8 h-8 bg-deep-navy border-2 {{ $loop->first ? 'border-accent-teal' : 'border-accent-blue' }} rounded-full flex items-center justify-center z-10"><span class="material-symbols-outlined {{ $loop->first ? 'text-accent-teal' : 'text-accent-blue' }} text-xs">{{ $loop->first ? 'check' : 'history' }}</span></div><div class="p-4 bg-deep-navy/50 rounded-xl border border-white/5"><div class="flex justify-between items-start mb-2"><span class="text-white font-bold text-sm">{{ $item['title'] }}</span><span class="text-xs text-slate-400">{{ $item['date'] }}</span></div><p class="text-slate-400 text-xs mb-2">Risk Level: <span class="font-bold @if($item['risk'] == 'Low') text-success @elseif($item['risk'] == 'Medium') text-warning @else text-danger @endif">{{ $item['riskValue'] }}% ({{ $item['risk'] }})</span></p><p class="text-slate-500 text-xs">{{ $item['note'] }}</p></div></div>
                @endforeach
            </div>
        </div>

        <div class="mt-8"><a href="{{ route('cases.index') }}" class="inline-flex items-center gap-2 text-slate-400 hover:text-accent-teal transition"><span class="material-symbols-outlined text-sm">arrow_back</span> Back to All Cases</a></div>
    </div>
</div>
@endsection