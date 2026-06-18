@extends('layouts.guest')

@section('title', 'Confirm Password - LiverCare AI')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-8">
    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-accent-teal/20 blur-[150px] rounded-full mix-blend-screen pointer-events-none animate-pulse" style="animation-duration:4s;"></div>
    <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-accent-blue/10 blur-[150px] rounded-full mix-blend-screen pointer-events-none" style="animation-duration:8s;"></div>

    <div class="w-full max-w-md relative z-10">
        <div class="glass-card p-8 rounded-2xl neon-border text-center">
            <div class="w-16 h-16 mx-auto bg-accent-teal/10 rounded-2xl flex items-center justify-center mb-5 border border-accent-teal/20">
                <span class="material-symbols-outlined text-accent-teal text-3xl">lock</span>
            </div>
            <h2 class="text-2xl font-display font-bold text-white mb-2">Confirm Password</h2>
            <p class="text-slate-400 text-sm mb-6">This is a secure area. Please confirm your password before continuing.</p>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-500/10 border border-red-500/20 rounded-xl">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-400 text-xs">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
                @csrf

                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-slate-500 text-lg">lock</span>
                        </div>
                        <input type="password" name="password" id="password" required autofocus
                            class="w-full pl-12 pr-12 py-3.5 border border-white/10 rounded-xl text-white placeholder-slate-600 focus:border-accent-teal transition-all text-sm" placeholder="Enter your password">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-white">
                            <span class="material-symbols-outlined text-lg">visibility</span>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-accent-teal to-accent-blue text-deep-navy font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-110 transition-all">
                    <span class="material-symbols-outlined text-sm">verified</span> Confirm Password
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-white/10">
                <div class="flex items-center justify-center gap-4 text-xs text-slate-500">
                    <div class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-accent-teal">shield</span> Secure Connection</div>
                    <div class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-accent-blue">encrypted</span> Encrypted Data</div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <div class="flex justify-center items-center gap-2 text-xs font-medium text-slate-500">
                <span class="material-symbols-outlined text-[16px]">verified_user</span>
                <span>HIPAA Compliant • End-to-End Encrypted Secure Gateway</span>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('togglePassword')?.addEventListener('click', function() {
        const password = document.getElementById('password');
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password' ? '<span class="material-symbols-outlined text-lg">visibility</span>' : '<span class="material-symbols-outlined text-lg">visibility_off</span>';
    });
</script>
@endpush
@endsection