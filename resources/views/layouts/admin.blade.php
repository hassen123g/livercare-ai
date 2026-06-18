<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin | LiverCare AI')</title>

    <!-- Tailwind CSS CDN with plugins (must match HTML pages) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Chart.js (available to all admin pages) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- ============================================================
         TAILWIND THEME CONFIG  — mirrors every HTML page exactly
    ============================================================ -->
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary":     "#0A192F",
                        "accent-teal": "#14B8A6",
                        "accent-blue": "#3B82F6",
                        "deep-navy":   "#020617",
                        "neon-glow":   "rgba(20, 184, 166, 0.4)",
                        "success":     "#10B981",
                        "warning":     "#F59E0B",
                        "danger":      "#EF4444",
                        "info":        "#3B82F6"
                    },
                    fontFamily: {
                        "sans":    ["Plus Jakarta Sans", "sans-serif"],
                        "display": ["Space Grotesk", "sans-serif"]
                    },
                    backgroundImage: {
                        'grid-pattern': "url(\"data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M60 0H0V60H60V0ZM1 1H59V59H1V1Z' fill='%2314B8A6' fill-opacity='0.05'/%3E%3C/svg%3E\")",
                    }
                },
            },
        }
    </script>

    <!-- ============================================================
         MASTER STYLE SHEET — all custom classes from every HTML page
         compiled into a single @layer so Tailwind CDN resolves @apply
    ============================================================ -->
    <style type="text/tailwindcss">

        /* ── Base ─────────────────────────────────────────────── */
        @layer base {
            body {
                @apply bg-deep-navy text-slate-200 overflow-x-hidden;
                font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
            }
        }

        /* ── Shared layout atoms ──────────────────────────────── */
        .glass-card {
            @apply bg-white/5 backdrop-blur-xl border border-white/10 shadow-[0_8px_32px_0_rgba(0,0,0,0.36)];
        }

        .neon-border {
            box-shadow: 0 0 15px rgba(20, 184, 166, 0.3), inset 0 0 10px rgba(20, 184, 166, 0.2);
            border: 1px solid rgba(20, 184, 166, 0.5);
        }

        .text-glow {
            text-shadow: 0 0 10px rgba(20, 184, 166, 0.5);
        }

        .animate-pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* ── Buttons ──────────────────────────────────────────── */
        .btn-primary {
            @apply px-6 py-3 bg-accent-teal text-deep-navy font-bold rounded-xl hover:bg-accent-teal/90 transition-colors;
        }

        .btn-secondary {
            @apply px-6 py-3 bg-white/5 text-white rounded-xl hover:bg-white/10 transition-colors;
        }

        /* ── Forms ────────────────────────────────────────────── */
        .form-input {
            @apply w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-accent-teal transition-colors;
        }

        .form-select {
            @apply w-full px-4 py-3 bg-deep-navy/50 border border-white/10 rounded-xl text-white focus:outline-none focus:border-accent-teal transition-colors appearance-none;
        }

        .form-range::-webkit-slider-thumb {
            @apply appearance-none w-4 h-4 rounded-full bg-accent-teal cursor-pointer;
        }

        .form-range::-moz-range-thumb {
            @apply w-4 h-4 rounded-full bg-accent-teal cursor-pointer border-0;
        }

        /* ── Tabs ─────────────────────────────────────────────── */
        .tab-btn {
            @apply px-4 py-2 rounded-lg text-sm font-medium transition-colors text-slate-400 hover:text-white hover:bg-white/5;
        }

        .tab-btn.active {
            @apply bg-accent-teal/10 text-accent-teal;
        }

        /* ── Toggle Switch ────────────────────────────────────── */
        .toggle-switch {
            @apply relative inline-flex h-6 w-11 items-center rounded-full;
        }

        .toggle-switch input {
            @apply sr-only;
        }

        .toggle-switch .toggle-bg {
            @apply inline-block h-6 w-11 rounded-full bg-deep-navy border border-white/10 transition-colors;
        }

        .toggle-switch input:checked + .toggle-bg {
            @apply bg-accent-teal border-accent-teal;
        }

        .toggle-switch .toggle-dot {
            @apply absolute left-1 top-1 h-4 w-4 rounded-full bg-white transition-transform;
        }

        .toggle-switch input:checked + .toggle-bg + .toggle-dot {
            transform: translateX(1.25rem);
        }

        /* ── Charts ───────────────────────────────────────────── */
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        /* ── Stat / KPI cards ─────────────────────────────────── */
        .stat-card {
            transition: border-color 0.3s ease;
        }

        .stat-card:hover {
            border-color: rgba(20, 184, 166, 0.5);
        }

        .trend-up {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.05) 100%);
        }

        .trend-down {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.05) 100%);
        }

        .trend-neutral {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
        }

        /* ── Progress bar ─────────────────────────────────────── */
        .progress-bar {
            @apply h-2 bg-deep-navy rounded-full overflow-hidden;
        }

        /* ── Settings ─────────────────────────────────────────── */
        .settings-section {
            @apply mb-8;
        }

        .settings-card {
            transition: border-color 0.3s ease;
        }

        .settings-card:hover {
            border-color: rgba(20, 184, 166, 0.5);
        }

        /* ── Cases table ──────────────────────────────────────── */
        .cases-table {
            @apply w-full border-collapse;
        }

        .cases-table th {
            @apply text-left p-4 text-sm font-medium text-slate-400 border-b border-white/10;
        }

        .cases-table td {
            @apply p-4 border-b border-white/10;
        }

        .cases-table tr:hover {
            @apply bg-white/5;
        }

        .case-card {
            transition: border-color 0.3s ease;
        }

        .case-card:hover {
            border-color: rgba(20, 184, 166, 0.5);
        }

        /* ── Users table ──────────────────────────────────────── */
        .user-table {
            @apply w-full border-collapse;
        }

        .user-table th {
            @apply text-left p-4 text-sm font-medium text-slate-400 border-b border-white/10;
        }

        .user-table td {
            @apply p-4 border-b border-white/10;
        }

        .user-table tr:hover {
            @apply bg-white/5;
        }

        .action-btn {
            @apply p-2 rounded-lg hover:bg-white/10 transition-colors;
        }

        /* ── Reports table ────────────────────────────────────── */
        .reports-table {
            @apply w-full border-collapse;
        }

        .reports-table th {
            @apply text-left p-4 text-sm font-medium text-slate-400 border-b border-white/10;
        }

        .reports-table td {
            @apply p-4 border-b border-white/10;
        }

        .reports-table tr:hover {
            @apply bg-white/5;
        }

        .report-card {
            transition: border-color 0.3s ease;
        }

        .report-card:hover {
            border-color: rgba(20, 184, 166, 0.5);
        }

        /* ── Risk badges ──────────────────────────────────────── */
        .risk-badge {
            @apply px-3 py-1 rounded-full text-xs font-medium;
        }

        .risk-high {
            @apply bg-danger/10 text-danger;
        }

        .risk-medium {
            @apply bg-warning/10 text-warning;
        }

        .risk-low {
            @apply bg-success/10 text-success;
        }

        /* ── Status badges ────────────────────────────────────── */
        .status-badge {
            @apply px-3 py-1 rounded-full text-xs font-medium;
        }

        .status-active {
            @apply bg-accent-teal/10 text-accent-teal;
        }

        .status-resolved {
            @apply bg-success/10 text-success;
        }

        .status-pending {
            @apply bg-warning/10 text-warning;
        }

        .status-inactive {
            @apply bg-danger/10 text-danger;
        }

        .status-completed {
            @apply bg-success/10 text-success;
        }

        .status-processing {
            @apply bg-warning/10 text-warning;
        }

        .status-failed {
            @apply bg-danger/10 text-danger;
        }

        /* ── Disease badges ───────────────────────────────────── */
        .disease-badge {
            @apply px-2 py-1 rounded text-xs;
        }

        .disease-hepb {
            @apply bg-blue-500/10 text-blue-400;
        }

        .disease-hepc {
            @apply bg-purple-500/10 text-purple-400;
        }

        .disease-cirrhosis {
            @apply bg-orange-500/10 text-orange-400;
        }

        /* ── Role badges ──────────────────────────────────────── */
        .role-badge {
            @apply px-3 py-1 rounded-full text-xs font-medium;
        }

        .role-physician {
            @apply bg-accent-teal/10 text-accent-teal;
        }

        .role-researcher {
            @apply bg-accent-blue/10 text-accent-blue;
        }

        .role-admin {
            @apply bg-warning/10 text-warning;
        }

        .role-student {
            @apply bg-success/10 text-success;
        }

        /* ── Report type badges ───────────────────────────────── */
        .report-badge {
            @apply px-3 py-1 rounded-full text-xs font-medium;
        }

        .report-type-clinical {
            @apply bg-accent-teal/10 text-accent-teal;
        }

        .report-type-analytics {
            @apply bg-accent-blue/10 text-accent-blue;
        }

        .report-type-research {
            @apply bg-purple-500/10 text-purple-400;
        }

        .report-type-audit {
            @apply bg-warning/10 text-warning;
        }

        /* ── Trend filter pills (reports page) ────────────────── */
        .trend-weekly.active,
        .trend-daily.active {
            @apply bg-accent-teal/10 text-accent-teal;
        }

        /* ── Nav link underline (sidebar / top nav) ───────────── */
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

        /* ── bg-info / text-info (Tailwind custom colour) ─────── */
        /* Tailwind CDN resolves these via the config above,
           but explicit helpers guard against CDN purge gaps */
        .bg-info\/10 { background-color: rgba(59, 130, 246, 0.1); }
        .text-info   { color: #3B82F6; }

    </style>

    @stack('styles')
</head>

<body class="bg-grid-pattern">
<div class="relative min-h-screen">

    <!-- ── Ambient background blobs ─────────────────────────── -->
    <div class="fixed top-[-10%] left-[-10%] w-[50%] h-[50%] bg-accent-teal/10 blur-[120px] rounded-full -z-10 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-accent-blue/10 blur-[120px] rounded-full -z-10 pointer-events-none"></div>
    <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-radial from-accent-teal/2 to-transparent -z-10 pointer-events-none"></div>

    <!-- ═══════════════════════════════════════════════════════
         TOP NAVIGATION
    ═══════════════════════════════════════════════════════════ -->
    <header class="fixed top-0 left-20 lg:left-64 right-0 z-50 px-3 sm:px-6 py-3 sm:py-4 transition-all">
        <div class="flex items-center justify-between glass-card px-4 sm:px-6 lg:px-8 py-3 rounded-2xl">

            <!-- Logo -->
            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3">
                    <img src="{{ asset('images/Logo.png') }}" alt="LiverCare AI Logo" class="h-8 sm:h-10 w-auto object-contain">
                    <span class="text-base sm:text-lg lg:text-xl font-display font-bold text-white tracking-tight whitespace-nowrap">
                        LiverCare <span class="text-accent-teal">AI</span>
                    </span>
                </a>
                <span class="hidden sm:inline-block text-xs px-2 py-1 bg-accent-teal/10 text-accent-teal rounded-full font-medium ml-2">
                    @yield('header-badge', 'Admin')
                </span>
            </div>

            <!-- Right controls -->
            <div class="flex items-center gap-3 sm:gap-6">

                <!-- Notifications -->
                <div class="relative">
                    <button id="notificationsBtn" class="relative p-2 text-slate-400 hover:text-accent-teal transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <div id="notificationsPanel" class="hidden absolute right-0 mt-2 w-80 glass-card rounded-xl p-4 shadow-xl">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-white">Notifications</h3>
                            <span class="text-xs text-accent-teal">3 new</span>
                        </div>
                        <div class="space-y-3">
                            <div class="p-3 rounded-lg bg-deep-navy/50">
                                <p class="text-sm text-white">New case reported – High risk detected</p>
                                <p class="text-xs text-slate-400">2 minutes ago</p>
                            </div>
                            <div class="p-3 rounded-lg bg-deep-navy/50">
                                <p class="text-sm text-white">System performance optimised</p>
                                <p class="text-xs text-slate-400">1 hour ago</p>
                            </div>
                            <div class="p-3 rounded-lg bg-deep-navy/50">
                                <p class="text-sm text-white">Weekly report generated</p>
                                <p class="text-xs text-slate-400">3 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View site -->
                <a href="{{ route('home') }}" class="hidden sm:flex items-center gap-1 text-slate-400 hover:text-accent-teal transition-colors text-sm">
                    <span class="material-symbols-outlined text-base">language</span>
                    <span class="hidden md:inline">View Site</span>
                </a>

                <!-- Admin profile -->
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-r from-accent-teal to-accent-blue flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-sm">admin_panel_settings</span>
                    </div>
                    <div class="hidden md:block">
                        <p class="text-sm font-medium text-white">{{ auth()->user()->name ?? 'Admin User' }}</p>
                        <p class="text-xs text-slate-400">Super Administrator</p>
                    </div>
                </div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-slate-400 hover:text-accent-teal transition-colors" title="Logout">
                        <span class="material-symbols-outlined">logout</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- ═══════════════════════════════════════════════════════
         SIDEBAR
    ═══════════════════════════════════════════════════════════ -->
    <aside class="fixed left-0 top-0 h-screen w-20 lg:w-64 z-50">
        <div class="h-full glass-card rounded-none pt-6 px-4 pb-4 overflow-y-auto border-r border-white/5">
            <nav class="space-y-2">

                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 p-3 rounded-xl transition-colors
                          {{ request()->routeIs('admin.dashboard') ? 'bg-accent-teal/10 text-accent-teal' : 'text-slate-400 hover:text-accent-teal hover:bg-white/5' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="hidden lg:block">Overview</span>
                </a>

                <a href="{{ route('admin.cases') }}"
                   class="flex items-center gap-3 p-3 rounded-xl transition-colors
                          {{ request()->routeIs('admin.cases*') ? 'bg-accent-teal/10 text-accent-teal' : 'text-slate-400 hover:text-accent-teal hover:bg-white/5' }}">
                    <span class="material-symbols-outlined">folder</span>
                    <span class="hidden lg:block">Cases</span>
                </a>

                <a href="{{ route('admin.users') }}"
                   class="flex items-center gap-3 p-3 rounded-xl transition-colors
                          {{ request()->routeIs('admin.users*') ? 'bg-accent-teal/10 text-accent-teal' : 'text-slate-400 hover:text-accent-teal hover:bg-white/5' }}">
                    <span class="material-symbols-outlined">group</span>
                    <span class="hidden lg:block">Users</span>
                </a>

                <a href="{{ route('admin.reports') }}"
                   class="flex items-center gap-3 p-3 rounded-xl transition-colors
                          {{ request()->routeIs('admin.reports*') ? 'bg-accent-teal/10 text-accent-teal' : 'text-slate-400 hover:text-accent-teal hover:bg-white/5' }}">
                    <span class="material-symbols-outlined">summarize</span>
                    <span class="hidden lg:block">Reports</span>
                </a>

                <a href="{{ route('admin.settings') }}"
                   class="flex items-center gap-3 p-3 rounded-xl transition-colors
                          {{ request()->routeIs('admin.settings*') ? 'bg-accent-teal/10 text-accent-teal' : 'text-slate-400 hover:text-accent-teal hover:bg-white/5' }}">
                    <span class="material-symbols-outlined">settings</span>
                    <span class="hidden lg:block">Settings</span>
                </a>

                <!-- Dynamic sidebar extra slot (filled per-page) -->
                <div class="pt-6 mt-6 border-t border-white/10 hidden lg:block">
                    @yield('sidebar-extra')
                </div>

            </nav>
        </div>
    </aside>

    <!-- ═══════════════════════════════════════════════════════
         MAIN CONTENT
    ═══════════════════════════════════════════════════════════ -->
    <main class="pt-24 pl-24 lg:pl-72 pr-6 pb-6">
        @yield('content')
    </main>

</div><!-- /.relative.min-h-screen -->

<!-- ── Notification panel toggle ─────────────────────────── -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn   = document.getElementById('notificationsBtn');
        const panel = document.getElementById('notificationsPanel');
        if (btn && panel) {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                panel.classList.toggle('hidden');
            });
            document.addEventListener('click', function () {
                panel.classList.add('hidden');
            });
        }
    });
</script>

@stack('scripts')
</body>
</html>
