@extends('layouts.app')

@section('title', 'Activity Log - LiverCare AI')

@section('content')
<div class="pt-32 pb-24 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center gap-2 text-sm text-slate-400 mb-8">
            <a href="{{ route('profile') }}" class="hover:text-accent-teal transition-colors">Profile</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-white font-medium">Activity Log</span>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div><h1 class="text-3xl font-display font-bold text-white mb-2">Activity Log</h1><p class="text-slate-400 text-sm">Your complete history of actions and predictions</p></div>
            <select id="filterSelect" class="px-4 py-2 bg-deep-navy/50 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:border-accent-teal"><option value="all">All Activities</option><option value="prediction">Predictions</option><option value="profile">Profile Updates</option><option value="security">Security</option></select>
        </div>

        <div class="mb-8"><h3 class="text-sm font-bold text-accent-teal uppercase tracking-wider mb-4">Today — {{ date('F j, Y') }}</h3><div class="space-y-3">
            <div class="p-4 glass-card rounded-xl hover:border-accent-teal/30 transition-colors flex items-start gap-4"><div class="w-10 h-10 bg-accent-teal/20 rounded-lg flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-accent-teal text-sm">science</span></div><div class="flex-1"><p class="text-white text-sm font-medium">Ran prediction for patient</p><p class="text-slate-400 text-xs mt-1">Result: Moderate Risk (56%)</p><p class="text-slate-500 text-xs mt-1">2 hours ago</p></div></div>
            <div class="p-4 glass-card rounded-xl hover:border-accent-teal/30 transition-colors flex items-start gap-4"><div class="w-10 h-10 bg-accent-blue/20 rounded-lg flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-accent-blue text-sm">upload_file</span></div><div class="flex-1"><p class="text-white text-sm font-medium">Uploaded lab report</p><p class="text-slate-400 text-xs mt-1">File: lab_results.pdf (2.1 MB)</p><p class="text-slate-500 text-xs mt-1">3 hours ago</p></div></div>
            <div class="p-4 glass-card rounded-xl hover:border-accent-teal/30 transition-colors flex items-start gap-4"><div class="w-10 h-10 bg-accent-teal/20 rounded-lg flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-accent-teal text-sm">login</span></div><div class="flex-1"><p class="text-white text-sm font-medium">Signed in to LiverCare AI</p><p class="text-slate-400 text-xs mt-1">IP: 192.168.1.*** • Chrome</p><p class="text-slate-500 text-xs mt-1">5 hours ago</p></div></div>
        </div></div>

        <div class="mb-8"><h3 class="text-sm font-bold text-accent-blue uppercase tracking-wider mb-4">Yesterday — {{ date('F j, Y', strtotime('-1 day')) }}</h3><div class="space-y-3">
            <div class="p-4 glass-card rounded-xl hover:border-accent-teal/30 transition-colors flex items-start gap-4"><div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-yellow-500 text-sm">edit</span></div><div class="flex-1"><p class="text-white text-sm font-medium">Updated profile information</p><p class="text-slate-400 text-xs mt-1">Changed name and email preferences</p><p class="text-slate-500 text-xs mt-1">Yesterday at 6:30 PM</p></div></div>
            <div class="p-4 glass-card rounded-xl hover:border-accent-teal/30 transition-colors flex items-start gap-4"><div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-green-500 text-sm">person_add</span></div><div class="flex-1"><p class="text-white text-sm font-medium">Added new patient case</p><p class="text-slate-400 text-xs mt-1">Patient: Ahmed Mohamed</p><p class="text-slate-500 text-xs mt-1">Yesterday at 2:15 PM</p></div></div>
        </div></div>

        <div class="mb-8"><h3 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-4">Last Week</h3><div class="space-y-3">
            <div class="p-4 glass-card rounded-xl hover:border-accent-teal/30 transition-colors flex items-start gap-4"><div class="w-10 h-10 bg-accent-teal/20 rounded-lg flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-accent-teal text-sm">science</span></div><div class="flex-1"><p class="text-white text-sm font-medium">Ran prediction for patient</p><p class="text-slate-400 text-xs mt-1">Result: Low Risk (22%)</p><p class="text-slate-500 text-xs mt-1">{{ date('F j, Y', strtotime('-5 days')) }}</p></div></div>
            <div class="p-4 glass-card rounded-xl hover:border-accent-teal/30 transition-colors flex items-start gap-4"><div class="w-10 h-10 bg-accent-blue/20 rounded-lg flex items-center justify-center flex-shrink-0"><span class="material-symbols-outlined text-accent-blue text-sm">print</span></div><div class="flex-1"><p class="text-white text-sm font-medium">Printed case report</p><p class="text-slate-400 text-xs mt-1">Case #LC-2024-004 report generated</p><p class="text-slate-500 text-xs mt-1">{{ date('F j, Y', strtotime('-6 days')) }}</p></div></div>
        </div></div>

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
    document.getElementById('filterSelect')?.addEventListener('change', function() {
        const filter = this.value;
        const activities = document.querySelectorAll('.glass-card');
        activities.forEach(activity => {
            if (filter === 'all') activity.style.display = 'flex';
            else if (filter === 'prediction' && activity.querySelector('.material-symbols-outlined')?.textContent.includes('science')) activity.style.display = 'flex';
            else if (filter === 'profile' && activity.querySelector('.material-symbols-outlined')?.textContent.includes('edit')) activity.style.display = 'flex';
            else if (filter === 'security' && activity.querySelector('.material-symbols-outlined')?.textContent.includes('login')) activity.style.display = 'flex';
            else activity.style.display = 'none';
        });
    });
</script>
@endpush
@endsection