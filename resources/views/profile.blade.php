@extends('layouts.app')

@section('title', 'User Profile - LiverCare AI')

@section('content')
<div class="pt-32 pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-10">
            <div>
                <h1 class="text-4xl font-display font-bold text-white mb-3">User Profile</h1>
                <p class="text-slate-400">Manage your account, case history, and personal settings</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs px-3 py-1 bg-accent-teal/20 text-accent-teal rounded-full">Premium Member</span>
                <span class="text-xs px-3 py-1 bg-accent-blue/20 text-accent-blue rounded-full">Certified Physician</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 space-y-8">
                <div class="glass-card p-6 rounded-2xl">
                    <div class="flex flex-col items-center text-center mb-6">
                        <div class="relative mb-4">
                            <div class="w-32 h-32 rounded-full bg-gradient-to-r from-accent-teal/20 to-accent-blue/20 flex items-center justify-center neon-border overflow-hidden">
                                <span class="material-symbols-outlined text-accent-teal text-6xl">account_circle</span>
                            </div>
                            <div class="absolute bottom-2 right-2 w-6 h-6 bg-green-500 rounded-full border-2 border-deep-navy"></div>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-1">{{ Auth::user()->name }}</h3>
                        <p class="text-slate-400 mb-3">Hepatology Specialist</p>
                        <div class="grid grid-cols-3 gap-4 w-full mt-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-accent-teal">{{ Auth::user()->predictions()->count() }}</div>
                                <div class="text-xs text-slate-400">Cases</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-accent-blue">76%</div>
                                <div class="text-xs text-slate-400">Avg. Progress</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white">42%</div>
                                <div class="text-xs text-slate-400">Avg. Risk</div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-accent-teal/10 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-accent-teal">mail</span>
                            </div>
                            <div>
                                <p class="text-sm text-slate-400">Email</p>
                                <p class="text-white">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-accent-blue/10 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-accent-blue">location_on</span>
                            </div>
                            <div>
                                <p class="text-sm text-slate-400">Hospital</p>
                                <p class="text-white">Cairo Specialized Hospital</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-white">verified_user</span>
                            </div>
                            <div>
                                <p class="text-sm text-slate-400">Status</p>
                                <p class="text-white">Active • Since {{ Auth::user()->created_at->format('M Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-white/10 space-y-3">
                        <a href="{{ route('profile.edit') }}" class="w-full py-3 bg-accent-teal/20 text-accent-teal font-medium rounded-xl flex items-center justify-center gap-2 hover:bg-accent-teal/30 transition-all">
                            <span class="material-symbols-outlined text-sm">edit</span> Edit Profile
                        </a>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-xl font-bold text-white mb-6">Recent Cases</h3>
                    @forelse(Auth::user()->predictions()->latest()->take(5)->get() as $prediction)
                    <div class="p-4 rounded-xl bg-deep-navy/50 border border-white/10 mb-4 hover:border-accent-teal/30 transition-all">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h4 class="font-bold text-white mb-1">{{ $prediction->patient_name ?? 'Anonymous Patient' }}</h4>
                                <p class="text-sm text-slate-400">Analyzed on {{ $prediction->created_at->format('M d, Y') }}</p>
                            </div>
                            <span class="px-3 py-1 text-xs rounded-full 
                                @if($prediction->risk_level == 'Low') bg-green-500/20 text-green-500
                                @elseif($prediction->risk_level == 'Moderate') bg-yellow-500/20 text-yellow-500
                                @else bg-red-500/20 text-red-500 @endif">
                                {{ $prediction->risk_level }} Risk
                            </span>
                        </div>
                        <div class="flex justify-between items-center mt-3">
                            <div class="text-xs text-slate-400">
                                <span class="material-symbols-outlined align-text-bottom text-xs">analytics</span>
                                Score: {{ round($prediction->risk_score) }}%
                            </div>
                            <a href="{{ route('prediction.results', $prediction) }}" class="text-xs text-accent-teal hover:text-accent-teal/80 transition-colors flex items-center gap-1">
                                View Details <span class="material-symbols-outlined text-sm">chevron_right</span>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8">
                        <span class="material-symbols-outlined text-slate-500 text-5xl mb-4">folder_off</span>
                        <p class="text-slate-400">No predictions yet</p>
                        <a href="{{ route('prediction.create') }}" class="mt-4 inline-block text-accent-teal hover:text-accent-teal/80">Create your first prediction →</a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection