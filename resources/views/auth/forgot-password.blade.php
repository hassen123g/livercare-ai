@extends('layouts.guest')

@section('title', 'Forgot Password - LiverCare AI')

@section('content')
<div class="min-h-screen flex items-center justify-center overflow-x-hidden p-4 sm:p-8 relative">
    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-accent-teal/20 blur-[150px] rounded-full mix-blend-screen pointer-events-none animate-pulse" style="animation-duration:4s;"></div>
    <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-accent-blue/10 blur-[150px] rounded-full mix-blend-screen pointer-events-none" style="animation-duration:8s;"></div>

    <div class="w-full max-w-5xl relative z-10">
        <div class="bg-white/[0.02] backdrop-blur-2xl border border-white/10 rounded-[2rem] sm:rounded-[2.5rem] overflow-hidden flex flex-col lg:flex-row shadow-[0_20px_60px_-15px_rgba(0,0,0,0.7)]">
            
            <!-- Left Branding -->
            <div class="hidden lg:flex lg:w-[40%] relative p-12 flex-col justify-between bg-gradient-to-br from-accent-teal/[0.08] via-accent-blue/[0.03] to-transparent border-r border-white/5 overflow-hidden">
                <div class="relative z-10 flex-grow flex flex-col justify-center">
                    <div class="mb-10">
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-[10px] font-bold text-slate-300 hover:text-white bg-white/5 px-4 py-2 rounded-full border border-white/10 transition-all w-fit">
                            <span class="material-symbols-outlined text-[14px]">arrow_back</span> Back To Login
                        </a>
                    </div>
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-display font-bold text-white mb-6 leading-[1.15]">
                            Account<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue">Recovery</span>
                        </h2>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-[320px]">Don't worry, it happens to the best of us. We'll help you get back into your account securely.</p>
                    </div>
                    <div class="space-y-4 pt-2 mt-6">
                        <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-xl">shield</span><span class="text-sm font-medium">Secure Reset Process</span></div>
                        <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-blue text-xl">mark_email_read</span><span class="text-sm font-medium">Email Verification</span></div>
                        <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-xl">lock_reset</span><span class="text-sm font-medium">Encrypted Password Update</span></div>
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

                @if(session('status'))
                    <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl">
                        <p class="text-emerald-400 text-sm">{{ session('status') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                        @foreach($errors->all() as $error)
                            <p class="text-red-400 text-sm">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="text-center mb-8">
                    <div class="w-16 h-16 mx-auto bg-accent-teal/10 rounded-2xl flex items-center justify-center mb-5 border border-accent-teal/20">
                        <span class="material-symbols-outlined text-accent-teal text-3xl">lock_reset</span>
                    </div>
                    <h3 class="text-2xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-2">Forgot Password?</h3>
                    <p class="text-slate-400 text-sm">Enter your email address and we'll send you a link to reset your password.</p>
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-lg">mail</span>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full pl-12 pr-4 py-3.5 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                placeholder="Enter your registered email">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 bg-gradient-to-r from-accent-teal to-accent-blue text-deep-navy font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-110 transition-all">
                            Send Reset Link
                            <span class="material-symbols-outlined text-sm">send</span>
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-white/10 text-center text-sm font-medium">
                    <span class="text-slate-500">Remember your password?</span>
                    <a href="{{ route('login') }}" class="text-accent-teal hover:text-accent-blue transition-colors ml-1">Sign In</a>
                </div>
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
@endsection