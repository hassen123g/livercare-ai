@extends('layouts.app')

@section('title', 'Contact Us - LiverCare AI')

@section('content')
    <div class="py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-sm font-bold tracking-widest uppercase mb-4">
                    <span class="material-symbols-outlined text-base">mail</span>
                    Get In Touch
                </div>
                <h2 class="text-3xl md:text-5xl font-display font-bold text-white mb-6">Contact <span
                        class="text-accent-teal">Us</span></h2>
                <p class="text-lg text-slate-400 max-w-3xl mx-auto">Have questions? We're here to help you navigate through
                    your liver health journey.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="glass-card p-8 rounded-3xl neon-border">
                    <h3 class="text-2xl font-display font-bold text-white mb-8 flex items-center gap-3">
                        <span class="material-symbols-outlined text-accent-teal">send</span>
                        Send Us a Message
                    </h3>

                    @if(session('success'))
                        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl">
                            <p class="text-emerald-400 text-sm">{{ session('success') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Full Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="w-full bg-deep-navy/70 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-accent-teal focus:outline-none transition-all text-sm placeholder:text-gray-600">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Email
                                    Address</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="w-full bg-deep-navy/70 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-accent-teal focus:outline-none transition-all text-sm placeholder:text-gray-600">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Subject</label>
                            <select name="subject"
                                class="w-full bg-deep-navy/70 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-accent-teal focus:outline-none transition-all text-sm">
                                <option value="general">General Inquiry</option>
                                <option value="support">Technical Support</option>
                                <option value="research">Research Collaboration</option>
                                <option value="partnership">Partnership Inquiry</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Message</label>
                            <textarea name="message" rows="5" required
                                class="w-full bg-deep-navy/70 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-accent-teal focus:outline-none transition-all text-sm placeholder:text-gray-600 resize-none"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-accent-teal text-black font-bold rounded-2xl hover:bg-gray-50 hover:shadow-lg transition-all flex items-center justify-between gap-3 px-6">
                            <span>Send Message</span>
                            <span class="material-symbols-outlined text-black">arrow_forward</span>
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="glass-card p-8 rounded-3xl neon-border border-accent-blue/30">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-12 h-12 bg-white/5 rounded-xl border border-white/10 flex items-center justify-center">
                            <span class="material-symbols-outlined text-accent-blue text-2xl">description</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Contact Information</h3>
                            <p class="text-xs text-gray-400">Multiple ways to reach us</p>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <a href="mailto:contact@livercare-ai.com"
                            class="bg-white/5 border border-white/5 p-5 rounded-2xl flex items-start gap-4 hover:border-accent-teal/50 transition-all">
                            <div class="w-12 h-12 bg-accent-teal/10 rounded-xl flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-accent-teal text-2xl">mail</span>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Email</h4>
                                <p class="text-xs text-gray-400">For general inquiries and support</p>
                                <p class="text-accent-teal font-medium text-sm pt-1">contact@livercare-ai.com</p>
                            </div>
                        </a>

                        <a href="tel:+11234567890"
                            class="bg-white/5 border border-white/5 p-5 rounded-2xl flex items-start gap-4 hover:border-accent-blue/50 transition-all">
                            <div class="w-12 h-12 bg-accent-blue/10 rounded-xl flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-accent-blue text-2xl">call</span>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Phone</h4>
                                <p class="text-[11px] text-gray-400">Monday-Friday, 9 AM - 5 PM EST</p>
                                <p class="text-accent-blue font-medium text-sm">+1 (123) 456-7890</p>
                            </div>
                        </a>
                    </div>

                    <div class="mt-6 p-5 bg-white/[0.02] border border-accent-teal/20 rounded-2xl">
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="w-10 h-10 bg-accent-teal/10 rounded-lg flex items-center justify-center border border-accent-teal/20">
                                <span class="material-symbols-outlined text-accent-teal text-xl">timer</span>
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-sm">Response Time</h4>
                                <p class="text-[11px] text-gray-400">We value your time</p>
                            </div>
                        </div>
                        <div class="space-y-3">
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
                <div
                    class="inline-flex items-center gap-3 px-5 py-2.5 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-xs font-black tracking-[0.2em] uppercase mb-6 mx-auto">
                    <span class="material-symbols-outlined text-base">forum</span>
                    Common Questions
                </div>
                <h3 class="text-2xl sm:text-3xl md:text-5xl font-display font-bold text-white mb-4 tracking-tight">
                    Frequently Asked <span class="text-accent-teal">Questions</span>
                </h3>
                <p class="text-slate-400 max-w-2xl mx-auto text-sm md:text-base mb-12">Find quick answers to the most common
                    questions about our platform and AI engine.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 items-start relative z-10 text-left">
                    <!-- FAQ 1 -->
                    <div
                        class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                        <button onclick="toggleAccordion(this)"
                            class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                            <span
                                class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">How
                                does AI help in early liver disease detection?</span>
                            <span
                                class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div
                                class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                                The system analyzes laboratory test results with extreme precision and compares them with
                                thousands of previous cases, helping to monitor biomarkers that may indicate liver
                                dysfunction before clear clinical symptoms appear.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div
                        class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                        <button onclick="toggleAccordion(this)"
                            class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                            <span
                                class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">What
                                medical tests are required for an accurate prediction?</span>
                            <span
                                class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div
                                class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                                The system requires entering basic liver function results such as (ALT, AST, Bilirubin,
                                Albumin) in addition to platelet count and age, to ensure a comprehensive and accurate risk
                                analysis.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div
                        class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                        <button onclick="toggleAccordion(this)"
                            class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                            <span
                                class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">Can
                                I rely on the website results as a final diagnosis?</span>
                            <span
                                class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div
                                class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                                No, the system's results are a probabilistic assessment based on the entered data and
                                provide risk indicators. Results should always be presented to a specialist physician for
                                final diagnosis and treatment decisions.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div
                        class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                        <button onclick="toggleAccordion(this)"
                            class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                            <span
                                class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">How
                                is the privacy of my health data protected?</span>
                            <span
                                class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div
                                class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                                We apply the highest standards of encryption and security to protect your data. Data is
                                processed anonymously and no personal information is shared with third parties, in line with
                                international medical data protection standards.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div
                        class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                        <button onclick="toggleAccordion(this)"
                            class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                            <span
                                class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">In
                                which cases should I see a doctor immediately?</span>
                            <span
                                class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div
                                class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                                If the system shows high risk for any liver disease, or if you feel symptoms such as
                                jaundice (yellowing of eyes and skin) or severe abdominal pain, we advise seeing a
                                specialist immediately for a clinical examination.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div
                        class="accordion-item glass-card rounded-2xl border border-white/5 overflow-hidden transition-all duration-300 hover:border-accent-teal/30">
                        <button onclick="toggleAccordion(this)"
                            class="w-full p-6 text-left flex items-center justify-between gap-4 group/btn">
                            <span
                                class="text-sm md:text-base font-bold text-white group-hover/btn:text-accent-teal transition-colors tracking-tight">Does
                                the system support prediction for specific hepatitis viruses?</span>
                            <span
                                class="accordion-icon material-symbols-outlined text-accent-teal transition-transform duration-300">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div
                                class="px-6 pb-6 text-slate-400 text-xs md:text-sm leading-relaxed text-left border-t border-white/5 pt-4">
                                Yes, our model is trained to detect indicators associated with Hepatitis B and C, as well as
                                Liver Cirrhosis, based on patterns found in patients' laboratory analyzes.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleAccordion(btn) {
            const accordionItem = btn.closest('.accordion-item');
            const content = accordionItem.querySelector('.accordion-content');
            const icon = btn.querySelector('.accordion-icon');

            // Toggle the 'open' class on the accordion item
            const isOpen = accordionItem.classList.contains('open');

            if (isOpen) {
                // Close
                accordionItem.classList.remove('open');
                content.style.maxHeight = null;
                icon.style.transform = 'rotate(0deg)';
            } else {
                // Open
                accordionItem.classList.add('open');
                // Set max-height for smooth transition
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Initialize all accordion items: ensure they start closed and set up transition
        document.addEventListener('DOMContentLoaded', function () {
            const accordionItems = document.querySelectorAll('.accordion-item');
            accordionItems.forEach(item => {
                const content = item.querySelector('.accordion-content');
                const icon = item.querySelector('.accordion-icon');
                // Start closed
                item.classList.remove('open');
                content.style.maxHeight = null;
                if (icon) icon.style.transform = 'rotate(0deg)';
                // Enable transition on content
                content.style.transition = 'max-height 0.3s ease-out';
                content.style.overflow = 'hidden';
            });
        });
    </script>

    <style>
        /* Ensures the content area is hidden when closed */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .accordion-item.open .accordion-content {
            max-height: 500px;
            /* sufficiently large for the tallest answer */
        }

        /* Optional: smooth hover / focus states */
        .accordion-item button:focus {
            outline: none;
        }
    </style>
@endpush