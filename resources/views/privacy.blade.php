@extends('layouts.app')

@section('title', 'Privacy Policy - LiverCare AI')

@section('content')
<div class="flex-grow pt-32 pb-0 px-6">
    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 bg-white/5 px-5 py-2 rounded-full mb-6 border border-white/10 hover:border-accent-teal/50 transition-colors">
                <span class="material-symbols-outlined text-accent-teal text-xl">shield</span>
                <span class="text-blue-100 bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue text-sm font-bold uppercase tracking-wider">Legal Document</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-4">Privacy Policy</h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">We are committed to maintaining the highest standards of data protection and medical confidentiality.</p>
        </div>

        <!-- 1. Introduction -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20">
                    <span class="material-symbols-outlined text-accent-teal">description</span>
                </div>
                <h2 class="text-2xl font-display font-bold text-white">1. Introduction</h2>
            </div>
            <p class="text-slate-300 leading-relaxed mb-3">LiverCare AI ("we", "our", or "us") is committed to protecting your privacy and ensuring the security of your personal and medical information.</p>
            <p class="text-slate-300 leading-relaxed mb-3">This Privacy Policy explains how we collect, use, and safeguard your data when using our AI-powered liver disease prediction platform.</p>
            <p class="text-slate-300 leading-relaxed">By using LiverCare AI, you agree to the terms outlined in this policy.</p>
        </div>

        <!-- 2. Information We Collect -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center border border-accent-blue/20">
                    <span class="material-symbols-outlined text-accent-blue">folder</span>
                </div>
                <h2 class="text-2xl font-display font-bold text-white">2. Information We Collect</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors">
                    <div class="flex items-center gap-2 mb-3"><span class="material-symbols-outlined text-accent-teal">person</span><h3 class="font-bold text-white">Personal Information</h3></div>
                    <ul class="space-y-2"><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Name</li><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Email address</li><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Contact details</li></ul>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-blue/40 transition-colors">
                    <div class="flex items-center gap-2 mb-3"><span class="material-symbols-outlined text-accent-blue">science</span><h3 class="font-bold text-white">Medical Data</h3></div>
                    <p class="text-sm text-slate-400 mb-2">Laboratory test results such as:</p>
                    <ul class="space-y-2 mb-3"><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-blue"></span> ALT, AST</li><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-blue"></span> Bilirubin</li><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-blue"></span> Albumin</li><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-blue"></span> Platelet counts</li></ul>
                    <p class="text-[11px] text-slate-500">This data is processed with privacy protection and may be anonymized.</p>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors">
                    <div class="flex items-center gap-2 mb-3"><span class="material-symbols-outlined text-accent-teal">analytics</span><h3 class="font-bold text-white">Usage Data</h3></div>
                    <ul class="space-y-2"><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Browser type</li><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> IP address</li><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Pages visited</li><li class="text-sm text-slate-400 flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Time spent</li></ul>
                </div>
            </div>
        </div>

        <!-- 3. How We Protect Your Data -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal">lock</span></div><h2 class="text-2xl font-display font-bold text-white">3. How We Protect Your Data</h2></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-start gap-4 p-4 bg-deep-navy/50 rounded-xl border border-white/5 hover:border-accent-teal/40 transition-colors"><span class="material-symbols-outlined text-accent-teal mt-1">encrypted</span><div><h3 class="font-bold text-white text-sm mb-1">Data Encryption</h3><p class="text-slate-400 text-xs leading-relaxed">All data is encrypted during transmission using secure protocols (TLS).</p></div></div>
                <div class="flex items-start gap-4 p-4 bg-deep-navy/50 rounded-xl border border-white/5 hover:border-accent-teal/40 transition-colors"><span class="material-symbols-outlined text-accent-teal mt-1">visibility_off</span><div><h3 class="font-bold text-white text-sm mb-1">Data Privacy</h3><p class="text-slate-400 text-xs leading-relaxed">Medical data is handled securely and separated from personally identifiable information.</p></div></div>
                <div class="flex items-start gap-4 p-4 bg-deep-navy/50 rounded-xl border border-white/5 hover:border-accent-teal/40 transition-colors"><span class="material-symbols-outlined text-accent-teal mt-1">security</span><div><h3 class="font-bold text-white text-sm mb-1">Access Control</h3><p class="text-slate-400 text-xs leading-relaxed">Only authorized access is permitted to sensitive data.</p></div></div>
                <div class="flex items-start gap-4 p-4 bg-deep-navy/50 rounded-xl border border-white/5 hover:border-accent-teal/40 transition-colors"><span class="material-symbols-outlined text-accent-teal mt-1">cloud</span><div><h3 class="font-bold text-white text-sm mb-1">Secure Storage</h3><p class="text-slate-400 text-xs leading-relaxed">Data is stored using secure cloud infrastructure with regular monitoring.</p></div></div>
            </div>
        </div>

        <!-- 4. Data Sharing -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center border border-accent-blue/20"><span class="material-symbols-outlined text-accent-blue">handshake</span></div><h2 class="text-2xl font-display font-bold text-white">4. Data Sharing</h2></div>
            <p class="text-slate-300 font-bold mb-4">We do NOT sell or rent your personal data.</p>
            <p class="text-slate-300 mb-4">We may share anonymized and aggregated data only for:</p>
            <ul class="space-y-3 mb-6"><li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-accent-blue text-sm mt-1">check_circle</span> Improving AI model performance</li><li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-accent-blue text-sm mt-1">check_circle</span> Academic or research purposes (with your consent)</li><li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-accent-blue text-sm mt-1">check_circle</span> Legal compliance when required</li></ul>
            <div class="p-4 bg-red-500/5 border border-red-500/20 rounded-xl inline-flex items-center gap-3 hover:border-red-500/40 transition-colors"><span class="material-symbols-outlined text-red-400">block</span><p class="text-red-300 text-sm font-medium">We never share personally identifiable medical data with third parties.</p></div>
        </div>

        <!-- 5. Your Rights -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal">gavel</span></div><h2 class="text-2xl font-display font-bold text-white">5. Your Rights</h2></div>
            <p class="text-slate-300 mb-4">You have the right to:</p>
            <ul class="space-y-3"><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">arrow_forward</span> Access your personal data</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">arrow_forward</span> Request correction of inaccurate data</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">arrow_forward</span> Request deletion of your data</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">arrow_forward</span> Withdraw consent at any time</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">arrow_forward</span> File a complaint with relevant authorities</li></ul>
        </div>

        <!-- 6. Data Retention -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
            <div class="flex items-center gap-3 mb-4"><div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center border border-accent-blue/20"><span class="material-symbols-outlined text-accent-blue">inventory_2</span></div><h2 class="text-2xl font-display font-bold text-white">6. Data Retention</h2></div>
            <p class="text-slate-300 leading-relaxed mb-3">We retain your data only as long as necessary to provide our services and improve system performance.</p>
            <p class="text-slate-300 leading-relaxed">You can request deletion of your data at any time.</p>
        </div>

        <!-- 7. Cookies & Tracking -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal">cookie</span></div><h2 class="text-2xl font-display font-bold text-white">7. Cookies & Tracking</h2></div>
            <p class="text-slate-300 mb-4">We may use cookies and similar technologies to:</p>
            <ul class="space-y-3"><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">insights</span> Improve user experience</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">insights</span> Analyze system performance</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">insights</span> Understand user behavior</li></ul>
        </div>

        <!-- Contact CTA -->
        <div class="glass-card p-10 rounded-3xl border border-white/10 hover:border-accent-teal/30 transition-colors text-center relative overflow-hidden mb-[135px]">
            <div class="w-16 h-16 bg-accent-teal/10 rounded-full flex items-center justify-center mx-auto mb-4 border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal text-3xl">mail</span></div>
            <h2 class="text-3xl font-display font-bold text-white mb-4">Contact Us</h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto">If you have any questions about this Privacy Policy, please contact us.</p>
            <a href="{{ route('home') }}#contact" class="inline-flex items-center justify-center gap-2 bg-accent-teal text-deep-navy font-bold px-8 py-4 rounded-full hover:bg-accent-teal/80 transition-colors neon-border"><span class="material-symbols-outlined">mail</span> Get in Touch</a>
        </div>
    </div>
</div>
@endsection