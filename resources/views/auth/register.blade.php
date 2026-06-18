@extends('layouts.guest')

@section('title', 'Create Account - LiverCare AI')

@section('content')
    <div class="min-h-screen flex items-ce
    nter justify-center overflow-x-hidden p-4 sm:p-8 relative">
        <style>
            input:-webkit-autofill,
            input:-webkit-autofill:hover,
            input:-webkit-autofill:focus,
            input:-webkit-autofill:active {
                -webkit-box-shadow: 0 0 0 1000px #0a1628 inset !important;
                -webkit-text-fill-color: white !important;
                font-size: 0.875rem !important;
                font-family: inherit !important;
            }
        </style>

        <div
            class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-accent-teal/20 blur-[150px] rounded-full mix-blend-screen pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-accent-blue/10 blur-[150px] rounded-full mix-blend-screen pointer-events-none">
        </div>

        <div class="w-full max-w-6xl relative z-10">
            <!-- Stepper Progress -->
            <div class="mb-14 max-w-md mx-auto w-full relative">
                <div class="flex items-center justify-between relative px-2">
                    <div class="absolute left-0 top-[1.25rem] w-full h-1 bg-white/10 rounded-full z-0"></div>
                    <div
                        class="absolute left-0 top-[1.25rem] w-[0%] h-1 bg-gradient-to-r from-accent-teal to-accent-blue rounded-full z-0 transition-all duration-500">
                    </div>

                    <!-- Step 1 (Active) -->
                    <div class="relative z-10 flex flex-col items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-accent-teal text-deep-navy flex items-center justify-center font-bold shadow-[0_0_20px_rgba(20,184,166,0.4)] border-2 border-accent-teal/50">
                            1
                        </div>
                        <span
                            class="text-[10px] sm:text-xs font-bold text-accent-teal uppercase tracking-widest">Account</span>
                    </div>

                    <!-- Step 2 (Pending) -->
                    <div class="relative z-10 flex flex-col items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/20 text-slate-500 flex items-center justify-center font-bold backdrop-blur-md">
                            2
                        </div>
                        <span
                            class="text-[10px] sm:text-xs font-bold text-slate-500 uppercase tracking-widest">Verify</span>
                    </div>

                    <!-- Step 3 (Pending) -->
                    <div class="relative z-10 flex flex-col items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-white/5 border border-white/20 text-slate-500 flex items-center justify-center font-bold backdrop-blur-md">
                            3
                        </div>
                        <span
                            class="text-[10px] sm:text-xs font-bold text-slate-500 uppercase tracking-widest">Profile</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white/[0.02] backdrop-blur-2xl border border-white/10 rounded-[2rem] sm:rounded-[2.5rem] overflow-hidden flex flex-col lg:flex-row shadow-[0_20px_60px_-15px_rgba(0,0,0,0.7)] hover:border-white/20 transition-colors duration-500">

                <!-- Visual Branding Pane -->
                <div
                    class="hidden lg:flex lg:w-[40%] relative p-12 flex-col justify-between bg-gradient-to-br from-accent-blue/[0.08] via-accent-teal/[0.03] to-transparent border-r border-white/5 overflow-hidden">
                    <div class="relative z-10 flex-grow flex flex-col justify-center">
                        <div class="mb-10 flex flex-col gap-6">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center gap-2 text-[10px] font-bold text-slate-300 hover:text-white bg-white/5 px-4 py-2 rounded-full border border-white/10 transition-all w-fit">
                                <span class="material-symbols-outlined text-[14px]">arrow_back</span>
                                Back To Home
                            </a>
                            <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                                <img src="{{ asset('images/Logo.png') }}" alt="LiverCare" class="h-14 object-contain">
                                <span class="text-2xl font-display font-bold text-white tracking-tight">LiverCare <span
                                        class="text-accent-teal">AI</span></span>
                            </a>
                        </div>
                        <div>
                            <h2 class="text-4xl lg:text-5xl font-display font-bold text-white mb-6 leading-[1.15]">
                                Join the<br>
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue">Revolution</span><br>
                                in Care.
                            </h2>
                            <p class="text-slate-400 text-sm leading-relaxed max-w-[320px]">Create your account to unlock
                                powerful AI predictive models and secure case management.</p>
                        </div>
                        <div class="space-y-4 pt-2 mt-6">
                            <div class="flex items-center gap-3 text-slate-300"><span
                                    class="material-symbols-outlined text-accent-teal text-xl">analytics</span><span
                                    class="text-sm font-medium">Advanced Predictive Analysis</span></div>
                            <div class="flex items-center gap-3 text-slate-300"><span
                                    class="material-symbols-outlined text-accent-blue text-xl">security</span><span
                                    class="text-sm font-medium">Secure Case Management</span></div>
                            <div class="flex items-center gap-3 text-slate-300"><span
                                    class="material-symbols-outlined text-accent-teal text-xl">verified</span><span
                                    class="text-sm font-medium">HIPAA Compliant Gateway</span></div>
                        </div>
                    </div>
                    <div class="relative z-10 mt-auto flex items-center gap-6 text-sm font-medium text-slate-500 pt-8">
                        <a href="{{ route('privacy') }}" class="hover:text-accent-teal transition-colors">Privacy Policy</a>
                        <a href="{{ route('terms') }}" class="hover:text-accent-teal transition-colors">Terms</a>
                    </div>
                </div>

                <!-- Form Pane -->
                <div class="w-full lg:w-[60%] p-6 sm:p-10 lg:p-14 bg-[#040b17]/60 relative flex flex-col justify-center">
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

                    @if($errors->any())
                        <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-xl">
                            @foreach($errors->all() as $error)
                                <p class="text-red-400 text-sm">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <div class="mb-8 text-center mt-2">
                        <h3
                            class="text-2xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-2">
                            Create Account</h3>
                        <p class="text-slate-400 text-sm">Step 1: Enter your primary account details.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5" autocomplete="off">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">First
                                    Name</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span
                                            class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">person</span>
                                    </div>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                        class="w-full pl-11 pr-4 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                        placeholder="Ali">
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Last
                                    Name</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span
                                            class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">person</span>
                                    </div>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                        class="w-full pl-11 pr-4 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                        placeholder="Mohamed">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Email
                                Address</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span
                                        class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">mail</span>
                                </div>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full pl-11 pr-4 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                    placeholder="doctor@hospital.org">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Country</label>
                                <select name="country"
                                    class="w-full px-4 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white focus:border-accent-teal transition-all text-sm appearance-none">
                                    <option value="">Select Country</option>
                                    <option value="EG" {{ old('country') == 'EG' ? 'selected' : '' }}>Egypt</option>
                                    <option value="SA" {{ old('country') == 'SA' ? 'selected' : '' }}>Saudi Arabia</option>
                                    <option value="AE" {{ old('country') == 'AE' ? 'selected' : '' }}>United Arab Emirates
                                    </option>
                                    <option value="KW" {{ old('country') == 'KW' ? 'selected' : '' }}>Kuwait</option>
                                    <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                    <option value="UK" {{ old('country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Date of
                                    Birth</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span
                                            class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">calendar_today</span>
                                    </div>
                                    <input type="date" name="dob" value="{{ old('dob') }}"
                                        class="w-full pl-11 pr-4 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner [color-scheme:dark]">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Gender</label>
                                <div class="flex items-center gap-6 py-2">
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}
                                            class="appearance-none w-5 h-5 rounded-full border border-white/20 checked:border-[5px] checked:border-accent-teal bg-transparent transition-all cursor-pointer"
                                            required>
                                        <span
                                            class="text-sm text-slate-300 group-hover:text-white transition-colors">Male</span>
                                    </label>
                                    <label class="flex items-center gap-2 cursor-pointer group">
                                        <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}
                                            class="appearance-none w-5 h-5 rounded-full border border-white/20 checked:border-[5px] checked:border-accent-teal bg-transparent transition-all cursor-pointer"
                                            required>
                                        <span
                                            class="text-sm text-slate-300 group-hover:text-white transition-colors">Female</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span
                                            class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">lock</span>
                                    </div>
                                    <input type="password" name="password" id="password" required
                                        class="w-full pl-11 pr-12 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                        placeholder="Min 8 characters" minlength="8">
                                    <button type="button"
                                        class="toggle-password absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-white transition-colors"
                                        data-target="password">
                                        <span class="material-symbols-outlined text-lg">visibility</span>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Confirm
                                    Password</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <span
                                            class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">lock_reset</span>
                                    </div>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required
                                        class="w-full pl-11 pr-12 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                        placeholder="Re-enter password">
                                    <button type="button"
                                        class="toggle-password absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 hover:text-white transition-colors"
                                        data-target="password_confirmation">
                                        <span class="material-symbols-outlined text-lg">visibility</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2 space-y-3">
                            <label class="flex items-start gap-3 cursor-pointer group">
                                <div class="relative flex items-center justify-center w-5 h-5 flex-shrink-0 mt-0.5">
                                    <input type="checkbox" name="terms"
                                        class="peer appearance-none w-5 h-5 border border-slate-600 rounded bg-transparent checked:bg-accent-teal checked:border-accent-teal transition-all cursor-pointer"
                                        required>
                                    <span
                                        class="material-symbols-outlined text-white text-[12px] absolute pointer-events-none opacity-0 peer-checked:opacity-100 transition-opacity font-bold">check</span>
                                </div>
                                <span
                                    class="text-sm font-medium text-slate-400 select-none group-hover:text-slate-300 transition-colors">
                                    I agree to the <a href="{{ route('terms') }}"
                                        class="text-accent-teal hover:text-accent-blue transition-colors">Terms of
                                        Service</a> & <a href="{{ route('privacy') }}"
                                        class="text-accent-teal hover:text-accent-blue transition-colors">Privacy Policy</a>
                                </span>
                            </label>
                        </div>

                        <div class="pt-4">
                            <button type="submit" id="loginBtn"
                                class="w-full py-4 bg-gradient-to-r bg-emerald-500 text-deep-navy font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-110 transition-all">
                                Create Account
                                <span class="material-symbols-outlined text-sm">arrow_forward</span>
                            </button>
                        </div>
                    </form>

                    <div
                        class="mt-8 pt-6 border-t border-white/10 text-center flex flex-col sm:flex-row justify-center items-center gap-4">
                        <span class="text-sm font-medium text-slate-500">Already have an account?</span>
                        <a href="{{ route('login') }}"
                            class="text-accent-teal hover:text-accent-blue transition-colors text-sm font-medium">Sign
                            In</a>
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

    @push('scripts')
        <script>
            document.querySelectorAll('.toggle-password').forEach(btn => {
                btn.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    if (input) {
                        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                        input.setAttribute('type', type);
                        this.innerHTML = type === 'password' ? '<span class="material-symbols-outlined text-lg">visibility</span>' : '<span class="material-symbols-outlined text-lg">visibility_off</span>';
                    }
                });
            });
        </script>
    @endpush
@endsection