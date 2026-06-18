@extends('layouts.app')

@section('title', 'Next-Gen Medical Prediction')

@section('content')
<!-- Hero Section - Reduced padding-top to decrease gap -->
<section class="min-h-screen flex items-center pt-1 sm:pt-10 pb-8 sm:pb-12 px-4 sm:px-6 overflow-hidden" id="home">
    <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 lg:gap-12 items-stretch">
        <div class="z-10 lg:col-span-7 xl:col-span-7 flex flex-col justify-center py-2 sm:py-4">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-[10px] sm:text-xs font-bold tracking-widest uppercase md:w-max mb-4 sm:mb-6">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-accent-teal opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-accent-teal"></span>
                </span>
                AI-Powered Early Detection
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-display font-bold text-white leading-tight mb-4 sm:mb-6">
                Smart Liver <br />
                <span class="text-blue-600 bg-clip-text bg-gradient-to-r from-accent-teal to-accent-blue">Disease Prediction</span>
            </h1>
            <p class="text-sm sm:text-base lg:text-lg text-slate-400 max-w-lg mb-6 sm:mb-10 leading-relaxed">
                An AI-based system that analyzes medical laboratory results to support early detection of liver diseases,
                including Hepatitis B, Hepatitis C, and Liver Cirrhosis.
            </p>
            <div class="flex flex-wrap gap-3 sm:gap-4">
                <a class="px-5 sm:px-8 py-3 sm:py-4 bg-accent-teal text-deep-navy font-bold rounded-xl flex items-center gap-2 hover:bg-opacity-90 transition-all neon-border text-sm sm:text-base" href="#prediction">
                    <span class="material-symbols-outlined text-lg sm:text-2xl">analytics</span>
                    Try Prediction
                </a>
                <div class="glass-card px-4 sm:px-6 py-3 sm:py-4 rounded-xl flex items-center gap-3 sm:gap-4">
                    <div class="text-lg sm:text-2xl font-bold text-white">AI Model</div>
                    <div class="text-[9px] sm:text-[10px] text-slate-500 uppercase tracking-tighter">
                        Trained on medical datasets <br />
                        With validated performance metrics
                    </div>
                </div>
            </div>
        </div>
        
        <div class="relative w-full lg:col-span-5 xl:col-span-5 flex items-stretch mt-6 lg:mt-0 py-2 sm:py-4">
            <div class="relative w-full rounded-2xl overflow-hidden glass-card neon-border min-h-[280px] sm:min-h-[350px] lg:min-h-0 lg:h-full">
                <iframe title="3D Liver Model" src="https://sketchfab.com/models/699bcb84087a4d5d85d6babb2a6778b1/embed?autostart=1&ui_infos=0&ui_controls=1&ui_watermark=0"
                    class="w-full h-full absolute inset-0" frameborder="0" allow="autoplay; fullscreen; xr-spatial-tracking" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-8 sm:py-12 px-4 sm:px-6 relative overflow-hidden mb-8 sm:mb-12" id="engine">
    <div class="absolute top-0 left-0 w-64 h-64 bg-accent-teal/10 blur-[100px] rounded-full -z-10"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-accent-blue/10 blur-[100px] rounded-full -z-10"></div>

    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-10 sm:mb-16">
            <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-xs sm:text-sm font-bold tracking-widest uppercase mb-3 sm:mb-4">
                <span class="material-symbols-outlined text-sm sm:text-base">psychology</span>
                How It Works
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-display font-bold text-white mb-4 sm:mb-6">
                Simple <span class="text-accent-teal">3-Step</span> Process
            </h2>
            <p class="text-sm sm:text-base lg:text-lg text-slate-400 max-w-3xl mx-auto leading-relaxed">
                Our AI system makes liver disease prediction accessible to everyone. No medical expertise required.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-10 sm:mb-16">
            <div class="glass-card p-5 sm:p-8 rounded-2xl text-center hover:border-accent-teal/50 transition-colors duration-300">
                <div class="w-14 h-14 sm:w-20 sm:h-20 mx-auto mb-4 sm:mb-6 bg-accent-teal/10 rounded-2xl flex items-center justify-center">
                    <div class="text-2xl font-bold text-accent-teal">1</div>
                </div>
                <h3 class="text-base sm:text-xl font-bold text-white mb-2 sm:mb-4">Enter Lab Values</h3>
                <p class="text-slate-400">Simply enter your blood test results. We guide you through each parameter.</p>
                <div class="flex justify-center mt-6">
                    <span class="material-symbols-outlined text-accent-teal text-3xl">drive_file_rename_outline</span>
                </div>
            </div>

            <div class="glass-card p-5 sm:p-8 rounded-2xl text-center hover:border-accent-blue/50 transition-colors duration-300">
                <div class="w-14 h-14 sm:w-20 sm:h-20 mx-auto mb-4 sm:mb-6 bg-accent-blue/10 rounded-2xl flex items-center justify-center">
                    <div class="text-2xl font-bold text-accent-blue">2</div>
                </div>
                <h3 class="text-base sm:text-xl font-bold text-white mb-2 sm:mb-4">AI Analysis</h3>
                <p class="text-slate-400">Our advanced AI compares your values with hundreds of medical cases to identify patterns and risks.</p>
                <div class="flex justify-center mt-6">
                    <span class="material-symbols-outlined text-accent-blue text-3xl">psychology</span>
                </div>
            </div>

            <div class="glass-card p-5 sm:p-8 rounded-2xl text-center hover:border-accent-teal/50 transition-colors duration-300">
                <div class="w-14 h-14 sm:w-20 sm:h-20 mx-auto mb-4 sm:mb-6 bg-accent-teal/10 rounded-2xl flex items-center justify-center">
                    <div class="text-2xl font-bold text-accent-teal">3</div>
                </div>
                <h3 class="text-base sm:text-xl font-bold text-white mb-2 sm:mb-4">Get Results</h3>
                <p class="text-slate-400">Receive clear, easy-to-understand risk assessments with actionable recommendations.</p>
                <div class="flex justify-center mt-6">
                    <span class="material-symbols-outlined text-accent-teal text-3xl">insights</span>
                </div>
            </div>
        </div>

        <div class="glass-card p-5 sm:p-8 rounded-2xl neon-border">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-12 items-center">
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-accent-teal/20 rounded-xl flex items-center justify-center">
                            <span class="material-symbols-outlined text-accent-teal text-2xl">smart_toy</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-display font-bold text-white">The AI Behind the Scenes</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-accent-teal/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="material-symbols-outlined text-accent-teal text-sm">check</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">Trained on Real Medical Data</h4>
                                <p class="text-sm text-slate-400">Learned from hundreds of actual patient cases and lab results.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-accent-blue/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="material-symbols-outlined text-accent-blue text-sm">check</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">Pattern Recognition</h4>
                                <p class="text-sm text-slate-400">Identifies subtle patterns humans might miss in lab values.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-accent-teal/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="material-symbols-outlined text-accent-teal text-sm">check</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">Consistent Analysis</h4>
                                <p class="text-sm text-slate-400">Applies learned patterns consistently to every case without variation.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-accent-blue/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <span class="material-symbols-outlined text-accent-blue text-sm">check</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-white mb-1">Data-Driven Approach</h4>
                                <p class="text-sm text-slate-400">Model developed using established and diverse medical datasets.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        <a href="#prediction" class="px-6 py-3 bg-accent-teal text-deep-navy font-bold rounded-xl flex items-center gap-2 hover:bg-opacity-90 transition-all neon-border w-fit">
                            <span class="material-symbols-outlined">play_arrow</span>
                            Try It Now
                        </a>
                    </div>
                </div>
                <div class="relative h-64 flex items-center justify-center">
                    <div class="flex items-center justify-center gap-4 w-full flex-wrap">
                        <div class="glass-card p-4 rounded-xl w-28 text-center">
                            <span class="material-symbols-outlined text-accent-teal text-2xl mb-2">input</span>
                            <div class="text-xs font-bold text-white">Lab Values</div>
                        </div>
                        <span class="material-symbols-outlined text-accent-blue text-3xl">arrow_forward</span>
                        <div class="glass-card p-4 rounded-xl w-36 text-center neon-border">
                            <span class="material-symbols-outlined text-accent-blue text-3xl mb-2 animate-pulse">psychology</span>
                            <div class="text-sm font-bold text-white">AI Brain</div>
                            <div class="text-xs text-slate-400">Processing</div>
                        </div>
                        <span class="material-symbols-outlined text-accent-teal text-3xl">arrow_forward</span>
                        <div class="glass-card p-4 rounded-xl w-28 text-center">
                            <span class="material-symbols-outlined text-accent-teal text-2xl mb-2">insights</span>
                            <div class="text-xs font-bold text-white">Results</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Prediction Section -->
<section class="py-8 sm:py-12 px-4 sm:px-6 relative overflow-hidden" id="prediction">
    <div class="absolute top-1/4 left-0 w-64 h-64 bg-accent-teal/10 blur-[100px] rounded-full -z-10 animate-pulse-slow"></div>
    <div class="absolute bottom-1/4 right-0 w-72 h-72 bg-accent-blue/10 blur-[100px] rounded-full -z-10 animate-pulse-slow" style="animation-delay: 2s;"></div>

    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-sm font-bold tracking-widest uppercase mb-4">
                <span class="material-symbols-outlined text-base">experiment</span>
                Live AI Prediction
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-display font-bold text-white mb-4 sm:mb-6">
                Try The <span class="text-accent-teal">AI Model</span>
            </h2>
            <p class="text-sm sm:text-base lg:text-lg text-slate-400 max-w-3xl mx-auto leading-relaxed">
                Enter laboratory values to receive AI-powered risk assessment for liver diseases.
            </p>
        </div>

        <!-- Simplified Prediction Form - Direct to Laravel route -->
        <div class="glass-card p-4 sm:p-6 lg:p-8 rounded-2xl mb-8 sm:mb-12 neon-border">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-12 h-12 bg-accent-teal/20 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-accent-teal text-2xl">auto_awesome</span>
                </div>
                <h3 class="text-lg sm:text-xl lg:text-2xl font-display font-bold text-white">AI-Powered Liver Disease Prediction</h3>
            </div>

            <form action="{{ route('prediction.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="bg-white/[0.03] rounded-2xl border border-white/10 p-4 sm:p-6 mb-6 sm:mb-8">
                    <h4 class="text-sm sm:text-base lg:text-lg font-bold text-accent-teal mb-4 sm:mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-2xl">person</span>
                        Patient Data
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                        <div>
                            <label class="flex items-center gap-2 text-[13px] font-medium text-gray-300 mb-2">First Name</label>
                            <input type="text" name="first_name" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white outline-none focus:border-accent-teal focus:ring-1 focus:ring-accent-teal transition-all text-sm" placeholder="Ali">
                        </div>
                        <div>
                            <label class="flex items-center gap-2 text-[13px] font-medium text-gray-300 mb-2">Last Name</label>
                            <input type="text" name="last_name" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white outline-none focus:border-accent-teal focus:ring-1 focus:ring-accent-teal transition-all text-sm" placeholder="Mohammed">
                        </div>
                        <div>
                            <label class="flex items-center gap-2 text-[13px] font-medium text-gray-300 mb-2">Gender</label>
                            <select name="gender" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white outline-none focus:border-accent-teal focus:ring-1 focus:ring-accent-teal transition-all text-sm">
                                <option value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label class="flex items-center gap-2 text-[13px] font-medium text-gray-300 mb-2">Age (Years)</label>
                            <input type="number" name="age" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white outline-none focus:border-accent-teal focus:ring-1 focus:ring-accent-teal transition-all text-sm" placeholder="e.g., 25">
                        </div>
                    </div>
                </div>

                <div class="bg-white/[0.03] rounded-2xl border border-white/10 p-4 sm:p-6">
                    <h4 class="text-sm sm:text-base lg:text-lg font-bold text-accent-teal mb-4 sm:mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined text-2xl">science</span>
                        Liver Function Tests
                    </h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div><label class="block text-sm text-gray-300 mb-2">ALT (U/L)</label><input type="number" step="1" name="alamine_aminotransferase" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none transition-all"></div>
                        <div><label class="block text-sm text-gray-300 mb-2">AST (U/L)</label><input type="number" step="1" name="aspartate_aminotransferase" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none transition-all"></div>
                        <div><label class="block text-sm text-gray-300 mb-2">Total Bilirubin (mg/dL)</label><input type="number" step="0.1" name="total_bilirubin" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none transition-all"></div>
                        <div><label class="block text-sm text-gray-300 mb-2">Direct Bilirubin (mg/dL)</label><input type="number" step="0.1" name="direct_bilirubin" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none transition-all"></div>
                        <div><label class="block text-sm text-gray-300 mb-2">Alkaline Phosphotase (U/L)</label><input type="number" step="1" name="alkaline_phosphotase" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none transition-all"></div>
                        <div><label class="block text-sm text-gray-300 mb-2">Total Proteins (g/dL)</label><input type="number" step="0.1" name="total_protiens" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none transition-all"></div>
                        <div><label class="block text-sm text-gray-300 mb-2">Albumin (g/dL)</label><input type="number" step="0.1" name="albumin" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none transition-all"></div>
                        <div><label class="block text-sm text-gray-300 mb-2">Albumin/Globulin Ratio</label><input type="number" step="0.1" name="albumin_and_globulin_ratio" class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none transition-all"></div>
                    </div>
                </div>

                <button type="submit" class="w-full mt-6 py-4 bg-gradient-to-r bg-accent-teal text-black font-bold rounded-xl flex items-center justify-center gap-2 hover:brightness-110 transition-all">
                    <span class="material-symbols-outlined">analytics</span> Analyze with AI
                </button>
            </form>
        </div>

        <div class="glass-card p-4 sm:p-6 lg:p-8 rounded-2xl">
            <div class="flex items-center gap-3 mb-4 sm:mb-6">
                <div class="w-10 h-10 sm:w-12 sm:h-12 bg-accent-teal/20 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-accent-teal text-xl sm:text-2xl">info</span>
                </div>
                <h3 class="text-lg sm:text-xl lg:text-2xl font-display font-bold text-white">How to Interpret Results</h3>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
                <div class="space-y-3 p-4 rounded-xl bg-deep-navy/50 border border-transparent hover:border-green-500/40 transition-colors">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-green-500 text-sm">check</span>
                        </div>
                        <span class="font-bold text-white text-sm sm:text-base">Low Risk (0-30%)</span>
                    </div>
                    <p class="text-sm text-slate-400">Values within normal range. Regular monitoring recommended.</p>
                </div>
                <div class="space-y-3 p-4 rounded-xl bg-deep-navy/50 border border-transparent hover:border-yellow-500/40 transition-colors">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-yellow-500 text-sm">warning</span>
                        </div>
                        <span class="font-bold text-white text-sm sm:text-base">Moderate Risk (31-70%)</span>
                    </div>
                    <p class="text-sm text-slate-400">Further investigation advised. Consult healthcare professional.</p>
                </div>
                <div class="space-y-3 p-4 rounded-xl bg-deep-navy/50 border border-transparent hover:border-red-500/40 transition-colors">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-red-500 text-sm">error</span>
                        </div>
                        <span class="font-bold text-white text-sm sm:text-base">High Risk (71-100%)</span>
                    </div>
                    <p class="text-sm text-slate-400">Immediate medical attention recommended.</p>
                </div>
            </div>
            <div class="mt-8 p-4 bg-deep-navy/30 rounded-xl border border-white/10 text-center">
                <p class="text-sm text-slate-400">
                    <span class="text-accent-teal font-bold">Disclaimer:</span> This is a demonstration interface for educational purposes.
                    Real medical diagnosis requires comprehensive evaluation by qualified healthcare professionals.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Project Section -->
<section class="py-8 sm:py-12 px-4 sm:px-6 relative overflow-hidden" id="about">
    <div class="absolute top-20 left-[-10%] w-80 h-80 bg-accent-teal/5 blur-[100px] rounded-full -z-10"></div>
    <div class="absolute bottom-20 right-[-10%] w-96 h-96 bg-accent-blue/5 blur-[120px] rounded-full -z-10"></div>

    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-sm font-bold tracking-widest uppercase mb-4">
                <span class="material-symbols-outlined text-base">rocket_launch</span>
                About The Project
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-display font-bold text-white mb-4 sm:mb-6">
                Pioneering <span class="text-accent-teal">AI-Driven</span> Hepatology
            </h2>
            <p class="text-lg text-slate-400 max-w-3xl mx-auto leading-relaxed">
                LiverCare AI represents a groundbreaking initiative at the intersection of artificial intelligence
                and clinical hepatology, aiming to revolutionize early detection and management of liver conditions.
            </p>
        </div>

        <div class="space-y-12 mb-16 px-4 md:px-0 text-left mt-8">
            <div class="glass-card p-5 sm:p-8 lg:p-10 rounded-2xl neon-border">
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-12 h-12 bg-accent-teal/20 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-teal text-3xl">rocket_launch</span>
                    </div>
                    <h3 class="text-2xl font-display font-bold text-white text-left">Strategic Foundations</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-6 rounded-xl bg-deep-navy/50 border border-white/10 hover:border-accent-teal/30 transition-all">
                        <h4 class="text-xl font-bold text-white mb-3 flex items-center gap-2">
                            <span class="material-symbols-outlined text-accent-teal">visibility</span>
                            Project Vision
                        </h4>
                        <p class="text-sm text-slate-400 leading-relaxed text-left">
                            To create a world where liver disease is detected at its earliest stages,
                            enabling proactive intervention and significantly improving patient outcomes
                            through AI-powered predictive analytics.
                        </p>
                    </div>
                    <div class="p-6 rounded-xl bg-deep-navy/50 border border-accent-blue/20 hover:border-accent-blue/40 transition-all">
                        <h4 class="text-xl font-bold text-white mb-3 flex items-center gap-2 text-left">
                            <span class="material-symbols-outlined text-accent-blue">flag</span>
                            Our Mission
                        </h4>
                        <p class="text-sm text-slate-400 leading-relaxed text-left">
                            Develop and deploy accessible, accurate AI tools that empower regular users,
                            patients, and healthcare professionals to make data-driven decisions in liver health assessment.
                        </p>
                    </div>
                    <div class="p-6 rounded-xl bg-deep-navy/50 border border-white/10 hover:border-accent-teal/30 transition-all">
                        <h4 class="text-xl font-bold text-white mb-3 flex items-center gap-2 text-left">
                            <span class="material-symbols-outlined text-accent-teal">verified_user</span>
                            Core Values
                        </h4>
                        <p class="text-sm text-slate-400 leading-relaxed text-left">
                            We prioritize data privacy, ethical AI development, and medical transparency
                            to ensure our predictions serve as a reliable guide for all users.
                        </p>
                    </div>
                    <div class="p-6 rounded-xl bg-deep-navy/50 border border-accent-blue/20 hover:border-accent-blue/40 transition-all">
                        <h4 class="text-xl font-bold text-white mb-3 flex items-center gap-2 text-left">
                            <span class="material-symbols-outlined text-accent-blue">accessibility_new</span>
                            Global Accessibility
                        </h4>
                        <p class="text-sm text-slate-400 leading-relaxed text-left">
                            Making high-end medical technology available to everyone, regardless of location or economic background.
                        </p>
                    </div>
                </div>
            </div>

            <div class="glass-card p-5 sm:p-8 lg:p-10 rounded-2xl neon-border">
                <div class="flex items-center gap-3 mb-10 text-left">
                    <div class="w-12 h-12 bg-accent-blue/20 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-blue text-3xl">timeline</span>
                    </div>
                    <h3 class="text-2xl font-display font-bold text-white text-left">Execution Roadmap</h3>
                </div>
                <div class="relative space-y-8 before:absolute before:top-5 before:bottom-0 before:ml-5 before:w-0.5 before:-translate-x-px before:bg-gradient-to-b before:from-accent-teal/50 before:via-accent-blue/50 before:to-transparent">
                    <div class="relative pl-12 group">
                        <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-teal rounded-xl flex items-center justify-center group-hover:shadow-[0_0_15px_-3px_rgba(45,212,191,0.5)] transition-all z-10">
                            <span class="text-accent-teal font-bold text-sm">01</span>
                        </div>
                        <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-teal/50 group-hover:bg-deep-navy/50 transition-colors duration-300 shadow-lg">
                            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                                <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-teal/10 text-accent-teal border border-accent-teal/20 rounded-full font-bold">Concept</span>
                                <span class="text-xs font-mono px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-lg border border-accent-teal/20">October 2025</span>
                            </div>
                            <h5 class="text-lg font-bold text-white mb-2 text-glow text-left">Project Planning & Foundation</h5>
                            <p class="text-sm text-slate-400 leading-relaxed text-left">Selection of core project members, initial brainstorming meetings, and task distribution.</p>
                        </div>
                    </div>
                    <div class="relative pl-12 group">
                        <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-blue rounded-xl flex items-center justify-center group-hover:shadow-[0_0_15px_-3px_rgba(59,130,246,0.5)] transition-all z-10">
                            <span class="text-accent-blue font-bold text-sm">02</span>
                        </div>
                        <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-blue/50 group-hover:bg-deep-navy/50 transition-colors duration-300 shadow-lg">
                            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                                <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-blue/10 text-accent-blue border border-accent-blue/20 rounded-full font-bold">Research</span>
                                <span class="text-xs font-mono px-3 py-1 bg-accent-blue/10 text-accent-blue rounded-lg border border-accent-blue/20">November 2025</span>
                            </div>
                            <h5 class="text-lg font-bold text-white mb-2 text-glow text-left">Research & Collaborative Data Collection</h5>
                            <p class="text-sm text-slate-400 leading-relaxed text-left">Collaborative effort to conduct in-depth medical research. Compiled large datasets.</p>
                        </div>
                    </div>
                    <div class="relative pl-12 group">
                        <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-teal rounded-xl flex items-center justify-center group-hover:shadow-[0_0_15px_-3px_rgba(45,212,191,0.5)] transition-all z-10">
                            <span class="text-accent-teal font-bold text-sm">03</span>
                        </div>
                        <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-teal/50 group-hover:bg-deep-navy/50 transition-colors duration-300 shadow-lg">
                            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                                <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-teal/10 text-accent-teal border border-accent-teal/20 rounded-full font-bold">Design</span>
                                <span class="text-xs font-mono px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-lg border border-accent-teal/20">December 2025</span>
                            </div>
                            <h5 class="text-lg font-bold text-white mb-2 text-glow text-left">UI/UX Identity & Design</h5>
                            <p class="text-sm text-slate-400 leading-relaxed text-left">Crafting visual identity and user experience. Creating prototypes and ensuring intuitive navigation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Meet Our Team Section -->
<div class="max-w-7xl mx-auto mb-12">
    <div class="text-center mb-16">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-xs font-bold tracking-widest mb-4">
            <span class="material-symbols-outlined text-sm">group</span>
            Our experts
        </div>
        <h3 class="text-2xl sm:text-3xl md:text-5xl font-display font-bold text-white mb-4">Meet <span class="text-accent-teal">Our team!</span></h3>
        <p class="text-slate-400 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
            The multidisciplinary team behind LiverCare AI, combining expertise in medical research, software engineering, and artificial intelligence.
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 px-4 md:px-0">
        <div class="glass-card p-5 sm:p-8 rounded-2xl text-center group hover:border-accent-teal/50 transition-colors duration-300 shadow-xl">
            <div class="relative w-18 h-18 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-6">
                <div class="absolute inset-0 bg-accent-teal/20 rounded-full animate-pulse"></div>
                <div class="relative w-full h-full rounded-full bg-deep-navy border-2 border-accent-teal/50 flex items-center justify-center group-hover:border-accent-teal transition-colors">
                    <span class="material-symbols-outlined text-accent-teal text-4xl group-hover:scale-110 transition-transform">design_services</span>
                </div>
            </div>
            <h4 class="text-xl font-bold text-white mb-1 group-hover:text-accent-teal transition-colors">Ramadan Adham</h4>
            <p class="text-sm font-medium text-accent-teal/80 mb-4 tracking-tighter">UI/UX Designer</p>
            <p class="text-xs text-slate-400 mb-6 leading-relaxed">Crafting intuitive medical interfaces focused on accessibility and human-centric user experience.</p>
            <div class="flex justify-center gap-2 flex-wrap">
                <span class="text-[10px] px-3 py-1 bg-accent-teal/10 text-accent-teal border border-accent-teal/20 rounded-full font-bold">Figma</span>
                <span class="text-[10px] px-3 py-1 bg-white/5 text-slate-300 border border-white/10 rounded-full">Prototyping</span>
            </div>
        </div>

        <div class="glass-card p-5 sm:p-8 rounded-2xl text-center group hover:border-accent-teal/50 transition-colors duration-300 shadow-xl">
            <div class="relative w-18 h-18 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-6">
                <div class="absolute inset-0 bg-accent-blue/20 rounded-full animate-pulse"></div>
                <div class="relative w-full h-full rounded-full bg-deep-navy border-2 border-accent-blue/50 flex items-center justify-center group-hover:border-accent-blue transition-colors">
                    <span class="material-symbols-outlined text-accent-blue text-4xl group-hover:scale-110 transition-transform">code</span>
                </div>
            </div>
            <h4 class="text-xl font-bold text-white mb-1 group-hover:text-accent-blue transition-colors">Mustafa Hemeada</h4>
            <p class="text-sm font-medium text-accent-blue/80 mb-4 tracking-tighter">Frontend Developer</p>
            <p class="text-xs text-slate-400 mb-6 leading-relaxed">Converted the UI design into a fully functional frontend using HTML, CSS, JavaScript, and Tailwind CSS.</p>
            <div class="flex justify-center gap-2 flex-wrap">
                <span class="text-[10px] px-3 py-1 bg-accent-blue/10 text-accent-blue border border-accent-blue/20 rounded-full font-bold">HTML/CSS</span>
                <span class="text-[10px] px-3 py-1 bg-white/5 text-slate-300 border border-white/10 rounded-full">JavaScript</span>
                <span class="text-[10px] px-3 py-1 bg-white/5 text-slate-300 border border-white/10 rounded-full">Tailwind</span>
            </div>
        </div>

        <div class="glass-card p-5 sm:p-8 rounded-2xl text-center group hover:border-accent-teal/50 transition-colors duration-300 shadow-xl">
            <div class="relative w-18 h-18 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-6">
                <div class="absolute inset-0 bg-accent-teal/20 rounded-full animate-pulse"></div>
                <div class="relative w-full h-full rounded-full bg-deep-navy border-2 border-accent-teal/50 flex items-center justify-center group-hover:border-accent-teal transition-colors">
                    <span class="material-symbols-outlined text-accent-teal text-4xl group-hover:scale-110 transition-transform">component_exchange</span>
                </div>
            </div>
            <h4 class="text-xl font-bold text-white mb-1 group-hover:text-accent-teal transition-colors">Eman Elsaied</h4>
            <p class="text-sm font-medium text-accent-teal/80 mb-4 tracking-tighter">Frontend Developer</p>
            <p class="text-xs text-slate-400 mb-6 leading-relaxed">Migrated and restructured the entire project frontend into a modern React-based architecture.</p>
            <div class="flex justify-center gap-2 flex-wrap">
                <span class="text-[10px] px-3 py-1 bg-accent-teal/10 text-accent-teal border border-accent-teal/20 rounded-full font-bold">React</span>
                <span class="text-[10px] px-3 py-1 bg-white/5 text-slate-300 border border-white/10 rounded-full">Vite</span>
            </div>
        </div>

        <div class="glass-card p-5 sm:p-8 rounded-2xl text-center group hover:border-accent-teal/50 transition-colors duration-300 shadow-xl">
            <div class="relative w-18 h-18 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-6">
                <div class="absolute inset-0 bg-accent-blue/20 rounded-full animate-pulse"></div>
                <div class="relative w-full h-full rounded-full bg-deep-navy border-2 border-accent-blue/50 flex items-center justify-center group-hover:border-accent-blue transition-colors">
                    <span class="material-symbols-outlined text-accent-blue text-4xl group-hover:scale-110 transition-transform">settings_ethernet</span>
                </div>
            </div>
            <h4 class="text-xl font-bold text-white mb-1 group-hover:text-accent-blue transition-colors">Hussein Moamen</h4>
            <p class="text-sm font-medium text-accent-blue/80 mb-4 tracking-tighter">Backend Developer</p>
            <p class="text-xs text-slate-400 mb-6 leading-relaxed">Developing robust server-side logic and core API systems using PHP and the Laravel framework.</p>
            <div class="flex justify-center gap-2 flex-wrap">
                <span class="text-[10px] px-3 py-1 bg-accent-blue/10 text-accent-blue border border-accent-blue/20 rounded-full font-bold">PHP</span>
                <span class="text-[10px] px-3 py-1 bg-white/5 text-slate-300 border border-white/10 rounded-full">Laravel</span>
            </div>
        </div>

        <div class="glass-card p-5 sm:p-8 rounded-2xl text-center group hover:border-accent-teal/50 transition-colors duration-300 shadow-xl">
            <div class="relative w-18 h-18 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-6">
                <div class="absolute inset-0 bg-accent-teal/20 rounded-full animate-pulse"></div>
                <div class="relative w-full h-full rounded-full bg-deep-navy border-2 border-accent-teal/50 flex items-center justify-center group-hover:border-accent-teal transition-colors">
                    <span class="material-symbols-outlined text-accent-teal text-4xl group-hover:scale-110 transition-transform">database</span>
                </div>
            </div>
            <h4 class="text-xl font-bold text-white mb-1 group-hover:text-accent-teal transition-colors">Hossam Amer</h4>
            <p class="text-sm font-medium text-accent-teal/80 mb-4 tracking-tighter">Backend & DB Specialist</p>
            <p class="text-xs text-slate-400 mb-6 leading-relaxed">Designed the ERD and built the complete database architecture using MySQL for secure data management.</p>
            <div class="flex justify-center gap-2 flex-wrap">
                <span class="text-[10px] px-3 py-1 bg-accent-teal/10 text-accent-teal border border-accent-teal/20 rounded-full font-bold">MySQL</span>
                <span class="text-[10px] px-3 py-1 bg-white/5 text-slate-300 border border-white/10 rounded-full">ERD</span>
            </div>
        </div>

        <div class="glass-card p-5 sm:p-8 rounded-2xl text-center group hover:border-accent-teal/50 transition-colors duration-300 shadow-xl">
            <div class="relative w-18 h-18 sm:w-24 sm:h-24 mx-auto mb-4 sm:mb-6">
                <div class="absolute inset-0 bg-accent-blue/20 rounded-full animate-pulse"></div>
                <div class="relative w-full h-full rounded-full bg-deep-navy border-2 border-accent-blue/50 flex items-center justify-center group-hover:border-accent-blue transition-colors">
                    <span class="material-symbols-outlined text-accent-blue text-4xl group-hover:scale-110 transition-transform">psychology</span>
                </div>
            </div>
            <h4 class="text-xl font-bold text-white mb-1 group-hover:text-accent-blue transition-colors">Ahmed Abouzaid</h4>
            <p class="text-sm font-medium text-accent-blue/80 mb-4 tracking-tighter">AI Researcher & Engineer</p>
            <p class="text-xs text-slate-400 mb-6 leading-relaxed">Lead architect behind the liver disease predictive AI model and hyperparameters fine-tuning.</p>
            <div class="flex justify-center gap-2 flex-wrap">
                <span class="text-[10px] px-3 py-1 bg-accent-blue/10 text-accent-blue border border-accent-blue/20 rounded-full font-bold">AI/ML</span>
                <span class="text-[10px] px-3 py-1 bg-white/5 text-slate-300 border border-white/10 rounded-full">Python</span>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<section class="pt-8 sm:pt-12 pb-0 px-4 sm:px-6 relative overflow-hidden" id="contact">
    <div class="absolute top-0 left-0 w-64 h-64 bg-accent-teal/10 blur-[100px] rounded-full -z-10"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-accent-blue/10 blur-[100px] rounded-full -z-10"></div>

    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-sm font-bold tracking-widest uppercase mb-4">
                <span class="material-symbols-outlined text-base">mail</span>
                Get In Touch
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-display font-bold text-white mb-4 sm:mb-6">Contact <span class="text-accent-teal">Us</span></h2>
            <p class="text-[15px] text-slate-400 max-w-4xl mx-auto">Have questions? We're here to help you navigate through your liver health journey.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch mb-8">
            <div class="glass-card p-5 sm:p-6 lg:p-8 rounded-3xl neon-border relative group flex flex-col h-full">
                <div class="absolute -top-6 -left-6 w-20 h-20 bg-accent-teal/10 blur-2xl rounded-full group-hover:bg-accent-teal/20 transition-all"></div>
                <h3 class="text-2xl font-display font-bold text-white mb-8 flex items-center gap-3">
                    <span class="material-symbols-outlined text-accent-teal">send_money</span>
                    Send Us a Message
                </h3>

                <form id="contactForm" method="POST" action="{{ route('contact.store') }}" class="space-y-5 flex-1 flex flex-col">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-gray-400 tracking-wider ml-1">Full Name</label>
                            <input type="text" name="name" placeholder="Ali Mohammed" required
                                class="w-full bg-deep-navy/70 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-accent-teal focus:ring-1 focus:ring-accent-teal outline-none transition-all text-sm placeholder:text-gray-600 shadow-inner">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-xs font-bold text-gray-400 tracking-wider ml-1">Email Address</label>
                            <input type="email" name="email" placeholder="ali@example.com" required
                                class="w-full bg-deep-navy/70 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-accent-teal focus:ring-1 focus:ring-accent-teal outline-none transition-all text-sm placeholder:text-gray-600 shadow-inner">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-400 tracking-wider ml-1">Subject</label>
                        <select name="subject" class="w-full bg-deep-navy/70 border border-white/10 rounded-2xl px-5 py-4 text-white text-sm focus:border-accent-teal focus:ring-1 focus:ring-accent-teal outline-none transition-all">
                            <option value="General Inquiry">General Inquiry</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Research Collaboration">Research Collaboration</option>
                            <option value="System Integration">System Integration</option>
                            <option value="Partnership Inquiry">Partnership Inquiry</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-400 tracking-wider ml-1">Message</label>
                        <textarea name="message" rows="4" placeholder="Tell us how we can help..." required
                            class="w-full bg-deep-navy/70 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-accent-teal focus:ring-1 focus:ring-accent-teal outline-none transition-all text-sm placeholder:text-gray-600 shadow-inner resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 mt-auto bg-accent-teal text-deep-navy font-bold rounded-2xl hover:bg-opacity-90 transition-all neon-border flex items-center justify-center gap-3 active:scale-95 shadow-lg shadow-accent-teal/20">
                        <span class="material-symbols-outlined">send</span> Send Message
                    </button>
                </form>
            </div>

            <div class="glass-card p-5 sm:p-6 lg:p-8 rounded-3xl neon-border border-accent-blue/30 relative flex flex-col h-full overflow-hidden">
                <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-accent-blue/10 blur-2xl rounded-full group-hover:bg-accent-blue/20 transition-all"></div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 bg-white/5 rounded-xl border border-white/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-blue text-2xl">description</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white leading-none mb-1">Contact Information</h3>
                        <p class="text-xs text-gray-400">Multiple ways to reach us</p>
                    </div>
                </div>

                <div class="space-y-5 flex-1 flex flex-col justify-center">
                    <a href="mailto:contact@livercare-ai.com" class="bg-white/5 border border-white/5 p-5 rounded-2xl flex items-start gap-4 hover:border-accent-teal/50 hover:bg-white/[0.07] transition-all group/item">
                        <div class="w-12 h-12 bg-accent-teal/10 rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-accent-teal text-2xl">mail</span>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-white font-bold text-lg">Email</h4>
                            <p class="text-xs text-gray-400">For general inquiries and support</p>
                            <p class="text-accent-teal font-medium text-sm pt-1">contact@livercare-ai.com</p>
                        </div>
                    </a>

                    <a href="tel:+11234567890" class="bg-white/5 border border-white/5 p-5 rounded-2xl flex items-start gap-4 hover:border-accent-blue/50 hover:bg-white/[0.07] transition-all group/item">
                        <div class="w-12 h-12 bg-accent-blue/10 rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-accent-blue text-2xl">call</span>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-white font-bold text-lg">Phone</h4>
                            <p class="text-[11px] text-gray-400 leading-tight mb-1">Available Monday-Friday, 9 AM - 5 PM EST</p>
                            <p class="text-accent-blue font-medium text-sm">+1 (123) 456-7890</p>
                        </div>
                    </a>
                </div>

                <div class="mt-6 p-5 bg-white/[0.02] border border-accent-teal/20 rounded-2xl relative overflow-hidden hover:border-accent-teal transition-colors group/item">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <span class="material-symbols-outlined text-accent-teal text-4xl">schedule</span>
                    </div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-10 h-10 bg-accent-teal/10 rounded-lg flex items-center justify-center border border-accent-teal/20">
                            <span class="material-symbols-outlined text-accent-teal text-xl">timer</span>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">Response Time</h4>
                            <p class="text-[11px] text-gray-400">We value your time</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-gray-300">General Inquiries</span>
                            <span class="text-green-500 font-bold">Within 24 hours</span>
                        </div>
                        <div class="flex justify-between items-center text-xs">
                            <span class="text-gray-300">Technical Support</span>
                            <span class="text-amber-500 font-bold">Within 48 hours</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="text-center relative pt-12 pb-0">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent h-px top-0"></div>
            <div class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-xs font-black tracking-[0.2em] uppercase mb-6 mx-auto">
                <span class="material-symbols-outlined text-base">forum</span>
                Common Questions
            </div>
            <h3 class="text-2xl sm:text-3xl md:text-5xl font-display font-bold text-white mb-4 tracking-tight">
                Frequently Asked <span class="text-accent-teal">Questions</span>
            </h3>
            <p class="text-slate-400 max-w-2xl mx-auto text-sm md:text-base mb-12">Find quick answers to the most common questions about our platform and AI engine.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 items-start relative z-10 text-left">
                <!-- FAQ 1 -->
                <div class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                    <button onclick="toggleAccordion(this)" class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                        <span class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">How does AI help in early liver disease detection?</span>
                        <span class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                            The system analyzes laboratory test results with extreme precision and compares them with thousands of previous cases, helping to monitor biomarkers that may indicate liver dysfunction before clear clinical symptoms appear.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                    <button onclick="toggleAccordion(this)" class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                        <span class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">What medical tests are required for an accurate prediction?</span>
                        <span class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                            The system requires entering basic liver function results such as (ALT, AST, Bilirubin, Albumin) in addition to platelet count and age, to ensure a comprehensive and accurate risk analysis.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                    <button onclick="toggleAccordion(this)" class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                        <span class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">Can I rely on the website results as a final diagnosis?</span>
                        <span class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                            No, the system's results are a probabilistic assessment based on the entered data and provide risk indicators. Results should always be presented to a specialist physician for final diagnosis and treatment decisions.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                    <button onclick="toggleAccordion(this)" class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                        <span class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">How is the privacy of my health data protected?</span>
                        <span class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                            We apply the highest standards of encryption and security to protect your data. Data is processed anonymously and no personal information is shared with third parties, in line with international medical data protection standards.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                    <button onclick="toggleAccordion(this)" class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                        <span class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">In which cases should I see a doctor immediately?</span>
                        <span class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                            If the system shows high risk for any liver disease, or if you feel symptoms such as jaundice (yellowing of eyes and skin) or severe abdominal pain, we advise seeing a specialist immediately for a clinical examination.
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                    <button onclick="toggleAccordion(this)" class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                        <span class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">Does the system support prediction for specific hepatitis viruses?</span>
                        <span class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                            Yes, our model is trained to detect indicators associated with Hepatitis B and C, as well as Liver Cirrhosis, based on patterns found in patients' laboratory analyzes.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Accordion toggle function with arrow rotation
    function toggleAccordion(button) {
        const item = button.closest('.accordion-item');
        const isOpen = item.classList.contains('active');
        
        // Close all other accordion items
        document.querySelectorAll('.accordion-item').forEach(accordion => {
            accordion.classList.remove('active');
        });
        
        // If it wasn't open, open this one
        if (!isOpen) {
            item.classList.add('active');
        }
    }
</script>
@endpush

@push('styles')
<style>
    /* Accordion arrow rotation */
    .accordion-item .accordion-icon {
        transition: transform 0.3s ease;
    }
    .accordion-item.active .accordion-icon {
        transform: rotate(180deg);
    }
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s cubic-bezier(0.33, 1, 0.68, 1);
    }
    .accordion-item.active .accordion-content {
        max-height: 500px;
    }
</style>
@endpush