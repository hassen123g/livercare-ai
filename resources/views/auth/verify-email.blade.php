@extends('layouts.guest')

@section('title', 'Verify Email - LiverCare AI')

@section('content')
<!-- Tailwind + custom fonts (same as your HTML) -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
<script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                colors: {
                    "primary": "#0A192F",
                    "accent-teal": "#14B8A6",
                    "accent-blue": "#3B82F6",
                    "deep-navy": "#020617",
                    "neon-glow": "rgba(20, 184, 166, 0.4)"
                },
                fontFamily: {
                    "sans": ["Plus Jakarta Sans", "sans-serif"],
                    "display": ["Space Grotesk", "sans-serif"]
                },
                backgroundImage: {
                    'grid-pattern': "url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cpath d=\"M60 0H0V60H60V0ZM1 1H59V59H1V1Z\" fill=\"%2314B8A6\" fill-opacity=\"0.05\"/%3E%3C/svg%3E')",
                }
            },
        },
    }
</script>
<style>
    /* Force dark background for autofill */
    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus, 
    input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 1000px #0a1628 inset !important;
        -webkit-text-fill-color: white !important;
        font-size: 0.875rem !important;
        font-family: inherit !important;
    }
    .otp-input {
        width: 3.5rem;
        height: 4rem;
        text-align: center;
        font-size: 1.75rem;
        font-weight: 700;
        border-radius: 1rem;
        border: 1px solid rgba(255,255,255,0.1);
        background: #0a1628;
        color: white;
        outline: none;
        transition: all 0.3s ease;
        caret-color: #14B8A6;
    }
    .otp-input:focus {
        border-color: #3B82F6;
        background: #0f1f38;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.15), 0 0 20px rgba(59,130,246,0.1);
    }
    .otp-input.filled {
        border-color: #14B8A6;
        box-shadow: 0 0 0 2px rgba(20,184,166,0.15);
    }
    @media (max-width: 400px) {
        .otp-input { width: 2.75rem; height: 3.25rem; font-size: 1.25rem; }
    }
    @keyframes countdown-pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .countdown-active { animation: countdown-pulse 1s ease-in-out infinite; }
</style>

<div class="bg-deep-navy bg-grid-pattern relative min-h-screen flex items-center justify-center overflow-x-hidden p-4 sm:p-8">
    <!-- Ambient Glow Orbs -->
    <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-accent-teal/20 blur-[150px] rounded-full mix-blend-screen pointer-events-none animate-pulse" style="animation-duration: 4s;"></div>
    <div class="absolute bottom-0 left-1/4 w-[500px] h-[500px] bg-accent-blue/10 blur-[150px] rounded-full mix-blend-screen pointer-events-none" style="animation-duration: 8s;"></div>

    <div class="w-full max-w-6xl relative z-10">
        <!-- Stepper Progress -->
        <div class="mb-10 sm:mb-14 max-w-md mx-auto w-full relative">
            <div class="flex items-center justify-between relative px-2">
                <div class="absolute left-0 top-[1.25rem] w-full h-1 bg-white/10 rounded-full z-0"></div>
                <div class="absolute left-0 top-[1.25rem] w-[50%] h-1 bg-gradient-to-r from-accent-teal to-accent-blue rounded-full z-0"></div>
                <div class="relative z-10 flex flex-col items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-accent-teal text-deep-navy flex items-center justify-center font-bold shadow-[0_0_20px_rgba(20,184,166,0.3)] border-2 border-accent-teal/50">
                        <span class="material-symbols-outlined text-sm font-bold">check</span>
                    </div>
                    <span class="text-[10px] sm:text-xs font-bold text-accent-teal uppercase tracking-widest">Account</span>
                </div>
                <div class="relative z-10 flex flex-col items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-accent-blue text-white flex items-center justify-center font-bold shadow-[0_0_20px_rgba(59,130,246,0.4)] border-2 border-accent-blue/50 animate-pulse">
                        2
                    </div>
                    <span class="text-[10px] sm:text-xs font-bold text-accent-blue uppercase tracking-widest">Verify</span>
                </div>
                <div class="relative z-10 flex flex-col items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-white/5 border border-white/20 text-slate-500 flex items-center justify-center font-bold backdrop-blur-md">3</div>
                    <span class="text-[10px] sm:text-xs font-bold text-slate-500 uppercase tracking-widest">Profile</span>
                </div>
            </div>
        </div>

        <!-- Main Glass Card -->
        <div class="bg-white/[0.02] backdrop-blur-2xl border border-white/10 rounded-[2rem] sm:rounded-[2.5rem] overflow-hidden flex flex-col lg:flex-row shadow-[0_20px_60px_-15px_rgba(0,0,0,0.7)]">
            <!-- Left Branding (desktop) -->
            <div class="hidden lg:flex lg:w-[40%] relative p-12 flex-col justify-between bg-gradient-to-br from-accent-blue/[0.08] via-accent-teal/[0.03] to-transparent border-r border-white/5 overflow-hidden">
                <div class="relative z-10 flex-grow flex flex-col justify-center">
                    <div class="mb-10 flex flex-col gap-6">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 text-[10px] font-bold text-slate-300 hover:text-white bg-white/5 px-4 py-2 rounded-full border border-white/10 transition-all w-fit">
                            <span class="material-symbols-outlined text-[14px]">arrow_back</span> Back To Register
                        </a>
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                            <img src="{{ asset('images/Logo.png') }}" alt="LiverCare" class="h-14 object-contain">
                            <span class="text-2xl font-display font-bold text-white tracking-tight">LiverCare <span class="text-accent-teal">AI</span></span>
                        </a>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-4xl lg:text-5xl font-display font-bold text-white mb-6">Check your<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue">Email Inbox</span></h2>
                            <p class="text-slate-400 text-sm max-w-[320px]">We've sent a 6-digit verification code to your email address.</p>
                        </div>
                        <div class="space-y-4 pt-2">
                            <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal">shield</span><span class="text-sm">Identity Verification</span></div>
                            <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-blue">mark_email_read</span><span class="text-sm">Secure Code Delivery</span></div>
                            <div class="flex items-center gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal">verified</span><span class="text-sm">One-Time Verification</span></div>
                        </div>
                    </div>
                </div>
                <div class="relative z-10 mt-auto flex items-center gap-6 text-sm text-slate-500 pt-8">
                    <a href="{{ route('privacy') }}" class="hover:text-accent-teal">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="hover:text-accent-teal">Terms</a>
                </div>
            </div>

            <!-- Right Form Pane -->
            <div class="w-full lg:w-[60%] p-6 sm:p-10 lg:p-14 bg-[#040b17]/60 relative flex flex-col justify-center">
                <!-- Mobile header -->
                <div class="lg:hidden flex items-center justify-between mb-8">
                    <a href="{{ route('home') }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-slate-400">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                    </a>
                    <div class="flex items-center gap-2.5">
                        <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="h-10">
                        <span class="text-sm font-display text-white">LiverCare <span class="text-accent-teal">AI</span></span>
                    </div>
                </div>

                <div class="mb-8 text-center">
                    <h3 class="text-2xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-2">Verify Account</h3>
                    <p class="text-slate-400 text-sm">Step 2: Enter the 6-digit verification code sent to your email.</p>
                </div>

                <!-- Demo Mode Notice -->
                <div class="mb-8 p-4 rounded-xl bg-accent-blue/5 border border-accent-blue/20 flex gap-4 items-center">
                    <div class="w-10 h-10 rounded-lg bg-accent-blue/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-blue">info</span>
                    </div>
                    <p class="text-xs text-slate-300">Demo Mode: Use code <strong class="text-accent-blue bg-accent-blue/10 px-2 py-0.5 rounded">123456</strong> to proceed.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/20">
                        <p class="text-red-400 text-sm text-center">{{ $errors->first() }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('verification.verify') }}" id="verificationForm">
                    @csrf
                    <div class="space-y-4">
                        <label class="block text-xs font-medium text-slate-400 uppercase text-center">Verification Code</label>
                        <div class="flex justify-center gap-2 sm:gap-3">
                            @for ($i = 0; $i < 6; $i++)
                                <input type="text" maxlength="1" class="otp-input" inputmode="numeric" autocomplete="one-time-code" {{ $i === 0 ? 'autofocus' : '' }}>
                            @endfor
                        </div>
                        <input type="hidden" name="otp" id="fullCode">
                    </div>
                    <div class="pt-8">
                        <button type="submit" id="verifyBtn" class="w-full py-4 bg-gradient-to-r from-accent-teal to-accent-blue text-deep-navy font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-110 transition-all disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                            Confirm Verification <span class="material-symbols-outlined text-sm">verified</span>
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-white/10 text-center flex flex-col sm:flex-row justify-center items-center gap-4">
                    <span class="text-sm text-slate-500">Didn't receive the code?</span>
                    <button type="button" id="resendBtn" class="text-accent-teal hover:text-accent-blue text-sm font-medium disabled:text-slate-600" disabled>
                        Resend in <span id="countdown">2:00</span>
                    </button>
                </div>

                <div class="mt-6 text-center">
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-xs text-slate-500 hover:text-slate-400">Log out and use a different account</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <div class="flex justify-center items-center gap-2 text-xs text-slate-500">
                <span class="material-symbols-outlined text-[16px]">verified_user</span>
                <span>HIPAA Compliant &bull; End-to-End Encrypted Secure Gateway</span>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('.otp-input');
        const hidden = document.getElementById('fullCode');
        const verifyBtn = document.getElementById('verifyBtn');
        const resendBtn = document.getElementById('resendBtn');
        const countdownSpan = document.getElementById('countdown');
        const form = document.getElementById('verificationForm');

        function updateCode() {
            let code = '';
            inputs.forEach(inp => code += inp.value);
            hidden.value = code;
            verifyBtn.disabled = code.length !== 6;
            if (code.length === 6) form.submit();
        }

        inputs.forEach((inp, idx) => {
            inp.addEventListener('input', (e) => {
                inp.value = inp.value.replace(/[^0-9]/g, '');
                if (inp.value && idx < 5) inputs[idx+1].focus();
                inp.classList.toggle('filled', inp.value.length > 0);
                updateCode();
            });
            inp.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !inp.value && idx > 0) {
                    inputs[idx-1].focus();
                    inputs[idx-1].value = '';
                    inputs[idx-1].classList.remove('filled');
                    updateCode();
                }
            });
            inp.addEventListener('paste', (e) => {
                e.preventDefault();
                const pasted = (e.clipboardData || window.clipboardData).getData('text').replace(/[^0-9]/g, '');
                for (let i = 0; i < Math.min(pasted.length, inputs.length); i++) {
                    inputs[i].value = pasted[i];
                    inputs[i].classList.add('filled');
                }
                if (pasted.length) inputs[Math.min(pasted.length, inputs.length)-1].focus();
                updateCode();
            });
        });

        let seconds = 120;
        let interval = setInterval(() => {
            seconds--;
            const min = Math.floor(seconds / 60);
            const sec = seconds % 60;
            countdownSpan.innerText = `${min}:${sec.toString().padStart(2,'0')}`;
            if (seconds <= 0) {
                clearInterval(interval);
                resendBtn.disabled = false;
                resendBtn.innerText = 'Resend Code';
            }
        }, 1000);

        resendBtn.addEventListener('click', () => {
            if (resendBtn.disabled) return;
            fetch('{{ route("verification.send") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json()).then(data => {
                if (data.success) {
                    seconds = 120;
                    clearInterval(interval);
                    interval = setInterval(() => {
                        seconds--;
                        const min = Math.floor(seconds / 60);
                        const sec = seconds % 60;
                        countdownSpan.innerText = `${min}:${sec.toString().padStart(2,'0')}`;
                        if (seconds <= 0) {
                            clearInterval(interval);
                            resendBtn.disabled = false;
                            resendBtn.innerText = 'Resend Code';
                        }
                    }, 1000);
                    resendBtn.disabled = true;
                    resendBtn.innerHTML = 'Resend in <span id="countdown">2:00</span>';
                }
            }).catch(() => { /* fallback – do nothing */ });
        });
    });
</script>
@endsection