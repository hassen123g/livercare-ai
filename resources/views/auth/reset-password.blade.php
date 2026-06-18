@extends('layouts.guest')

@section('title', 'Reset Password - LiverCare AI')

@section('content')
<div class="min-h-screen flex items-center justify-center overflow-x-hidden p-4 sm:p-8 relative">
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-accent-teal/20 blur-[150px] rounded-full mix-blend-screen pointer-events-none animate-pulse" style="animation-duration:4s;"></div>
    <div class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-accent-blue/10 blur-[150px] rounded-full mix-blend-screen pointer-events-none" style="animation-duration:8s;"></div>

    <div class="w-full max-w-5xl relative z-10">
        <div class="bg-white/[0.02] backdrop-blur-2xl border border-white/10 rounded-[2rem] sm:rounded-[2.5rem] overflow-hidden flex flex-col lg:flex-row shadow-[0_20px_60px_-15px_rgba(0,0,0,0.7)]">
            
            <!-- Left Branding -->
            <div class="hidden lg:flex lg:w-[40%] relative p-12 flex-col justify-between bg-gradient-to-br from-accent-blue/[0.08] via-accent-teal/[0.03] to-transparent border-r border-white/5 overflow-hidden">
                <div class="relative z-10 flex-grow flex flex-col justify-center">
                    <div class="mb-10">
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-[10px] font-bold text-slate-300 hover:text-white bg-white/5 px-4 py-2 rounded-full border border-white/10 transition-all w-fit">
                            <span class="material-symbols-outlined text-[14px]">arrow_back</span> Back To Login
                        </a>
                    </div>
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-display font-bold text-white mb-6 leading-[1.15]">
                            Set New<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue">Password</span>
                        </h2>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-[320px]">Create a strong password for your account to keep it secure.</p>
                    </div>
                    <div class="space-y-4 pt-2 mt-6">
                        <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-xl">shield</span><span class="text-sm font-medium">Secure Encryption</span></div>
                        <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-blue text-xl">password</span><span class="text-sm font-medium">Strong Password Policy</span></div>
                    </div>
                </div>
                <div class="relative z-10 mt-auto flex items-center gap-6 text-sm font-medium text-slate-500 pt-8">
                    <a href="{{ route('privacy') }}" class="hover:text-accent-teal transition-colors">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:text-accent-teal transition-colors">Terms</a>
                </div>
            </div>

            <!-- Right Form -->
            <div class="w-full lg:w-[60%] p-8 sm:p-12 lg:p-14 bg-[#040b17]/60 relative flex flex-col justify-center">
                <div class="lg:hidden flex items-center justify-between mb-8">
                    <a href="{{ route('login') }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-slate-400 hover:text-white">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                    </a>
                    <div class="flex items-center gap-2.5">
                        <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-10 object-contain">
                        <span class="text-sm font-display font-medium text-white">LiverCare <span class="text-accent-teal">AI</span></span>
                    </div>
                </div>

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                        @foreach($errors->all() as $error)
                            <p class="text-red-400 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="text-center mb-8">
                    <div class="w-16 h-16 mx-auto bg-accent-blue/10 rounded-2xl flex items-center justify-center mb-5 border border-accent-blue/20">
                        <span class="material-symbols-outlined text-accent-blue text-3xl">password</span>
                    </div>
                    <h3 class="text-2xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-2">Reset Password</h3>
                    <p class="text-slate-400 text-sm">Create a new strong password for your account.</p>
                </div>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div>
                        <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-slate-500 text-lg">mail</span>
                            </div>
                            <input type="email" name="email" value="{{ old('email', $request->email) }}" required
                                class="w-full pl-12 pr-4 py-3.5 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal transition-all text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">New Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-slate-500 text-lg">lock</span>
                            </div>
                            <input type="password" name="password" id="password" required
                                class="w-full pl-12 pr-12 py-3.5 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal transition-all text-sm" placeholder="Min 8 characters" minlength="8">
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-white">
                                <span class="material-symbols-outlined text-lg">visibility</span>
                            </button>
                        </div>
                    </div>

                    <!-- Password Strength Meter -->
                    <div class="space-y-2">
                        <div class="flex gap-1.5">
                            <div class="h-1 flex-1 rounded-full bg-white/10" id="str1"></div>
                            <div class="h-1 flex-1 rounded-full bg-white/10" id="str2"></div>
                            <div class="h-1 flex-1 rounded-full bg-white/10" id="str3"></div>
                            <div class="h-1 flex-1 rounded-full bg-white/10" id="str4"></div>
                        </div>
                        <p class="text-xs text-slate-500" id="strengthLabel">Enter a password</p>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Confirm New Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-slate-500 text-lg">lock_reset</span>
                            </div>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="w-full pl-12 pr-4 py-3.5 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal transition-all text-sm">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" id="loginBtn"
                                class="w-full py-4 bg-gradient-to-r bg-emerald-500 text-deep-navy font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-110 transition-all">
                                Reset Password
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-8">
            <div class="flex justify-center items-center gap-2 text-xs font-medium text-slate-500">
                <span class="material-symbols-outlined text-[16px]">verified_user</span>
                <span>HIPAA Compliant &bull; End-to-End Encrypted Secure Gateway</span>
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

    const passwordInput = document.getElementById('password');
    const strengthBars = [document.getElementById('str1'), document.getElementById('str2'), document.getElementById('str3'), document.getElementById('str4')];
    const strengthLabel = document.getElementById('strengthLabel');

    passwordInput?.addEventListener('input', function() {
        const val = this.value;
        let strength = 0;
        if (val.length >= 8) strength++;
        if (/[A-Z]/.test(val)) strength++;
        if (/[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;
        
        const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500'];
        const labels = ['Weak', 'Fair', 'Good', 'Strong'];
        
        for (let i = 0; i < 4; i++) {
            strengthBars[i].className = 'h-1 flex-1 rounded-full transition-all duration-300 ' + (i < strength ? colors[Math.min(strength - 1, 3)] : 'bg-white/10');
        }
        
        if (val.length === 0) {
            strengthLabel.textContent = 'Enter a password';
            strengthLabel.className = 'text-xs text-slate-500';
        } else {
            strengthLabel.textContent = labels[Math.min(strength - 1, 3)] || 'Too short';
            const labelColors = ['text-red-400', 'text-orange-400', 'text-yellow-400', 'text-green-400'];
            strengthLabel.className = 'text-xs font-medium ' + (labelColors[Math.min(strength - 1, 3)] || 'text-red-400');
        }
    });
</script>
@endpush
@endsection