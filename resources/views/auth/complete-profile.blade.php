@extends('layouts.guest')

@section('title', 'Complete Your Profile - LiverCare AI')

@section('content')
<div class="min-h-screen flex items-center justify-center overflow-x-hidden p-4 sm:p-8 relative">
    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-accent-teal/20 blur-[150px] rounded-full mix-blend-screen pointer-events-none animate-pulse" style="animation-duration:4s;"></div>
    <div class="absolute bottom-0 right-1/4 w-[500px] h-[500px] bg-accent-blue/10 blur-[150px] rounded-full mix-blend-screen pointer-events-none" style="animation-duration:8s;"></div>

    <div class="w-full max-w-6xl relative z-10">
        <!-- Stepper Progress -->
        <div class="mb-10 sm:mb-14 max-w-md mx-auto w-full relative">
            <div class="flex items-center justify-between relative px-2">
                <div class="absolute left-0 top-[1.25rem] w-full h-1 bg-white/10 rounded-full z-0"></div>
                <div class="absolute left-0 top-[1.25rem] w-[100%] h-1 bg-gradient-to-r from-accent-teal to-accent-blue rounded-full z-0 transition-all duration-500"></div>
                
                <div class="relative z-10 flex flex-col items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-accent-teal text-deep-navy flex items-center justify-center font-bold shadow-[0_0_20px_rgba(20,184,166,0.3)] border-2 border-accent-teal/50">
                        <span class="material-symbols-outlined text-sm font-bold">check</span>
                    </div>
                    <span class="text-[10px] sm:text-xs font-bold text-accent-teal uppercase tracking-widest">Account</span>
                </div>

                <div class="relative z-10 flex flex-col items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-accent-teal text-deep-navy flex items-center justify-center font-bold shadow-[0_0_20px_rgba(20,184,166,0.3)] border-2 border-accent-teal/50">
                        <span class="material-symbols-outlined text-sm font-bold">check</span>
                    </div>
                    <span class="text-[10px] sm:text-xs font-bold text-accent-teal uppercase tracking-widest">Verify</span>
                </div>

                <div class="relative z-10 flex flex-col items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-accent-blue text-white flex items-center justify-center font-bold shadow-[0_0_20px_rgba(59,130,246,0.4)] border-2 border-accent-blue/50 animate-pulse" style="animation-duration:2s;">
                        3
                    </div>
                    <span class="text-[10px] sm:text-xs font-bold text-accent-blue uppercase tracking-widest">Profile</span>
                </div>
            </div>
        </div>

        <div class="bg-white/[0.02] backdrop-blur-2xl border border-white/10 rounded-[2rem] sm:rounded-[2.5rem] overflow-hidden flex flex-col lg:flex-row shadow-[0_20px_60px_-15px_rgba(0,0,0,0.7)]">
            
            <!-- Left Branding -->
            <div class="hidden lg:flex lg:w-[40%] relative p-12 flex-col justify-between bg-gradient-to-br from-accent-blue/[0.08] via-accent-teal/[0.03] to-transparent border-r border-white/5 overflow-hidden">
                <div class="relative z-10 flex-grow flex flex-col justify-center">
                    <div class="mb-10">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                            <img src="{{ asset('images/Logo.png') }}" alt="LiverCare" class="h-14 object-contain">
                            <span class="text-2xl font-display font-bold text-white tracking-tight">LiverCare <span class="text-accent-teal">AI</span></span>
                        </a>
                    </div>
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-display font-bold text-white mb-6 leading-[1.15]">
                            Personalize<br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue">Your Experience</span>
                        </h2>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-[320px]">Adding these details helps us tailor the platform to your needs and secure your patient data more effectively.</p>
                    </div>
                    <div class="space-y-4 pt-2 mt-6">
                        <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-xl">tune</span><span class="text-sm font-medium">Personalized Dashboard</span></div>
                        <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-blue text-xl">contact_mail</span><span class="text-sm font-medium">Professional Contact Info</span></div>
                        <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-xl">badge</span><span class="text-sm font-medium">Complete Medical Profile</span></div>
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
                    <a href="{{ route('home') }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-slate-400 hover:text-white">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                    </a>
                    <div class="flex items-center gap-2.5">
                        <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-10 object-contain">
                        <span class="text-sm font-display font-medium text-white">LiverCare <span class="text-accent-teal">AI</span></span>
                    </div>
                </div>

                <div class="mb-8 text-center mt-2">
                    <h3 class="text-2xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-2">Complete Profile</h3>
                    <p class="text-slate-400 text-sm">Step 3: Tell us more about yourself (Optional).</p>
                </div>

                <div class="mb-6 p-3 rounded-xl bg-accent-teal/5 border border-accent-teal/15 flex gap-3 items-center">
                    <div class="w-8 h-8 rounded-lg bg-accent-teal/10 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-outlined text-accent-teal text-base">lightbulb</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">This step is <strong class="text-accent-teal">optional</strong>. You can skip and complete your profile later from your dashboard settings.</p>
                </div>

                <form method="POST" action="{{ route('profile.complete') }}" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="group">
                            <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">City / Location</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">location_city</span>
                                </div>
                                <input type="text" name="city" value="{{ old('city', Auth::user()->city ?? '') }}"
                                    class="w-full pl-11 pr-4 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                    placeholder="e.g. Cairo">
                            </div>
                        </div>
                        <div class="group">
                            <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Phone Number</label>
                            <div class="relative flex">
                                <div class="relative">
                                    <select name="phone_code" class="h-full px-4 bg-[#0a1628] border border-white/10 border-r-0 rounded-l-xl text-white text-sm appearance-none">
                                        <option value="+20" {{ old('phone_code', Auth::user()->phone_code ?? '+20') == '+20' ? 'selected' : '' }}>+20</option>
                                        <option value="+966" {{ old('phone_code', Auth::user()->phone_code ?? '') == '+966' ? 'selected' : '' }}>+966</option>
                                        <option value="+971" {{ old('phone_code', Auth::user()->phone_code ?? '') == '+971' ? 'selected' : '' }}>+971</option>
                                        <option value="+965" {{ old('phone_code', Auth::user()->phone_code ?? '') == '+965' ? 'selected' : '' }}>+965</option>
                                        <option value="+1" {{ old('phone_code', Auth::user()->phone_code ?? '') == '+1' ? 'selected' : '' }}>+1</option>
                                        <option value="+44" {{ old('phone_code', Auth::user()->phone_code ?? '') == '+44' ? 'selected' : '' }}>+44</option>
                                    </select>
                                </div>
                                <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}"
                                    class="w-full pl-4 pr-4 py-3 bg-[#0a1628] border border-white/10 rounded-r-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                    placeholder="123 456 7890">
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Street Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">home</span>
                            </div>
                            <input type="text" name="address" value="{{ old('address', Auth::user()->address ?? '') }}"
                                class="w-full pl-11 pr-4 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner"
                                placeholder="Your street address">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-medium text-slate-400 tracking-wider mb-2">Bio / Description</label>
                        <div class="relative">
                            <div class="absolute top-3.5 left-4 pointer-events-none">
                                <span class="material-symbols-outlined text-slate-500 group-focus-within:text-accent-teal transition-colors text-[18px]">edit_note</span>
                            </div>
                            <textarea name="bio" rows="3"
                                class="w-full pl-11 pr-4 py-3 bg-[#0a1628] border border-white/10 rounded-xl text-white placeholder-slate-600 focus:outline-none focus:border-accent-teal focus:bg-[#0f1f38] transition-all font-medium text-sm shadow-inner resize-none"
                                placeholder="Brief professional or personal bio...">{{ old('bio', Auth::user()->bio ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="{{ route('dashboard') }}" class="flex-1 py-4 bg-white/5 text-slate-300 font-bold rounded-xl flex items-center justify-center gap-2 hover:bg-white/10 hover:text-white transition-all border border-white/10 text-sm">
                            <span class="material-symbols-outlined text-sm">skip_next</span>
                            Skip This Step
                        </a>
                        <button type="submit" class="flex-1 py-4 bg-gradient-to-r from-accent-teal to-accent-blue text-deep-navy font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-110 transition-all">
                            Finish & Join
                            <span class="material-symbols-outlined text-sm">rocket_launch</span>
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
@endsection