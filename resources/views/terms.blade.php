@extends('layouts.app')

@section('title', 'Terms & Conditions - LiverCare AI')

@section('content')
<div class="flex-grow pt-32 pb-0 px-6">
    <div class="max-w-4xl mx-auto space-y-8">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 bg-white/5 px-5 py-2 rounded-full mb-6 border border-white/10 hover:border-accent-teal/50 transition-colors">
                <span class="material-symbols-outlined text-accent-teal text-xl">balance</span>
                <span class="text-blue-100 bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue text-sm font-bold uppercase tracking-wider">Legal Document</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-4">Terms & Conditions</h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">Review our guidelines for a safe and responsible use of LiverCare AI.</p>
        </div>

        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-4"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal">description</span></div><h2 class="text-2xl font-display font-bold text-white">1. Acceptance of Terms</h2></div>
            <p class="text-slate-300 leading-relaxed">By accessing and using LiverCare AI, you agree to comply with these Terms and Conditions. If you do not agree, please do not use the platform.</p>
        </div>

        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center border border-accent-blue/20"><span class="material-symbols-outlined text-accent-blue">warning</span></div><h2 class="text-2xl font-display font-bold text-white">2. Medical Disclaimer</h2></div>
            <div class="p-5 bg-yellow-500/5 border border-yellow-500/20 rounded-xl mb-6 hover:border-yellow-500/50 transition-colors">
                <div class="flex items-center gap-2 mb-3"><span class="material-symbols-outlined text-yellow-500">campaign</span><span class="font-bold text-yellow-500">Important Notice</span></div>
                <p class="text-slate-300 text-sm leading-relaxed mb-3">LiverCare AI is an AI-powered decision support tool and is not a substitute for professional medical advice, diagnosis, or treatment.</p>
                <p class="text-slate-300 text-sm leading-relaxed mb-3">Users should always consult a qualified healthcare provider before making any medical decisions.</p>
                <p class="text-slate-300 text-sm leading-relaxed">All predictions are based on machine learning models and should be considered as supportive insights, not final diagnoses.</p>
            </div>
        </div>

        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal">account_circle</span></div><h2 class="text-2xl font-display font-bold text-white">3. User Responsibilities</h2></div>
            <ul class="space-y-3"><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">check_circle</span> You must provide accurate and complete information</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">check_circle</span> You are responsible for maintaining the confidentiality of your account</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">check_circle</span> You agree to use the platform responsibly and ethically</li></ul>
        </div>

        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center border border-accent-blue/20"><span class="material-symbols-outlined text-accent-blue">block</span></div><h2 class="text-2xl font-display font-bold text-white">4. Prohibited Uses</h2></div>
            <p class="text-slate-300 mb-4">You agree NOT to:</p>
            <ul class="space-y-3"><li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-red-400 text-sm mt-1">close</span> Use the system as a replacement for medical professionals</li><li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-red-400 text-sm mt-1">close</span> Upload false, incomplete, or misleading medical data</li><li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-red-400 text-sm mt-1">close</span> Attempt to manipulate or reverse-engineer the AI system</li><li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-red-400 text-sm mt-1">close</span> Use the platform for illegal or harmful purposes</li></ul>
        </div>

        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal">psychology</span></div><h2 class="text-2xl font-display font-bold text-white">5. AI System Limitations</h2></div>
            <ul class="space-y-3"><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-yellow-500 text-sm mt-1">warning</span> AI predictions are not 100% accurate</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-yellow-500 text-sm mt-1">warning</span> Results may vary depending on input data quality</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-yellow-500 text-sm mt-1">warning</span> The system may not detect all medical conditions</li></ul>
        </div>

        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center border border-accent-blue/20"><span class="material-symbols-outlined text-accent-blue">security</span></div><h2 class="text-2xl font-display font-bold text-white">6. Privacy & Data Usage</h2></div>
            <p class="text-slate-300 mb-4">We respect your privacy:</p>
            <ul class="space-y-3"><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-blue text-sm mt-1">verified_user</span> Your medical data is used only for analysis purposes</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-blue text-sm mt-1">verified_user</span> We do not share your data with third parties without consent</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-accent-blue text-sm mt-1">verified_user</span> Data may be used anonymously to improve the AI system</li></ul>
        </div>

        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-4"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal">copyright</span></div><h2 class="text-2xl font-display font-bold text-white">7. Intellectual Property</h2></div>
            <p class="text-slate-300 leading-relaxed">All platform content including AI models, design, and code are owned by LiverCare AI and are protected by intellectual property laws.</p>
        </div>

        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
            <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center border border-accent-blue/20"><span class="material-symbols-outlined text-accent-blue">shield</span></div><h2 class="text-2xl font-display font-bold text-white">8. Limitation of Liability</h2></div>
            <ul class="space-y-3"><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-slate-400 text-sm mt-1">info</span> LiverCare AI is provided "as is" without warranties.</li><li class="flex items-start gap-3 text-slate-300"><span class="material-symbols-outlined text-slate-400 text-sm mt-1">info</span> We are not responsible for any decisions made based on AI predictions.</li></ul>
        </div>

        <div class="glass-card p-10 rounded-3xl border border-white/10 hover:border-accent-teal/30 transition-colors text-center relative overflow-hidden mb-[135px]">
            <div class="w-16 h-16 bg-accent-teal/10 rounded-full flex items-center justify-center mx-auto mb-4 border border-accent-teal/20"><span class="material-symbols-outlined text-accent-teal text-3xl">mail</span></div>
            <h2 class="text-3xl font-display font-bold text-white mb-4">Contact Us</h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto">If you have any questions, feel free to contact us.</p>
            <a href="{{ route('home') }}#contact" class="inline-flex items-center justify-center gap-2 bg-accent-teal text-deep-navy font-bold px-8 py-4 rounded-full hover:bg-accent-teal/80 transition-colors neon-border"><span class="material-symbols-outlined">mail</span> Get in Touch</a>
        </div>
    </div>
</div>
@endsection