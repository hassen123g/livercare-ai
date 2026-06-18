<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LiverCare AI - @yield('title', 'Authentication')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <style>
        /* Custom color utilities */
        .bg-accent-teal { background-color: #14B8A6; }
        .bg-accent-teal\/10 { background-color: rgba(20, 184, 166, 0.1); }
        .bg-accent-teal\/20 { background-color: rgba(20, 184, 166, 0.2); }
        .text-accent-teal { color: #14B8A6; }
        .border-accent-teal { border-color: #14B8A6; }
        .border-accent-teal\/20 { border-color: rgba(20, 184, 166, 0.2); }
        .border-accent-teal\/30 { border-color: rgba(20, 184, 166, 0.3); }

        .bg-accent-blue { background-color: #3B82F6; }
        .bg-accent-blue\/10 { background-color: rgba(59, 130, 246, 0.1); }
        .text-accent-blue { color: #3B82F6; }

        .bg-deep-navy { background-color: #020617; }
        .bg-deep-navy\/50 { background-color: rgba(2, 6, 23, 0.5); }

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
    </style>

    @stack('styles')
</head>
<body class="bg-deep-navy text-slate-200 overflow-x-hidden bg-grid-pattern">
    <div class="relative min-h-screen">
        <!-- Ambient Background Lights -->
        <div class="fixed top-[-10%] left-[-10%] w-[50%] h-[50%] bg-accent-teal/10 blur-[120px] rounded-full -z-10 pointer-events-none"></div>
        <div class="fixed bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-accent-blue/10 blur-[120px] rounded-full -z-10 pointer-events-none"></div>

        <!-- Simple Branding Header -->
        <div class="pt-8 pb-4 text-center">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                <img src="{{ asset('images/Logo.png') }}" alt="LiverCare AI Logo" class="h-12 object-contain">
                <span class="text-2xl font-display font-bold text-white tracking-tight">LiverCare <span class="text-accent-teal">AI</span></span>
            </a>
        </div>

        <!-- Main Content (centered card) -->
        <main>
            @yield('content')
        </main>

        <!-- Simple Footer for Auth Pages -->
        <div class="text-center mt-8 pb-8">
            <div class="flex justify-center items-center gap-2 text-xs font-medium text-slate-500">
                <span class="material-symbols-outlined text-[16px]">verified_user</span>
                <span>HIPAA Compliant • End-to-End Encrypted Secure Gateway</span>
            </div>
        </div>
    </div>

    @stack('scripts')
</body>
</html>