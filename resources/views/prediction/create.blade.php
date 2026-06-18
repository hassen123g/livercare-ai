@extends('layouts.app')

@section('title', 'AI-Powered Liver Disease Prediction')

@section('content')
    <div class="py-8 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-12">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent-teal/10 border border-accent-teal/20 text-accent-teal text-sm font-bold tracking-widest uppercase mb-4">
                    <span class="material-symbols-outlined text-base">experiment</span>
                    Live AI Prediction
                </div>

                <h1 class="text-3xl md:text-5xl font-display font-bold text-white mb-6">
                    Try The <span class="text-accent-teal">AI Model</span>
                </h1>

                <p class="text-lg text-slate-400 max-w-3xl mx-auto">
                    Enter laboratory values to receive AI-powered risk assessment for liver diseases.
                </p>
            </div>

            <!-- Main Card -->
            <div class="glass-card p-6 rounded-2xl neon-border">

                <!-- Top -->
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 bg-accent-teal/20 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-accent-teal text-2xl">
                            auto_awesome
                        </span>
                    </div>

                    <h2 class="text-2xl font-display font-bold text-white">
                        AI-Powered Liver Disease Prediction
                    </h2>
                </div>

                <!-- Patient Data (shared across tabs) -->
                <div class="bg-white/[0.03] rounded-2xl border border-white/10 p-6 mb-6">

                    <h3 class="text-lg font-bold text-accent-teal mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">person</span>
                        Patient Data
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">First Name</label>
                            <input type="text" id="first_name"
                                class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Last Name</label>
                            <input type="text" id="last_name"
                                class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Gender</label>
                            <select id="gender"
                                class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Age</label>
                            <input type="number" id="age"
                                class="w-full bg-deep-navy/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-accent-teal focus:outline-none">
                        </div>

                    </div>
                </div>

                <!-- Tabs -->
                <div class="glass-card rounded-2xl border border-white/10 bg-gray-900/70 mb-6">

                    <div class="grid grid-cols-1 sm:grid-cols-3 divide-y sm:divide-y-0 sm:divide-x divide-white/10">

                        <button type="button"
                            class="prediction-tab active flex items-center gap-3 px-5 py-4 text-left hover:bg-white/5 transition"
                            data-tab="report">

                            <span class="material-symbols-outlined text-accent-teal text-2xl">
                                upload_file
                            </span>

                            <div>
                                <div class="font-medium text-white">Upload Report</div>
                                <div class="text-xs text-gray-400">Attach lab report document</div>
                            </div>
                        </button>

                        <button type="button"
                            class="prediction-tab flex items-center gap-3 px-5 py-4 text-left hover:bg-white/5 transition"
                            data-tab="manual">

                            <span class="material-symbols-outlined text-accent-teal text-2xl">
                                auto_graph
                            </span>

                            <div>
                                <div class="font-medium text-white">Manual Entry</div>
                                <div class="text-xs text-gray-400">Enter lab results manually</div>
                            </div>
                        </button>

                        <button type="button"
                            class="prediction-tab flex items-center gap-3 px-5 py-4 text-left hover:bg-white/5 transition"
                            data-tab="image">

                            <span class="material-symbols-outlined text-accent-teal text-2xl">
                                image
                            </span>

                            <div>
                                <div class="font-medium text-white">Upload Image</div>
                                <div class="text-xs text-gray-400">Upload liver scan or ultrasound</div>
                            </div>
                        </button>

                    </div>
                </div>

                <!-- ===================== REPORT TAB ===================== -->
                <div id="tabReport" class="tab-content">

                    <form id="reportForm" method="POST" enctype="multipart/form-data" action="{{ route('prediction.store') }}">
                        @csrf
                        <input type="hidden" name="prediction_type" value="report">

                        <!-- Hidden patient fields (populated from shared inputs) -->
                        <input type="hidden" name="patient_name" id="report_patient_name">
                        <input type="hidden" name="age" id="report_age">
                        <input type="hidden" name="gender" id="report_gender">

                        <!-- Hidden lab value fields with sensible defaults for file-only submissions -->
                        <input type="hidden" name="total_bilirubin" value="1.0">
                        <input type="hidden" name="direct_bilirubin" value="0.3">
                        <input type="hidden" name="alkaline_phosphotase" value="80">
                        <input type="hidden" name="alamine_aminotransferase" value="25">
                        <input type="hidden" name="aspartate_aminotransferase" value="25">
                        <input type="hidden" name="total_protiens" value="7.0">
                        <input type="hidden" name="albumin" value="4.0">
                        <input type="hidden" name="albumin_and_globulin_ratio" value="1.5">

                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                            <!-- Upload -->
                            <div class="lg:col-span-7">
                                <div class="glass-card p-7 rounded-2xl neon-border bg-gradient-to-br from-accent-teal/10 via-deep-navy to-deep-navy">

                                    <div class="flex items-center gap-3 mb-6">
                                        <div class="w-12 h-12 bg-accent-teal/25 rounded-xl flex items-center justify-center">
                                            <span class="material-symbols-outlined text-accent-teal text-2xl">upload_file</span>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-white">Upload Lab Report</h3>
                                            <p class="text-sm text-gray-300">Upload PDF or image report</p>
                                        </div>
                                    </div>

                                    <!-- Upload Box -->
                                    <label for="reportInput"
                                        class="group flex flex-col items-center justify-center gap-4 border-2 border-dashed border-accent-teal/50 rounded-2xl p-8 bg-deep-navy/70 hover:bg-deep-navy/80 transition cursor-pointer min-h-[300px]">

                                        <!-- Placeholder -->
                                        <div id="reportPlaceholder" class="text-center">
                                            <div class="w-14 h-14 rounded-full bg-accent-teal/20 flex items-center justify-center mx-auto mb-4">
                                                <span class="material-symbols-outlined text-accent-teal text-3xl">cloud_upload</span>
                                            </div>
                                            <p class="text-white font-medium">
                                                Drop report here or <span class="text-accent-teal">browse files</span>
                                            </p>
                                            <p class="text-xs text-gray-400 mt-1">PDF, JPG, PNG</p>
                                        </div>

                                        <!-- Preview -->
                                        <div id="reportPreview"
                                            class="hidden w-full text-left p-4 bg-deep-navy/50 rounded-xl border border-accent-teal/30">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center gap-3">
                                                    <span class="material-symbols-outlined text-accent-teal text-3xl">description</span>
                                                    <div>
                                                        <h4 id="reportPreviewName" class="font-medium text-white text-sm"></h4>
                                                        <p id="reportPreviewSize" class="text-xs text-gray-400"></p>
                                                    </div>
                                                </div>
                                                <button type="button" id="removeReportBtn" class="text-red-400 hover:text-red-300">
                                                    <span class="material-symbols-outlined">delete</span>
                                                </button>
                                            </div>
                                        </div>

                                        <input type="file" name="lab_report" id="reportInput" class="hidden"
                                            accept=".pdf,.jpg,.jpeg,.png">
                                    </label>

                                    <button type="submit"
                                        class="mt-6 w-auto mx-auto px-6 py-3 bg-gradient-to-r bg-cyan-400 text-black font-bold rounded-xl hover:opacity-90 transition flex items-center justify-center gap-2">
                                        <span class="material-symbols-outlined text-lg">analytics</span>
                                        Analyze with AI →
                                    </button>

                                </div>
                            </div>

                            <!-- Results Panel -->
                            <div class="lg:col-span-5">
                                <div class="glass-card p-7 rounded-2xl neon-border h-full">
                                    <h3 class="text-xl font-bold text-white mb-4">Report Analysis Results</h3>
                                    <div class="space-y-4">
                                        <div>
                                            <div class="flex justify-between mb-2">
                                                <span class="text-gray-300">Liver Disease Risk</span>
                                                <span class="text-white font-bold">--%</span>
                                            </div>
                                            <div class="h-2 bg-deep-navy rounded-full overflow-hidden">
                                                <div class="h-full bg-accent-teal w-0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>


                <!-- ===================== MANUAL TAB ===================== -->
                <div id="tabManual" class="tab-content hidden">
                    <div class="glass-card p-6 rounded-2xl neon-border">
                        <h3 class="text-xl font-bold text-white mb-6">Manual Lab Entry</h3>

                        <form id="manualForm" method="POST" action="{{ route('prediction.store') }}">
                            @csrf
                            <input type="hidden" name="prediction_type" value="manual">

                            <!-- Hidden patient fields -->
                            <input type="hidden" name="patient_name" id="manual_patient_name">
                            <input type="hidden" name="age" id="manual_age">
                            <input type="hidden" name="gender" id="manual_gender">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">ALT (U/L)</label>
                                    <input type="number" name="alamine_aminotransferase" required
                                        class="w-full bg-deep-navy/80 border border-accent-teal/30 rounded-lg px-4 py-3 text-white focus:border-accent-teal focus:outline-none"
                                        placeholder="e.g., 25">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">AST (U/L)</label>
                                    <input type="number" name="aspartate_aminotransferase" required
                                        class="w-full bg-deep-navy/80 border border-accent-teal/30 rounded-lg px-4 py-3 text-white focus:border-accent-teal focus:outline-none"
                                        placeholder="e.g., 30">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Total Bilirubin (mg/dL)</label>
                                    <input type="number" name="total_bilirubin" step="any" required
                                        class="w-full bg-deep-navy/80 border border-accent-teal/30 rounded-lg px-4 py-3 text-white focus:border-accent-teal focus:outline-none"
                                        placeholder="e.g., 0.8">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Direct Bilirubin (mg/dL)</label>
                                    <input type="number" name="direct_bilirubin" step="any" required
                                        class="w-full bg-deep-navy/80 border border-accent-teal/30 rounded-lg px-4 py-3 text-white focus:border-accent-teal focus:outline-none"
                                        placeholder="e.g., 0.2">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Alkaline Phosphatase (U/L)</label>
                                    <input type="number" name="alkaline_phosphotase" required
                                        class="w-full bg-deep-navy/80 border border-accent-teal/30 rounded-lg px-4 py-3 text-white focus:border-accent-teal focus:outline-none"
                                        placeholder="e.g., 85">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Total Protein (g/dL)</label>
                                    <input type="number" name="total_protiens" step="any" required
                                        class="w-full bg-deep-navy/80 border border-accent-teal/30 rounded-lg px-4 py-3 text-white focus:border-accent-teal focus:outline-none"
                                        placeholder="e.g., 7.0">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Albumin (g/dL)</label>
                                    <input type="number" name="albumin" step="any" required
                                        class="w-full bg-deep-navy/80 border border-accent-teal/30 rounded-lg px-4 py-3 text-white focus:border-accent-teal focus:outline-none"
                                        placeholder="e.g., 4.2">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-400 tracking-wider mb-2">Albumin/Globulin Ratio</label>
                                    <input type="number" name="albumin_and_globulin_ratio" step="any" required
                                        class="w-full bg-deep-navy/80 border border-accent-teal/30 rounded-lg px-4 py-3 text-white focus:border-accent-teal focus:outline-none"
                                        placeholder="e.g., 1.5">
                                </div>
                            </div>

                            <button type="submit"
                                class="mt-10 mx-auto w-auto px-6 py-3 bg-gradient-to-r bg-cyan-400 text-black font-bold rounded-xl hover:opacity-90 transition flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-lg">analytics</span>
                                Analyze with AI →
                            </button>
                        </form>
                    </div>
                </div>

                <!-- ===================== IMAGE TAB ===================== -->
                <div id="tabImage" class="tab-content hidden">

                    <form id="imageForm" method="POST" enctype="multipart/form-data" action="{{ route('prediction.store') }}">
                        @csrf
                        <input type="hidden" name="prediction_type" value="image">

                        <!-- Hidden patient fields -->
                        <input type="hidden" name="patient_name" id="image_patient_name">
                        <input type="hidden" name="age" id="image_age">
                        <input type="hidden" name="gender" id="image_gender">

                        <!-- Hidden lab value defaults for image-only submissions -->
                        <input type="hidden" name="total_bilirubin" value="1.0">
                        <input type="hidden" name="direct_bilirubin" value="0.3">
                        <input type="hidden" name="alkaline_phosphotase" value="80">
                        <input type="hidden" name="alamine_aminotransferase" value="25">
                        <input type="hidden" name="aspartate_aminotransferase" value="25">
                        <input type="hidden" name="total_protiens" value="7.0">
                        <input type="hidden" name="albumin" value="4.0">
                        <input type="hidden" name="albumin_and_globulin_ratio" value="1.5">

                        <div class="glass-card p-7 rounded-2xl neon-border">

                            <h3 class="text-xl font-bold text-white mb-6">Upload Liver Image</h3>

                            <label for="imageInput"
                                class="group flex flex-col items-center justify-center gap-4 border-2 border-dashed border-accent-teal/50 rounded-2xl p-8 bg-deep-navy/70 hover:bg-deep-navy/80 transition cursor-pointer min-h-[300px]">

                                <!-- Placeholder -->
                                <div id="imagePlaceholder" class="text-center">
                                    <div class="w-14 h-14 rounded-full bg-accent-teal/20 flex items-center justify-center mx-auto mb-4">
                                        <span class="material-symbols-outlined text-accent-teal text-3xl">image</span>
                                    </div>
                                    <p class="text-white font-medium">Upload liver scan image</p>
                                    <p class="text-xs text-gray-400 mt-1">JPG, PNG</p>
                                </div>

                                <!-- Preview -->
                                <div id="imagePreview" class="hidden w-full">
                                    <img id="previewImg" class="rounded-2xl w-full max-h-[400px] object-cover">
                                    <button type="button" id="removeImageBtn"
                                        class="mt-4 text-red-400 hover:text-red-300 flex items-center gap-2">
                                        <span class="material-symbols-outlined">delete</span>
                                        Remove Image
                                    </button>
                                </div>

                                <input type="file" name="ultrasound_image" id="imageInput" class="hidden"
                                    accept=".jpg,.jpeg,.png">
                            </label>

                            <button type="submit"
                                class="mt-10 mx-auto px-6 py-3 bg-gradient-to-r w-auto  bg-cyan-400 text-black font-bold rounded-xl hover:opacity-90 transition flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-lg">analytics</span>
                                Analyze with AI →
                            </button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ======================
            // TABS
            // ======================
            const tabs = document.querySelectorAll('.prediction-tab');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    contents.forEach(content => content.classList.add('hidden'));

                    const target = tab.dataset.tab;
                    if (target === 'report') document.getElementById('tabReport').classList.remove('hidden');
                    if (target === 'manual') document.getElementById('tabManual').classList.remove('hidden');
                    if (target === 'image') document.getElementById('tabImage').classList.remove('hidden');
                });
            });

            // ======================
            // SYNC PATIENT DATA INTO ALL FORMS
            // ======================
            function syncPatientData() {
                const firstName = document.getElementById('first_name').value.trim();
                const lastName = document.getElementById('last_name').value.trim();
                const fullName = [firstName, lastName].filter(Boolean).join(' ') || 'Anonymous';
                const age = document.getElementById('age').value || '30';
                const gender = document.getElementById('gender').value || 'male';

                ['report', 'manual', 'image'].forEach(prefix => {
                    const nameEl = document.getElementById(prefix + '_patient_name');
                    const ageEl  = document.getElementById(prefix + '_age');
                    const genEl  = document.getElementById(prefix + '_gender');
                    if (nameEl) nameEl.value = fullName;
                    if (ageEl)  ageEl.value  = age;
                    if (genEl)  genEl.value  = gender;
                });
            }

            // Sync on any change to patient data fields
            ['first_name', 'last_name', 'age', 'gender'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.addEventListener('input', syncPatientData);
                if (el) el.addEventListener('change', syncPatientData);
            });

            // Sync before each form submission
            ['reportForm', 'manualForm', 'imageForm'].forEach(formId => {
                const form = document.getElementById(formId);
                if (form) {
                    form.addEventListener('submit', function (e) {
                        syncPatientData();

                        // Validate age & gender are present
                        const age = document.getElementById('age').value;
                        const gender = document.getElementById('gender').value;

                        if (!age || !gender) {
                            e.preventDefault();
                            alert('Please fill in Patient Age and Gender before analyzing.');
                            return false;
                        }
                    });
                }
            });

            // ======================
            // REPORT FILE
            // ======================
            const reportInput = document.getElementById('reportInput');
            const reportPreview = document.getElementById('reportPreview');
            const reportPlaceholder = document.getElementById('reportPlaceholder');
            const reportPreviewName = document.getElementById('reportPreviewName');
            const reportPreviewSize = document.getElementById('reportPreviewSize');
            const removeReportBtn = document.getElementById('removeReportBtn');

            reportInput.addEventListener('change', function () {
                const file = this.files[0];
                if (!file) return;
                reportPlaceholder.classList.add('hidden');
                reportPreview.classList.remove('hidden');
                reportPreviewName.textContent = file.name;
                reportPreviewSize.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
            });

            removeReportBtn.addEventListener('click', function () {
                reportInput.value = '';
                reportPreview.classList.add('hidden');
                reportPlaceholder.classList.remove('hidden');
            });

            // ======================
            // IMAGE FILE
            // ======================
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');
            const imagePlaceholder = document.getElementById('imagePlaceholder');
            const previewImg = document.getElementById('previewImg');
            const removeImageBtn = document.getElementById('removeImageBtn');

            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (!file) return;
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePlaceholder.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                    previewImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });

            removeImageBtn.addEventListener('click', function () {
                imageInput.value = '';
                imagePreview.classList.add('hidden');
                imagePlaceholder.classList.remove('hidden');
                previewImg.src = '';
            });

        });
    </script>
@endsection
