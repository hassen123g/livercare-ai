@extends('layouts.app')

@section('title', 'Medical Methodology - LiverCare AI')

@section('content')
<div class="flex-grow pt-32 pb-0 px-6">
    <div class="max-w-5xl mx-auto space-y-8">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-3 bg-white/5 px-5 py-2 rounded-full mb-6 border border-white/10 hover:border-accent-teal/50 transition-colors">
                <span class="material-symbols-outlined text-accent-teal text-xl">science</span>
                <span class="text-blue-100 bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue text-sm font-bold uppercase tracking-wider">Medical Methodology</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-4">Clinical Approach</h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto">Our system follows a structured approach that combines medical knowledge with artificial intelligence to support early detection of liver diseases.</p>
        </div>

        <!-- Clinical Workflow Pipeline -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center border border-accent-teal/20">
                    <span class="material-symbols-outlined text-accent-teal">account_tree</span>
                </div>
                <h2 class="text-2xl font-display font-bold text-white">Clinical Workflow Pipeline</h2>
            </div>
            <p class="text-slate-300 mb-6">From data input to final insights in four main stages:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors flex flex-col h-full">
                    <div class="w-8 h-8 bg-accent-teal rounded-full flex items-center justify-center text-deep-navy font-bold mb-3 shrink-0">1</div>
                    <h3 class="font-bold text-white mb-2">Data Collection</h3>
                    <p class="text-xs text-slate-400 mb-3">User medical data is collected, including:</p>
                    <ul class="space-y-1 mb-4 flex-grow">
                        <li class="text-xs text-slate-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-accent-teal shrink-0"></span> Liver function test results</li>
                        <li class="text-xs text-slate-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-accent-teal shrink-0"></span> Basic health indicators</li>
                        <li class="text-xs text-slate-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-accent-teal shrink-0"></span> Demographic information</li>
                    </ul>
                    <div class="mt-auto">
                        <p class="text-[10px] text-accent-teal font-bold uppercase tracking-wider mb-2">Key Inputs:</p>
                        <div class="flex flex-wrap gap-1.5">
                            <span class="text-[10px] px-2 py-0.5 bg-accent-teal/10 text-accent-teal rounded-full">ALT</span>
                            <span class="text-[10px] px-2 py-0.5 bg-accent-teal/10 text-accent-teal rounded-full">AST</span>
                            <span class="text-[10px] px-2 py-0.5 bg-accent-teal/10 text-accent-teal rounded-full">Bilirubin</span>
                            <span class="text-[10px] px-2 py-0.5 bg-accent-teal/10 text-accent-teal rounded-full">Albumin</span>
                        </div>
                    </div>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-blue/40 transition-colors flex flex-col h-full">
                    <div class="w-8 h-8 bg-accent-blue rounded-full flex items-center justify-center text-deep-navy font-bold mb-3 shrink-0">2</div>
                    <h3 class="font-bold text-white mb-2">Data Preprocessing</h3>
                    <p class="text-xs text-slate-400 mb-3">The collected data is prepared for analysis through:</p>
                    <ul class="space-y-1 mb-4 flex-grow">
                        <li class="text-xs text-slate-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-accent-blue shrink-0"></span> Data normalization</li>
                        <li class="text-xs text-slate-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-accent-blue shrink-0"></span> Missing value handling</li>
                        <li class="text-xs text-slate-400 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-accent-blue shrink-0"></span> Feature selection</li>
                    </ul>
                    <p class="text-[10px] text-slate-500 mt-auto pt-2 border-t border-white/5">This ensures accurate and reliable model performance.</p>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors flex flex-col h-full">
                    <div class="w-8 h-8 bg-accent-teal rounded-full flex items-center justify-center text-deep-navy font-bold mb-3 shrink-0">3</div>
                    <h3 class="font-bold text-white mb-2">AI Analysis</h3>
                    <p class="text-xs text-slate-400 mb-3">The processed data is analyzed using a trained machine learning model:</p>
                    <ul class="space-y-1 mb-4 flex-grow">
                        <li class="text-xs text-slate-400 flex items-start gap-2"><span class="w-1 h-1 rounded-full bg-accent-teal shrink-0 mt-1.5"></span> XGBoost (Primary Model)</li>
                        <li class="text-xs text-slate-400 flex items-start gap-2"><span class="w-1 h-1 rounded-full bg-accent-teal shrink-0 mt-1.5"></span> Optimized for medical tabular data</li>
                        <li class="text-xs text-slate-400 flex items-start gap-2"><span class="w-1 h-1 rounded-full bg-accent-teal shrink-0 mt-1.5"></span> Detects patterns in liver biomarkers</li>
                    </ul>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-blue/40 transition-colors flex flex-col h-full">
                    <div class="w-8 h-8 bg-accent-blue rounded-full flex items-center justify-center text-deep-navy font-bold mb-3 shrink-0">4</div>
                    <h3 class="font-bold text-white mb-2">Smart Medical Output</h3>
                    <p class="text-xs text-slate-400 mb-3">The system provides:</p>
                    <ul class="space-y-2 mb-4 flex-grow">
                        <li class="text-xs text-slate-400 flex items-start gap-2"><span class="material-symbols-outlined text-[14px] text-accent-blue shrink-0 mt-0.5">health_and_safety</span> Health status (Healthy / Disease Detected)</li>
                        <li class="text-xs text-slate-400 flex items-start gap-2"><span class="material-symbols-outlined text-[14px] text-accent-blue shrink-0 mt-0.5">warning</span> Risk indication</li>
                        <li class="text-xs text-slate-400 flex items-start gap-2"><span class="material-symbols-outlined text-[14px] text-accent-blue shrink-0 mt-0.5">directions</span> Guidance for next steps</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Key Biomarkers Analyzed -->
        <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center border border-accent-blue/20">
                    <span class="material-symbols-outlined text-accent-blue">biotech</span>
                </div>
                <h2 class="text-2xl font-display font-bold text-white">Key Biomarkers Analyzed</h2>
            </div>
            <p class="text-slate-300 mb-6">Our system relies on important liver function indicators:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors flex flex-col">
                    <div class="flex items-center gap-2 mb-1"><span class="material-symbols-outlined text-accent-teal text-lg">science</span><h3 class="font-bold text-white">ALT</h3></div>
                    <p class="text-[10px] text-slate-400 mb-3 uppercase tracking-wide">Alanine Aminotransferase</p>
                    <p class="text-sm text-slate-400 leading-relaxed mb-4 flex-grow">Indicates liver cell damage. High levels suggest liver inflammation.</p>
                    <div class="text-xs font-bold text-accent-teal bg-accent-teal/10 px-3 py-2 rounded-lg text-center">Normal Range: 7–56 U/L</div>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors flex flex-col">
                    <div class="flex items-center gap-2 mb-1"><span class="material-symbols-outlined text-accent-teal text-lg">science</span><h3 class="font-bold text-white">AST</h3></div>
                    <p class="text-[10px] text-slate-400 mb-3 uppercase tracking-wide">Aspartate Aminotransferase</p>
                    <p class="text-sm text-slate-400 leading-relaxed mb-4 flex-grow">Helps assess liver condition and is used with ALT for diagnosis.</p>
                    <div class="text-xs font-bold text-accent-teal bg-accent-teal/10 px-3 py-2 rounded-lg text-center">Normal Range: 10–40 U/L</div>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors flex flex-col">
                    <div class="flex items-center gap-2 mb-1"><span class="material-symbols-outlined text-accent-teal text-lg">science</span><h3 class="font-bold text-white">Total Bilirubin</h3></div>
                    <p class="text-sm text-slate-400 leading-relaxed mb-4 flex-grow">Indicates liver function and bile flow issues.</p>
                    <div class="text-xs font-bold text-accent-teal bg-accent-teal/10 px-3 py-2 rounded-lg text-center">Normal Range: 0.1–1.2 mg/dL</div>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors flex flex-col">
                    <div class="flex items-center gap-2 mb-1"><span class="material-symbols-outlined text-accent-teal text-lg">science</span><h3 class="font-bold text-white">Albumin</h3></div>
                    <p class="text-sm text-slate-400 leading-relaxed mb-4 flex-grow">Reflects liver's ability to produce proteins.</p>
                    <div class="text-xs font-bold text-accent-teal bg-accent-teal/10 px-3 py-2 rounded-lg text-center">Normal Range: 3.5–5.5 g/dL</div>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors flex flex-col">
                    <div class="flex items-center gap-2 mb-1"><span class="material-symbols-outlined text-accent-teal text-lg">science</span><h3 class="font-bold text-white">Alkaline Phosphatase</h3></div>
                    <p class="text-sm text-slate-400 leading-relaxed mb-4 flex-grow">Indicates bile duct and liver conditions.</p>
                    <div class="text-xs font-bold text-accent-teal bg-accent-teal/10 px-3 py-2 rounded-lg text-center">Normal Range: 44–147 U/L</div>
                </div>
                <div class="p-5 bg-deep-navy/50 border border-white/5 rounded-xl hover:border-accent-teal/40 transition-colors flex flex-col">
                    <div class="flex items-center gap-2 mb-1"><span class="material-symbols-outlined text-accent-teal text-lg">science</span><h3 class="font-bold text-white">Platelet Count</h3></div>
                    <p class="text-sm text-slate-400 leading-relaxed mb-4 flex-grow">Used as an indicator for liver fibrosis or advanced liver disease.</p>
                    <div class="text-xs font-bold text-accent-teal bg-accent-teal/10 px-3 py-2 rounded-lg text-center">Normal Range: 150,000–400,000/µL</div>
                </div>
            </div>
        </div>

        <!-- Disease Insights & Advanced Imaging -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors flex flex-col">
                <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-teal/20 rounded-xl flex items-center justify-center"><span class="material-symbols-outlined text-accent-teal">local_hospital</span></div><h2 class="text-2xl font-display font-bold text-white">Disease Insights</h2></div>
                <p class="text-slate-300 mb-4">The system helps detect patterns associated with:</p>
                <ul class="space-y-3 mb-6 flex-grow">
                    <li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">check_circle</span> Liver disease (general detection)</li>
                    <li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">check_circle</span> Liver inflammation</li>
                    <li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-accent-teal text-sm mt-1">check_circle</span> Possible fibrosis indicators</li>
                </ul>
                <div class="p-4 bg-yellow-500/5 border border-yellow-500/20 rounded-xl flex items-start gap-3 hover:border-yellow-500/40 transition-colors">
                    <span class="material-symbols-outlined text-yellow-500">warning</span>
                    <p class="text-yellow-500 text-sm font-medium">Final diagnosis must always be confirmed by medical professionals.</p>
                </div>
            </div>
            <div class="glass-card p-8 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors flex flex-col">
                <div class="flex items-center gap-3 mb-6"><div class="w-10 h-10 bg-accent-blue/20 rounded-xl flex items-center justify-center"><span class="material-symbols-outlined text-accent-blue">smart_toy</span></div><h2 class="text-2xl font-display font-bold text-white">Advanced Imaging Support</h2></div>
                <p class="text-slate-300 mb-4">For high-risk cases:</p>
                <ul class="space-y-3 mb-6 flex-grow">
                    <li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-accent-blue text-sm mt-1">medical_information</span> Users are advised to perform medical imaging (Ultrasound / CT Scan)</li>
                    <li class="flex items-start gap-3 text-slate-400"><span class="material-symbols-outlined text-accent-blue text-sm mt-1">memory</span> A CNN model analyzes images to classify:</li>
                </ul>
                <div class="grid grid-cols-3 gap-2">
                    <div class="p-3 bg-green-500/10 border border-green-500/20 rounded-xl text-center hover:border-green-500/40 transition-colors"><span class="w-3 h-3 rounded-full bg-green-500 inline-block mb-1"></span><p class="text-green-400 text-xs font-bold uppercase">Normal</p></div>
                    <div class="p-3 bg-yellow-500/10 border border-yellow-500/20 rounded-xl text-center hover:border-yellow-500/40 transition-colors"><span class="w-3 h-3 rounded-full bg-yellow-500 inline-block mb-1"></span><p class="text-yellow-500 text-xs font-bold uppercase">Benign</p></div>
                    <div class="p-3 bg-red-500/10 border border-red-500/20 rounded-xl text-center hover:border-red-500/40 transition-colors"><span class="w-3 h-3 rounded-full bg-red-500 inline-block mb-1"></span><p class="text-red-400 text-xs font-bold uppercase">Malignant</p></div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="glass-card p-10 rounded-3xl border border-white/10 hover:border-accent-teal/30 transition-colors text-center relative overflow-hidden mb-[135px]">
            <div class="w-16 h-16 bg-accent-teal/10 rounded-full flex items-center justify-center mx-auto mb-4 border border-accent-teal/20">
                <span class="material-symbols-outlined text-accent-teal text-3xl">search</span>
            </div>
            <h2 class="text-3xl font-display font-bold text-white mb-4">Explore Our AI Models</h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto">Learn more about the machine learning models behind the system.</p>
            <a href="{{ route('ai-models') }}" class="inline-flex items-center justify-center gap-2 bg-accent-teal text-deep-navy font-bold px-8 py-4 rounded-full hover:bg-accent-teal/80 transition-colors neon-border">
                <span class="material-symbols-outlined">neurology</span> View AI Models
            </a>
        </div>
    </div>
</div>
@endsection