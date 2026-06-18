@extends('layouts.guest')

@section('title', 'Sign In - LiverCare AI')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-accent-teal/20 blur-[150px] rounded-full mix-blend-screen pointer-events-none animate-pulse"
            style="animation-duration:4s;"></div>
        <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-accent-blue/10 blur-[150px] rounded-full mix-blend-screen pointer-events-none"
            style="animation-duration:8s;"></div>

        <div class="w-full max-w-5xl relative z-10">
            <div
                class="bg-white/[0.02] backdrop-blur-2xl border border-white/10 rounded-[2rem] sm:rounded-[2.5rem] overflow-hidden flex flex-col md:flex-row shadow-[0_20px_60px_-15px_rgba(0,0,0,0.7)] hover:border-white/20 transition-colors duration-500">

                <!-- Visual Branding Pane (Left) -->
                <div
                    class="hidden lg:flex lg:w-[40%] relative p-12 flex-col justify-between bg-gradient-to-br from-accent-teal/[0.08] via-accent-blue/[0.03] to-transparent border-r border-white/5 overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-accent-teal/[0.05] to-transparent">
                    </div>
                    <div class="absolute -left-20 -top-20 w-64 h-64 border border-accent-teal/10 rounded-full"></div>
                    <div class="absolute -left-10 -top-10 w-48 h-48 border border-accent-blue/10 rounded-full"></div>

                    <div class="relative z-10 flex-grow flex flex-col justify-center">
                        <div class="mb-10 flex flex-col gap-6">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center gap-2 text-[10px] font-bold text-slate-300 hover:text-white bg-white/5 px-4 py-2 rounded-full border border-white/10 transition-all hover:bg-white/10 hover:border-accent-teal/30 backdrop-blur-md w-fit">
                                <span class="material-symbols-outlined text-[14px]">arrow_back</span>
                                Back To Home
                            </a>
                            <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                                <img src="{{ asset('images/Logo.png') }}" alt="LiverCare" class="h-14 object-contain">
                                <span class="text-2xl font-display font-bold text-white tracking-tight">LiverCare <span
                                        class="text-accent-teal">AI</span></span>
                            </a>
                        </div>

                        <div class="space-y-6">
                            <h2 class="text-4xl lg:text-5xl font-display font-bold text-white mb-6 leading-[1.15]">
                                Welcome to the<br>
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue">Medical
                                    AI</span><br>
                                Era.
                            </h2>
                            <p class="text-slate-400 text-sm leading-relaxed max-w-[320px]">
                                Access intelligent predictive models and manage patient liver cases with unparalleled
                                accuracy.
                            </p>
                        </div>
                    </div>

                    <div class="relative z-10 mt-auto flex items-center gap-6 text-sm font-medium text-slate-500 pt-8">
                        <a href="{{ route('privacy') }}" class="hover:text-accent-teal transition-colors">Privacy Policy</a>
                        <a href="{{ route('terms') }}" class="hover:text-accent-teal transition-colors">Terms</a>
                    </div>
                </div>

                <!-- Form Pane (Right) -->
                <div class="w-full lg:w-[60%] p-8 sm:p-12 lg:p-14 bg-[#040b17]/60 relative flex flex-col justify-center">
                    <!-- Mobile header -->
                    <div class="lg:hidden flex items-center justify-between mb-8">
                        <a href="{{ route('home') }}"
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-slate-400 hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-sm">arrow_back</span>
                        </a>
                        <div class="flex items-center gap-2.5">
                            <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-10 object-contain">
                            <span class="text-sm font-display font-medium text-white">LiverCare <span
                                    class="text-accent-teal">AI</span></span>
                        </div>
                    </div>

                    <!-- Session Status -->
                    @if(session('status'))
                        <div class="mb-4 p-3 bg-emerald-500/10 border border-emerald-500/20 rounded-xl">
                            <p class="text-emerald-400 text-sm">{{ session('status') }}</p>
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if($errors->any())
                        <div class="mb-4 p-3 bg-red-500/10 border border-red-500/20 rounded-xl">
                            @foreach($errors->all() as $error)
                                <p class="text-red-400 text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="text-center">
                        <h3
                            class="text-2xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-2">
                            Sign In</h3>
                        <p class="text-slate-400 text-sm mb-8">Enter your credentials to access your dashboard.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-5" autocomplete="off">
                        @csrf

                        <!-- Email Input -->
                        <div>
                            <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2" for="email">Email
                                Address</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span
                                        class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-lg">mail</span>
                                </div>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="w-full pl-12 pr-4 py-3.5 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                    placeholder="doctor@hospital.org" required autofocus>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <label class="block text-xs font-medium text-slate-400 tracking-wider"
                                    for="password">Password</label>
                                <a href="{{ route('password.request') }}"
                                    class="text-xs font-medium text-accent-teal hover:text-accent-blue transition-colors">Forgot
                                    Password?</a>
                            </div>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span
                                        class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-lg">lock</span>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="w-full pl-12 pr-12 py-3.5 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                    placeholder="Enter your password" required>
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-lg">visibility</span>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center gap-3 pt-2">
                            <div class="relative flex items-center justify-center w-5 h-5">
                                <input type="checkbox" id="remember" name="remember"
                                    class="peer appearance-none w-5 h-5 border border-slate-600 rounded bg-transparent checked:bg-accent-teal checked:border-accent-teal transition-all cursor-pointer">
                                <span
                                    class="material-symbols-outlined text-white text-[12px] absolute pointer-events-none opacity-0 peer-checked:opacity-100 transition-opacity font-bold">check</span>
                            </div>
                            <label for="remember"
                                class="text-sm font-medium text-slate-400 cursor-pointer select-none">Remember me</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" id="loginBtn"
                                class="w-full py-4 bg-gradient-to-r bg-emerald-500 text-deep-navy font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-110 transition-all">
                                Sign In
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </button>
                        </div>
                    </form>

                    <!-- Sign Up Link -->
                    <div class="mt-8 text-center text-sm font-medium">
                        <span class="text-slate-500">Don't have an account?</span>
                        <a href="{{ route('register') }}"
                            class="text-accent-teal hover:text-accent-blue transition-colors ml-1">Create Account</a>
                    </div>
                </div>
            </div>

            <!-- Bottom Security Note -->
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
            document.getElementById('togglePassword')?.addEventListener('click', function () {
                const password = document.getElementById('password');
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<span class="material-symbols-outlined text-lg">visibility</span>' : '<span class="material-symbols-outlined text-lg">visibility_off</span>';
            });
        </script>
    @endpush
@endsection