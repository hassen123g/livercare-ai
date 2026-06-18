@extends('layouts.app')

@section('title', 'AI Models - LiverCare AI')

@section('content')
<div class="flex-grow pt-32 pb-0 px-6">
    <div class="max-w-6xl mx-auto space-y-16">
        <!-- Page Header -->
        <div class="text-center">
            <div class="inline-flex items-center gap-3 bg-white/5 px-5 py-2 rounded-full mb-6 border border-white/10 hover:border-accent-teal/50 transition-colors">
                <span class="material-symbols-outlined text-accent-teal text-xl">psychology</span>
                <span class="text-blue-100 bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue text-sm font-bold uppercase tracking-wider">AI Models Powering LiverCare</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue mb-4">Intelligent AI Models</h1>
            <p class="text-slate-400 text-lg max-w-2xl mx-auto leading-relaxed">Discover how our intelligent system uses two specialized AI models to detect liver disease early and provide accurate medical insights.</p>
        </div>

        <!-- Model 1: Clinical Data -->
        <div class="glass-card p-8 rounded-3xl overflow-hidden relative border border-accent-teal/20 hover:border-accent-teal/50 transition-colors">
            <div class="absolute top-0 right-0 w-64 h-64 bg-accent-teal/10 blur-3xl rounded-full pointer-events-none"></div>
            <div class="flex items-center gap-4 mb-6 relative z-10">
                <div class="w-14 h-14 bg-gradient-to-br from-accent-teal/20 to-accent-blue/20 rounded-2xl flex items-center justify-center neon-border">
                    <span class="material-symbols-outlined text-accent-teal text-2xl">science</span>
                </div>
                <div>
                    <h2 class="text-2xl font-display font-bold text-white">Model 1: Liver Disease Prediction</h2>
                    <p class="text-accent-teal font-medium">Clinical Data Analysis</p>
                </div>
            </div>
            <p class="text-slate-300 leading-relaxed mb-8 relative z-10">This model analyzes liver function test results to determine whether a patient is healthy or suffering from liver disease.</p>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 relative z-10">
                <div class="space-y-6 flex flex-col h-full">
                    <div class="bg-deep-navy/40 p-6 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="material-symbols-outlined text-accent-teal text-xl">analytics</span>
                            <h3 class="text-lg font-bold text-white">Dataset</h3>
                        </div>
                        <p class="text-slate-300 font-medium mb-3">Indian Liver Patient Dataset</p>
                        <p class="text-slate-400 text-sm mb-2">Includes key biomarkers such as:</p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Bilirubin</li>
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Alkaline Phosphatase</li>
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> SGPT / SGOT</li>
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span> Proteins</li>
                        </ul>
                    </div>
                    <div class="bg-deep-navy/40 p-6 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors flex-grow">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="material-symbols-outlined text-accent-teal text-xl">rocket_launch</span>
                            <h3 class="text-lg font-bold text-white">Final Model Selection</h3>
                        </div>
                        <p class="text-accent-teal font-bold mb-3">XGBoost (Extreme Gradient Boosting)</p>
                        <p class="text-slate-400 text-sm mb-2">We selected XGBoost as the final model because:</p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm">check_circle</span> Highest accuracy among all models</li>
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm">check_circle</span> Excellent performance on structured medical data</li>
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="material-symbols-outlined text-accent-teal text-sm">check_circle</span> Handles feature interactions effectively</li>
                        </ul>
                    </div>
                </div>
                <div class="space-y-6 flex flex-col h-full">
                    <div class="bg-deep-navy/40 p-6 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="material-symbols-outlined text-accent-teal text-xl">precision_manufacturing</span>
                            <h3 class="text-lg font-bold text-white">Algorithms Evaluated</h3>
                        </div>
                        <div class="space-y-4">
                            <div><div class="flex justify-between text-sm mb-1"><span class="text-slate-300">Logistic Regression</span><span class="text-slate-400">76.07%</span></div><div class="w-full bg-white/5 rounded-full h-1.5"><div class="bg-slate-500 h-1.5 rounded-full" style="width: 76.07%"></div></div></div>
                            <div><div class="flex justify-between text-sm mb-1"><span class="text-slate-300">Support Vector Machine (SVM)</span><span class="text-slate-400">75.46%</span></div><div class="w-full bg-white/5 rounded-full h-1.5"><div class="bg-slate-500 h-1.5 rounded-full" style="width: 75.46%"></div></div></div>
                            <div><div class="flex justify-between text-sm mb-1"><span class="text-slate-300">Random Forest</span><span class="text-slate-400">78.53%</span></div><div class="w-full bg-white/5 rounded-full h-1.5"><div class="bg-slate-400 h-1.5 rounded-full" style="width: 78.53%"></div></div></div>
                            <div><div class="flex justify-between text-sm mb-1"><span class="text-accent-teal font-bold">XGBoost (Best Performance)</span><span class="text-accent-teal font-bold flex items-center gap-1">82.82% <span class="material-symbols-outlined text-sm">check_circle</span></span></div><div class="w-full bg-white/5 rounded-full h-1.5"><div class="bg-accent-teal h-1.5 rounded-full shadow-[0_0_10px_rgba(20,184,166,0.5)]" style="width: 82.82%"></div></div></div>
                        </div>
                    </div>
                    <div class="bg-deep-navy/40 p-6 rounded-2xl border border-white/5 hover:border-accent-teal/50 transition-colors flex-grow">
                        <div class="flex items-center gap-2 mb-6">
                            <span class="material-symbols-outlined text-purple-400 text-xl">track_changes</span>
                            <h3 class="text-lg font-bold text-white">Expected Output</h3>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="flex items-center justify-between bg-white/5 p-4 rounded-xl border border-green-500/20 hover:border-green-500/50 transition-colors w-full">
                                <div class="flex items-center gap-3"><span class="w-2.5 h-2.5 rounded-full bg-green-400"></span><span class="text-green-400 font-medium">Healthy</span></div>
                                <span class="material-symbols-outlined text-green-500/50 text-sm">check_circle</span>
                            </div>
                            <div class="flex items-center justify-between bg-white/5 p-4 rounded-xl border border-red-500/20 hover:border-red-500/50 transition-colors w-full">
                                <div class="flex items-center gap-3"><span class="w-2.5 h-2.5 rounded-full bg-red-400"></span><span class="text-red-400 font-medium">Liver Disease Detected</span></div>
                                <span class="material-symbols-outlined text-red-500/50 text-sm">warning</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Model 2: Medical Imaging -->
        <div class="glass-card p-8 rounded-3xl overflow-hidden relative border border-accent-blue/20 hover:border-accent-blue/50 transition-colors">
            <div class="absolute top-0 left-0 w-64 h-64 bg-accent-blue/10 blur-3xl rounded-full pointer-events-none"></div>
            <div class="flex items-center gap-4 mb-6 relative z-10">
                <div class="w-14 h-14 bg-gradient-to-br from-accent-blue/20 to-purple-500/20 rounded-2xl flex items-center justify-center neon-border border-accent-blue/50">
                    <span class="material-symbols-outlined text-purple-400 text-2xl">genetics</span>
                </div>
                <div>
                    <h2 class="text-2xl font-display font-bold text-white">Model 2: Liver Tumor Classification</h2>
                    <p class="text-accent-blue font-medium">Medical Imaging Analysis</p>
                </div>
            </div>
            <p class="text-slate-300 leading-relaxed mb-8 relative z-10">For high-risk cases, the system recommends medical imaging. This model analyzes liver ultrasound images to classify tumor type.</p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 relative z-10">
                <div class="space-y-6">
                    <div class="bg-deep-navy/40 p-6 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
                        <div class="flex items-center gap-2 mb-4"><span class="material-symbols-outlined text-yellow-400 text-xl">folder_open</span><h3 class="text-lg font-bold text-white">Dataset</h3></div>
                        <p class="text-slate-300 font-medium text-sm mb-3">Annotated Ultrasound Liver Images Dataset</p>
                        <p class="text-slate-400 text-xs mb-2 uppercase tracking-wider font-bold">Categories:</p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="w-2 h-2 rounded-full bg-green-400"></span> Normal</li>
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="w-2 h-2 rounded-full bg-yellow-400"></span> Benign Tumor</li>
                            <li class="flex items-center gap-2 text-sm text-slate-300"><span class="w-2 h-2 rounded-full bg-red-400"></span> Malignant Tumor</li>
                        </ul>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="bg-deep-navy/40 p-6 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors h-full">
                        <div class="flex items-center gap-2 mb-4"><span class="material-symbols-outlined text-accent-blue text-xl">precision_manufacturing</span><h3 class="text-lg font-bold text-white">Model Architecture</h3></div>
                        <div class="space-y-4">
                            <div class="bg-white/5 p-3 rounded-xl border border-white/5 hover:border-accent-blue/50 transition-colors"><p class="text-accent-blue font-bold text-sm">Convolutional Neural Network (CNN)</p></div>
                            <div class="bg-white/5 p-3 rounded-xl border border-white/5 hover:border-purple-400/50 transition-colors"><p class="text-purple-400 font-bold text-sm">Transfer Learning</p><p class="text-slate-400 text-xs mt-1">using MobileNetV2</p></div>
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="bg-deep-navy/40 p-6 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors">
                        <div class="flex items-center gap-2 mb-4"><span class="material-symbols-outlined text-slate-300 text-xl">settings</span><h3 class="text-lg font-bold text-white">Training Details</h3></div>
                        <ul class="space-y-3">
                            <li class="flex justify-between text-sm"><span class="text-slate-400">Accuracy:</span><span class="text-accent-blue font-bold">75.51%</span></li>
                            <li class="flex justify-between text-sm"><span class="text-slate-400">Optimizer:</span><span class="text-slate-200">Adam</span></li>
                            <li class="flex justify-between text-sm"><span class="text-slate-400">Loss Function:</span><span class="text-slate-200 text-xs pt-1">Categorical Crossentropy</span></li>
                            <li class="flex justify-between text-sm"><span class="text-slate-400">Batch Size:</span><span class="text-slate-200">32</span></li>
                            <li class="flex justify-between text-sm"><span class="text-slate-400">Epochs:</span><span class="text-slate-200">10</span></li>
                        </ul>
                    </div>
                </div>
                <div class="lg:col-span-3">
                    <div class="bg-deep-navy/40 p-5 rounded-2xl border border-white/5 hover:border-accent-blue/50 transition-colors flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-2"><span class="material-symbols-outlined text-purple-400 text-xl">track_changes</span><h3 class="text-lg font-bold text-white">Output</h3></div>
                        <div class="flex flex-wrap items-center justify-center gap-4">
                            <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-lg border border-white/10 hover:border-accent-blue/50 transition-colors"><span class="material-symbols-outlined text-accent-blue text-sm">radar</span><span class="text-sm font-medium text-slate-300">Detects tumor presence</span></div>
                            <div class="flex items-center gap-2 bg-white/5 px-4 py-2 rounded-lg border border-white/10 hover:border-purple-400/50 transition-colors"><span class="material-symbols-outlined text-purple-400 text-sm">category</span><span class="text-sm font-medium text-slate-300">Classifies tumor type</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Two Stage Pipeline -->
        <div class="glass-card p-10 rounded-3xl border border-white/10 hover:border-white/20 transition-colors text-center relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-accent-teal/5 pointer-events-none"></div>
            <div class="inline-flex items-center gap-2 bg-accent-teal/10 px-4 py-1.5 rounded-full mb-4 border border-accent-teal/20 text-accent-teal font-medium text-sm hover:border-accent-teal/50 transition-colors">
                <span class="material-symbols-outlined text-accent-teal text-lg">psychology</span> Smart Medical Decision System
            </div>
            <h2 class="text-3xl font-display font-bold text-white mb-4">Intelligent Two-Stage Pipeline</h2>
            <p class="text-slate-400 max-w-2xl mx-auto mb-10">Our platform combines both models into a two-stage intelligent pipeline:</p>
            <div class="flex flex-col md:flex-row items-center justify-center gap-4 md:gap-8 mb-12 relative z-10">
                <div class="bg-deep-navy/60 p-4 rounded-xl border border-white/10 w-full md:w-48 text-center shadow-lg group hover:border-accent-teal/50 transition-colors">
                    <span class="material-symbols-outlined text-slate-200 text-3xl mb-2 block">biotech</span>
                    <p class="text-sm font-bold text-slate-200">Analyze blood test results</p>
                </div>
                <div class="text-accent-teal/50 hidden md:block"><span class="material-symbols-outlined text-3xl">arrow_forward</span></div>
                <div class="text-accent-teal/50 md:hidden rotate-90"><span class="material-symbols-outlined text-3xl">arrow_forward</span></div>
                <div class="bg-yellow-500/10 p-4 rounded-xl border border-yellow-500/20 w-full md:w-56 text-center shadow-lg group hover:border-yellow-500/50 transition-colors">
                    <span class="material-symbols-outlined text-yellow-500 text-2xl mb-2 block">warning</span>
                    <p class="text-sm font-bold text-yellow-500">If risk detected<br><span class="text-xs text-yellow-500/70">→ recommend imaging</span></p>
                </div>
                <div class="text-accent-blue/50 hidden md:block"><span class="material-symbols-outlined text-3xl">arrow_forward</span></div>
                <div class="text-accent-blue/50 md:hidden rotate-90"><span class="material-symbols-outlined text-3xl">arrow_forward</span></div>
                <div class="bg-deep-navy/60 p-4 rounded-xl border border-white/10 w-full md:w-48 text-center shadow-lg group hover:border-accent-blue/50 transition-colors">
                    <span class="material-symbols-outlined text-slate-200 text-3xl mb-2 block">genetics</span>
                    <p class="text-sm font-bold text-slate-200">Analyze scan results</p>
                </div>
                <div class="text-purple-400/50 hidden md:block"><span class="material-symbols-outlined text-3xl">arrow_forward</span></div>
                <div class="text-purple-400/50 md:hidden rotate-90"><span class="material-symbols-outlined text-3xl">arrow_forward</span></div>
                <div class="bg-accent-teal/10 p-4 rounded-xl border border-accent-teal/30 w-full md:w-48 text-center shadow-[0_0_15px_rgba(20,184,166,0.15)] group hover:border-accent-teal transition-colors">
                    <span class="material-symbols-outlined text-accent-teal text-3xl mb-2 block">clinical_notes</span>
                    <p class="text-sm font-bold text-accent-teal">Provide final diagnosis and guidance</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-left relative z-10 border-t border-white/5 pt-8">
                <div class="col-span-full mb-2 flex items-center gap-2"><span class="material-symbols-outlined text-yellow-400 text-xl">bolt</span><h3 class="text-lg font-bold text-white">Why Our System is Reliable</h3></div>
                <div class="bg-white/5 p-4 rounded-xl border border-white/5 hover:border-accent-teal/50 transition-colors"><span class="material-symbols-outlined text-accent-teal mb-2">integration_instructions</span><p class="text-sm text-slate-300">Combines clinical data + imaging analysis</p></div>
                <div class="bg-white/5 p-4 rounded-xl border border-white/5 hover:border-accent-blue/50 transition-colors"><span class="material-symbols-outlined text-accent-blue mb-2">model_training</span><p class="text-sm text-slate-300">Uses state-of-the-art AI models</p></div>
                <div class="bg-white/5 p-4 rounded-xl border border-white/5 hover:border-purple-400/50 transition-colors"><span class="material-symbols-outlined text-purple-400 mb-2">query_stats</span><p class="text-sm text-slate-300">Designed for early detection and decision support</p></div>
                <div class="bg-white/5 p-4 rounded-xl border border-white/5 hover:border-green-400/50 transition-colors"><span class="material-symbols-outlined text-green-400 mb-2">health_and_safety</span><p class="text-sm text-slate-300">Reduces unnecessary scans for low-risk patients</p></div>
            </div>
        </div>

        <!-- CTA -->
        <div class="glass-card p-10 rounded-3xl border border-white/10 hover:border-accent-teal/30 transition-colors text-center relative overflow-hidden mb-[135px]">
            <div class="w-16 h-16 bg-accent-teal/10 rounded-full flex items-center justify-center mx-auto mb-4 border border-accent-teal/20">
                <span class="material-symbols-outlined text-accent-teal text-3xl">science</span>
            </div>
            <h2 class="text-3xl font-display font-bold text-white mb-4">Try the AI System</h2>
            <p class="text-slate-400 mb-8 max-w-xl mx-auto">Start your diagnosis now and get instant AI-powered insights.</p>
            <a href="{{ route('prediction.create') }}" class="inline-flex items-center justify-center gap-2 bg-accent-teal text-deep-navy font-bold px-8 py-4 rounded-full hover:bg-accent-teal/80 transition-colors neon-border">
                <span class="material-symbols-outlined">science</span> Start Diagnosis
            </a>
        </div>
    </div>
</div>
@endsection