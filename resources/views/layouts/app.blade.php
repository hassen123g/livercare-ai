<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LiverCare AI - @yield('title', 'Next-Gen Medical Prediction')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <style>
        /* Custom color utilities */
        .bg-accent-teal { background-color: #14B8A6; }
        .bg-accent-teal\/5 { background-color: rgba(20, 184, 166, 0.05); }
        .bg-accent-teal\/10 { background-color: rgba(20, 184, 166, 0.1); }
        .bg-accent-teal\/20 { background-color: rgba(20, 184, 166, 0.2); }
        .bg-accent-teal\/30 { background-color: rgba(20, 184, 166, 0.3); }
        .text-accent-teal { color: #14B8A6; }
        .border-accent-teal { border-color: #14B8A6; }
        .border-accent-teal\/20 { border-color: rgba(20, 184, 166, 0.2); }
        .border-accent-teal\/30 { border-color: rgba(20, 184, 166, 0.3); }
        .border-accent-teal\/50 { border-color: rgba(20, 184, 166, 0.5); }

        .bg-accent-blue { background-color: #3B82F6; }
        .bg-accent-blue\/10 { background-color: rgba(59, 130, 246, 0.1); }
        .bg-accent-blue\/20 { background-color: rgba(59, 130, 246, 0.2); }
        .text-accent-blue { color: #3B82F6; }
        .border-accent-blue { border-color: #3B82F6; }
        .border-accent-blue\/20 { border-color: rgba(59, 130, 246, 0.2); }

        .bg-deep-navy { background-color: #020617; }
        .bg-deep-navy\/50 { background-color: rgba(2, 6, 23, 0.5); }
        .bg-deep-navy\/70 { background-color: rgba(2, 6, 23, 0.7); }

        .text-success { color: #10B981; }
        .bg-success\/10 { background-color: rgba(16, 185, 129, 0.1); }
        .text-danger { color: #EF4444; }
        .bg-danger\/10 { background-color: rgba(239, 68, 68, 0.1); }
        .text-warning { color: #F59E0B; }
        .bg-warning\/10 { background-color: rgba(245, 158, 11, 0.1); }

        /* Glass card effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            border-color: rgba(20, 184, 166, 0.3);
            background: rgba(255, 255, 255, 0.04);
        }

        /* Neon border effect */
        .neon-border {
            box-shadow: 0 0 20px rgba(20, 184, 166, 0.15);
            border: 1px solid rgba(20, 184, 166, 0.3);
        }

        /* Grid pattern background */
        .bg-grid-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M60 0H0V60H60V0ZM1 1H59V59H1V1Z' fill='%2314B8A6' fill-opacity='0.05'/%3E%3C/svg%3E");
        }

        body {
            background: linear-gradient(135deg, #020617 0%, #0A0F1C 100%);
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
        }

        /* Nav link underline animation */
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #14B8A6;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        /* Form inputs */
        input, select, textarea {
            transition: all 0.2s ease;
            background: rgba(10, 22, 40, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        input:focus, select:focus, textarea:focus {
            border-color: #14B8A6;
            outline: none;
            background: rgba(15, 31, 56, 0.8);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1a1f2e;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #14B8A6;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #0d9488;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-deep-navy text-slate-200 overflow-x-hidden bg-grid-pattern">
    <div class="relative min-h-screen flex flex-col">
        <!-- Ambient Background Lights -->
        <div class="fixed top-[-10%] left-[-10%] w-[50%] h-[50%] bg-accent-teal/10 blur-[120px] rounded-full -z-10 pointer-events-none"></div>
        <div class="fixed bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-accent-blue/10 blur-[120px] rounded-full -z-10 pointer-events-none"></div>

        <!-- ========== NAVIGATION ========== -->
        <header class="fixed top-0 w-full z-50 px-3 sm:px-6 py-3 sm:py-4">
            <div class="max-w-7xl mx-auto flex items-center justify-between glass-card px-4 sm:px-6 lg:px-8 py-3 rounded-2xl">
                <!-- Logo -->
                <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3">
                        <img src="{{ asset('images/Logo.png') }}" alt="LiverCare AI Logo" class="h-8 sm:h-10 lg:h-12 w-auto object-contain">
                        <span class="text-base sm:text-lg lg:text-xl font-display font-bold text-white tracking-tight whitespace-nowrap">LiverCare <span class="text-accent-teal">AI</span></span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-5 xl:gap-8">
                    <a href="{{ route('home') }}" class="nav-link text-[13px] xl:text-sm font-medium hover:text-accent-teal transition-colors whitespace-nowrap {{ request()->routeIs('home') ? 'text-accent-teal' : 'text-gray-300' }}">Home</a>
                    <a href="{{ route('home') }}#engine" class="nav-link text-[13px] xl:text-sm font-medium hover:text-accent-teal transition-colors whitespace-nowrap text-gray-300">How it works</a>
                    <a href="{{ route('prediction.create') }}" class="nav-link text-[13px] xl:text-sm font-medium hover:text-accent-teal transition-colors whitespace-nowrap {{ request()->routeIs('prediction.*') ? 'text-accent-teal' : 'text-gray-300' }}">Prediction</a>
                    <a href="{{ route('home') }}#about" class="nav-link text-[13px] xl:text-sm font-medium hover:text-accent-teal transition-colors whitespace-nowrap text-gray-300">About Project</a>
                    <a href="{{ route('home') }}#contact" class="nav-link text-[13px] xl:text-sm font-medium hover:text-accent-teal transition-colors whitespace-nowrap text-gray-300">Contact</a>
                </nav>

                <!-- Right side buttons -->
                <div class="flex items-center gap-2 lg:gap-4 shrink-0">
                    @auth
                        <!-- User menu when logged in -->
                        <div class="relative group">
                            <a href="{{ route('profile') }}" class="w-9 h-9 rounded-full border-2 border-white/20 flex items-center justify-center hover:border-accent-teal transition-colors">
                                <span class="material-symbols-outlined text-slate-300 hover:text-accent-teal transition-colors">account_circle</span>
                            </a>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-accent-teal text-deep-navy font-bold px-4 py-2 md:px-6 md:py-2 rounded-full hover:bg-accent-teal/80 transition-colors text-sm neon-border">LOGOUT</button>
                        </form>
                    @else
                        <!-- Guest buttons -->
                        <a href="{{ route('login') }}" class="bg-accent-teal text-deep-navy font-bold px-4 py-2 md:px-6 md:py-2 rounded-full hover:bg-accent-teal/80 transition-colors text-sm neon-border">LOGIN</a>
                    @endauth

                    <!-- Mobile menu button -->
                    <button id="mobileMenuBtn" class="lg:hidden flex items-center justify-center w-10 h-10 rounded-lg bg-white/5 border border-white/10 text-white">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobileMenu" class="lg:hidden hidden absolute top-full left-0 w-full px-3 sm:px-6 mt-2 pb-4">
                <div class="glass-card flex flex-col p-4 rounded-2xl gap-4">
                    <a href="{{ route('home') }}" class="nav-link text-sm font-medium hover:text-accent-teal transition-colors">Home</a>
                    <a href="{{ route('home') }}#engine" class="nav-link text-sm font-medium hover:text-accent-teal transition-colors">How it works</a>
                    <a href="{{ route('prediction.create') }}" class="nav-link text-sm font-medium hover:text-accent-teal transition-colors">Prediction</a>
                    <a href="{{ route('home') }}#about" class="nav-link text-sm font-medium hover:text-accent-teal transition-colors">About Project</a>
                    <a href="{{ route('home') }}#contact" class="nav-link text-sm font-medium hover:text-accent-teal transition-colors">Contact</a>

                    <div class="h-px bg-white/10 my-1"></div>

                    @auth
                        <a href="{{ route('profile') }}" class="flex items-center gap-3 text-sm font-medium hover:text-accent-teal transition-colors">
                            <span class="material-symbols-outlined text-base">account_circle</span>
                            My Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 text-sm font-medium text-red-400 hover:text-red-300 transition-colors w-full">
                                <span class="material-symbols-outlined text-base">logout</span>
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 bg-accent-teal text-deep-navy font-bold px-5 py-3 rounded-xl hover:bg-accent-teal/80 transition-colors text-sm neon-border">
                            <span class="material-symbols-outlined text-base">login</span>
                            LOGIN
                        </a>
                    @endauth
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow pt-28">
            @yield('content')
        </main>

        <!-- ========== FOOTER ========== -->
        <footer class="bg-deep-navy border-t border-white/5 pt-24 pb-12 px-6 relative overflow-hidden mt-20">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
                    <!-- Branding -->
                    <div class="lg:col-span-5 space-y-8">
                        <div class="flex items-center gap-5">
                            <img src="{{ asset('images/Logo.png') }}" alt="LiverCare AI Logo" class="h-16 w-auto object-contain">
                            <div>
                                <h2 class="text-2xl font-display font-bold text-white tracking-tight">LiverCare <span class="text-accent-teal">AI</span></h2>
                                <p class="text-accent-teal/60 text-[10px] font-bold uppercase tracking-[0.2em] mt-1">Next-Gen Medical AI</p>
                            </div>
                        </div>
                        <p class="text-slate-400 text-base leading-relaxed font-medium">We lead the future in the intersection of artificial intelligence and hepatology, creating a world where liver disease is detected and managed with absolute precision and efficiency.</p>
                    </div>

                    <!-- Links -->
                    <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-12">
                        <div class="space-y-6">
                            <h4 class="text-white font-bold text-lg tracking-tight border-b border-accent-teal/30 pb-2 inline-block">Ecosystem</h4>
                            <ul class="space-y-4">
                                <li><a href="{{ route('home') }}" class="text-slate-400 hover:text-accent-teal transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> Home Page</a></li>
                                <li><a href="{{ route('home') }}#engine" class="text-slate-400 hover:text-accent-teal transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> How It Works</a></li>
                                <li><a href="{{ route('prediction.create') }}" class="text-slate-400 hover:text-accent-teal transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> Prediction System</a></li>
                            </ul>
                        </div>
                        <div class="space-y-6">
                            <h4 class="text-white font-bold text-lg tracking-tight border-b border-accent-blue/30 pb-2 inline-block">Research</h4>
                            <ul class="space-y-4">
                                <li><a href="{{ route('about') }}" class="text-slate-400 hover:text-accent-blue transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> About Project</a></li>
                                <li><a href="{{ route('ai-models') }}" class="text-slate-400 hover:text-accent-blue transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> AI Models</a></li>
                                <li><a href="{{ route('methodology') }}" class="text-slate-400 hover:text-accent-blue transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> Medical Methodology</a></li>
                            </ul>
                        </div>
                        <div class="space-y-6">
                            <h4 class="text-white font-bold text-lg tracking-tight border-b border-accent-teal/30 pb-2 inline-block">Support</h4>
                            <ul class="space-y-4">
                                <li><a href="{{ route('contact') }}" class="text-slate-400 hover:text-accent-teal transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> Contact Us</a></li>
                                <li><a href="{{ route('privacy') }}" class="text-slate-400 hover:text-accent-teal transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> Privacy Policy</a></li>
                                <li><a href="{{ route('terms') }}" class="text-slate-400 hover:text-accent-teal transition-all flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-xs">arrow_forward</span> Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="pt-12 border-t border-white/5 flex flex-col items-center justify-center text-center">
                    <p class="text-slate-500 text-xs">&copy; {{ date('Y') }} LiverCare AI System. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Mobile menu toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>