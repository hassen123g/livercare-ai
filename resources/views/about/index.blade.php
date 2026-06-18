@extends('layouts.app')

@section('title', 'About Project - LiverCare AI')

@section('content')
<div class="py-16 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-sm font-bold tracking-widest uppercase mb-4">
                <span class="material-symbols-outlined text-base">rocket_launch</span>
                About The Project
            </div>
            <h2 class="text-3xl md:text-5xl font-display font-bold text-white mb-6">Pioneering <span class="text-accent-teal">AI-Driven</span> Hepatology</h2>
            <p class="text-lg text-slate-400 max-w-3xl mx-auto">LiverCare AI represents a groundbreaking initiative at the intersection of artificial intelligence and clinical hepatology, aiming to revolutionize early detection and management of liver conditions.</p>
        </div>

        <!-- Strategic Foundations -->
        <div class="glass-card p-8 lg:p-10 rounded-2xl neon-border mb-12">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-12 h-12 bg-accent-teal/20 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-accent-teal text-3xl">rocket_launch</span>
                </div>
                <h3 class="text-2xl font-display font-bold text-white">Strategic Foundations</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="p-6 rounded-xl bg-deep-navy/50 border border-white/10 hover:border-accent-teal/30 transition-all">
                    <h4 class="text-xl font-bold text-white mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-accent-teal">visibility</span>
                        Project Vision
                    </h4>
                    <p class="text-sm text-slate-400 leading-relaxed">To create a world where liver disease is detected at its earliest stages, enabling proactive intervention and significantly improving patient outcomes through AI-powered predictive analytics.</p>
                </div>
                <div class="p-6 rounded-xl bg-deep-navy/50 border border-accent-blue/20 hover:border-accent-blue/40 transition-all">
                    <h4 class="text-xl font-bold text-white mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-accent-blue">flag</span>
                        Our Mission
                    </h4>
                    <p class="text-sm text-slate-400 leading-relaxed">Develop and deploy accessible, accurate AI tools that empower regular users, patients, and healthcare professionals to make data-driven decisions in liver health assessment.</p>
                </div>
                <div class="p-6 rounded-xl bg-deep-navy/50 border border-white/10 hover:border-accent-teal/30 transition-all">
                    <h4 class="text-xl font-bold text-white mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-accent-teal">verified_user</span>
                        Core Values
                    </h4>
                    <p class="text-sm text-slate-400 leading-relaxed">We prioritize data privacy, ethical AI development, and medical transparency to ensure our predictions serve as a reliable guide for all users.</p>
                </div>
                <div class="p-6 rounded-xl bg-deep-navy/50 border border-accent-blue/20 hover:border-accent-blue/40 transition-all">
                    <h4 class="text-xl font-bold text-white mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-accent-blue">accessibility_new</span>
                        Global Accessibility
                    </h4>
                    <p class="text-sm text-slate-400 leading-relaxed">Making high-end medical technology available to everyone, regardless of location or economic background. Early risk indicators should be a universal right.</p>
                </div>
            </div>
        </div>

        <!-- Execution Roadmap Timeline -->
        <div class="glass-card p-8 lg:p-10 rounded-2xl neon-border">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-12 h-12 bg-accent-blue/20 rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-accent-blue text-3xl">timeline</span>
                </div>
                <h3 class="text-2xl font-display font-bold text-white">Execution Roadmap</h3>
            </div>

            <div class="relative space-y-8 before:absolute before:top-5 before:bottom-0 before:ml-5 before:w-0.5 before:bg-gradient-to-b before:from-accent-teal/50 before:via-accent-blue/50 before:to-transparent">
                <div class="relative pl-12 group">
                    <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-teal rounded-xl flex items-center justify-center z-10">
                        <span class="text-accent-teal font-bold text-sm">01</span>
                    </div>
                    <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-teal/50 transition-all">
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full font-bold">Concept</span>
                            <span class="text-xs bg-accent-teal/10 text-accent-teal rounded-lg px-3 py-1">October 2025</span>
                        </div>
                        <h5 class="text-lg font-bold text-white mb-2">Project Planning & Foundation</h5>
                        <p class="text-sm text-slate-400">Selection of core project members, initial brainstorming meetings, and task distribution. Clarified project vision and selected research topic.</p>
                    </div>
                </div>

                <div class="relative pl-12 group">
                    <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-blue rounded-xl flex items-center justify-center z-10">
                        <span class="text-accent-blue font-bold text-sm">02</span>
                    </div>
                    <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-blue/50 transition-all">
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-blue/10 text-accent-blue rounded-full font-bold">Research</span>
                            <span class="text-xs bg-accent-blue/10 text-accent-blue rounded-lg px-3 py-1">November 2025</span>
                        </div>
                        <h5 class="text-lg font-bold text-white mb-2">Research & Collaborative Data Collection</h5>
                        <p class="text-sm text-slate-400">Collaborative effort to conduct in-depth medical research. Compiled large datasets of liver function tests from verified sources.</p>
                    </div>
                </div>

                <div class="relative pl-12 group">
                    <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-teal rounded-xl flex items-center justify-center z-10">
                        <span class="text-accent-teal font-bold text-sm">03</span>
                    </div>
                    <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-teal/50 transition-all">
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full font-bold">Design</span>
                            <span class="text-xs bg-accent-teal/10 text-accent-teal rounded-lg px-3 py-1">December 2025</span>
                        </div>
                        <h5 class="text-lg font-bold text-white mb-2">UI/UX Identity & Design</h5>
                        <p class="text-sm text-slate-400">Crafting visual identity and user experience. Creating prototypes and ensuring intuitive navigation for all users.</p>
                    </div>
                </div>

                <div class="relative pl-12 group">
                    <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-blue rounded-xl flex items-center justify-center z-10">
                        <span class="text-accent-blue font-bold text-sm">04</span>
                    </div>
                    <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-blue/50 transition-all">
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-blue/10 text-accent-blue rounded-full font-bold">Frontend</span>
                            <span class="text-xs bg-accent-blue/10 text-accent-blue rounded-lg px-3 py-1">January 2026</span>
                        </div>
                        <h5 class="text-lg font-bold text-white mb-2">Frontend System Implementation</h5>
                        <p class="text-sm text-slate-400">Implementing responsive user interface, real-time dashboard elements, and interactive forms with focus on performance.</p>
                    </div>
                </div>

                <div class="relative pl-12 group">
                    <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-teal rounded-xl flex items-center justify-center z-10">
                        <span class="text-accent-teal font-bold text-sm">05</span>
                    </div>
                    <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-teal/50 transition-all">
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full font-bold">Backend</span>
                            <span class="text-xs bg-accent-teal/10 text-accent-teal rounded-lg px-3 py-1">February 2026</span>
                        </div>
                        <h5 class="text-lg font-bold text-white mb-2">Backend Architecture & Secure Database</h5>
                        <p class="text-sm text-slate-400">Developing server-side logic and core API systems. Integrating secure MySQL database and establishing communication bridge.</p>
                    </div>
                </div>

                <div class="relative pl-12 group">
                    <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-blue rounded-xl flex items-center justify-center z-10">
                        <span class="text-accent-blue font-bold text-sm">06</span>
                    </div>
                    <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-blue/50 transition-all">
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-blue/10 text-accent-blue rounded-full font-bold">AI Integration</span>
                            <span class="text-xs bg-accent-blue/10 text-accent-blue rounded-lg px-3 py-1">March 2026</span>
                        </div>
                        <h5 class="text-lg font-bold text-white mb-2">AI Engine Integration & Model Training</h5>
                        <p class="text-sm text-slate-400">Integrating the predictive AI model. Fine-tuning hyperparameters and linking the engine to provide instant assessments.</p>
                    </div>
                </div>

                <div class="relative pl-12 group">
                    <div class="absolute left-0 top-1 w-10 h-10 bg-deep-navy border-2 border-accent-teal rounded-xl flex items-center justify-center z-10">
                        <span class="text-accent-teal font-bold text-sm">07</span>
                    </div>
                    <div class="bg-deep-navy/30 p-6 rounded-xl border border-white/5 group-hover:border-accent-teal/50 transition-all">
                        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 bg-accent-teal/10 text-accent-teal rounded-full font-bold">QA & Optimization</span>
                            <span class="text-xs bg-accent-teal/10 text-accent-teal rounded-lg px-3 py-1">April 2026 - Present</span>
                        </div>
                        <h5 class="text-lg font-bold text-white mb-2">Final Review & Platform Optimization</h5>
                        <p class="text-sm text-slate-400">Continuous testing and feedback collection. Rigorous QA, bug fixing, and optimization for the highest medical standards.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection