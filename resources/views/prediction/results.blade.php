@extends('layouts.app')

@section('title', 'Prediction Results - LiverCare AI')

@section('content')
<div class="py-12 px-4 sm:px-6">
    <div class="max-w-4xl mx-auto">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 rounded-xl">
                <p class="text-emerald-400">{{ session('success') }}</p>
            </div>
        @endif

        <!-- Risk Score Card -->
        <div class="glass-card rounded-2xl p-8 mb-8 neon-border">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">AI Analysis Results</h2>
                
                @php
                    $riskScore = $prediction->risk_score ?? 0;
                    $riskLevel = $prediction->risk_level ?? 'Low';
                    $riskColor = $riskScore <= 30 ? 'green' : ($riskScore <= 70 ? 'yellow' : 'red');
                @endphp
                
                <div class="relative inline-block mb-6">
                    <svg class="w-48 h-48 transform -rotate-90">
                        <circle class="text-gray-700" stroke-width="12" fill="none" r="90" cx="96" cy="96" stroke="currentColor"/>
                        <circle class="text-{{ $riskColor }}-500" 
                                stroke-width="12" stroke-dasharray="{{ ($riskScore / 100) * 565.48 }} 565.48" 
                                fill="none" r="90" cx="96" cy="96" stroke="currentColor"/>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-5xl font-bold">{{ round($riskScore) }}%</span>
                        <span class="text-sm text-gray-400">Risk Score</span>
                    </div>
                </div>
                
                <div class="inline-flex items-center px-4 py-2 rounded-full text-lg font-semibold
                    @if($riskLevel == 'Low') bg-green-500/20 text-green-400 border border-green-500/50
                    @elseif($riskLevel == 'Moderate') bg-yellow-500/20 text-yellow-400 border border-yellow-500/50
                    @else bg-red-500/20 text-red-400 border border-red-500/50 @endif">
                    {{ $riskLevel }} Risk Level
                </div>
            </div>
        </div>
        
        <!-- Detailed Results Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-accent-teal">person</span>
                    Patient Information
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Patient Name</span>
                        <span class="text-white">{{ $prediction->patient_name ?? 'Anonymous' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Age</span>
                        <span class="text-white">{{ $prediction->age ?? 'Not provided' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Analysis Date</span>
                        <span class="text-white">{{ $prediction->created_at->format('F d, Y h:i A') }}</span>
                    </div>
                </div>
            </div>
            
            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-accent-teal">science</span>
                    AI Model Details
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Model Used</span>
                        <span class="text-accent-teal font-bold">Random Forest Classifier</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Confidence Score</span>
                        <span class="text-accent-blue font-bold">{{ round($riskScore) }}%</span>
                    </div>
                    @php
                        $details = $prediction->prediction_details;
                    @endphp
                    @if($details && isset($details['scan_recommendation']))
                    <div class="flex justify-between">
                        <span class="text-gray-400">Scan Recommendation</span>
                        <span class="{{ $details['scan_recommendation']['recommend'] ? 'text-yellow-500' : 'text-green-500' }} font-bold">
                            {{ $details['scan_recommendation']['recommend'] ? 'Recommended' : 'Not Required' }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Disease Probability Chart -->
        <div class="glass-card rounded-2xl p-8 mb-8">
            <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-accent-teal">monitoring</span>
                Disease Probability Analysis
            </h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-300">Liver Disease Risk</span>
                        <span class="font-bold">{{ round($riskScore) }}%</span>
                    </div>
                    <div class="h-3 bg-deep-navy rounded-full overflow-hidden">
                        <div class="h-full rounded-full {{ $riskScore <= 30 ? 'bg-green-500' : ($riskScore <= 70 ? 'bg-yellow-500' : 'bg-red-500') }}" 
                             style="width: {{ $riskScore }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-300">Healthy Probability</span>
                        <span class="font-bold">{{ 100 - round($riskScore) }}%</span>
                    </div>
                    <div class="h-3 bg-deep-navy rounded-full overflow-hidden">
                        <div class="h-full bg-accent-teal rounded-full" style="width: {{ 100 - $riskScore }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== NEW SECTION 1: FINAL DIAGNOSIS ===== -->
        <div class="glass-card rounded-2xl p-8 mb-8 neon-border">
            <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-accent-teal">stethoscope</span>
                Final Diagnosis
            </h3>
            @php
                // Determine final diagnosis based on risk score and key lab values
                $finalDiagnosis = '';
                $diagnosisConfidence = round($riskScore);
                $diagnosisSummary = '';

                if ($riskScore <= 20) {
                    $finalDiagnosis = 'Normal Liver Function';
                    $diagnosisSummary = 'Based on the provided lab values, the liver function appears within normal ranges. No significant abnormalities detected.';
                } elseif ($riskScore <= 40) {
                    $finalDiagnosis = 'Mild Liver Abnormality';
                    $diagnosisSummary = 'Slight deviations from normal ranges detected. Lifestyle modifications and regular monitoring are recommended.';
                } elseif ($riskScore <= 60) {
                    $finalDiagnosis = 'Moderate Liver Dysfunction';
                    $diagnosisSummary = 'The analysis indicates moderate liver abnormalities. Further clinical evaluation and diagnostic tests are strongly advised.';
                } elseif ($riskScore <= 80) {
                    $finalDiagnosis = 'Severe Liver Disease Suspected';
                    $diagnosisSummary = 'High probability of significant liver disease. Immediate consultation with a hepatologist is highly recommended.';
                } else {
                    $finalDiagnosis = 'Critical Liver Condition';
                    $diagnosisSummary = 'Critical risk indicators detected. Urgent medical attention and comprehensive liver evaluation are required.';
                }
            @endphp
            <div class="bg-gradient-to-r from-accent-teal/10 via-accent-blue/10 to-transparent rounded-2xl p-6 border border-accent-teal/30">
                <div class="flex flex-col lg:flex-row gap-6 items-start lg:items-center justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-white mb-2">{{ $finalDiagnosis }}</h4>
                        <p class="text-slate-300 text-sm leading-relaxed">{{ $diagnosisSummary }}</p>
                    </div>
                    <div class="text-center bg-white/5 rounded-2xl p-4 min-w-[120px] border border-white/10">
                        <div class="text-2xl font-bold text-accent-teal">{{ $diagnosisConfidence }}%</div>
                        <div class="text-xs text-slate-400 mt-1">Confidence</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== NEW SECTION 2: RESULTS ANALYSIS ===== -->
        <div class="glass-card rounded-2xl p-8 mb-8">
            <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-accent-teal">analytics</span>
                Results Analysis
            </h3>
            <div class="space-y-4">
                @php
                    // Extract lab values for analysis
                    $alt = $prediction->alanine_aminotransferase ?? null;
                    $ast = $prediction->aspartate_aminotransferase ?? null;
                    $bilirubin = $prediction->bilirubin_total ?? null;
                    $albumin = $prediction->albumin ?? null;

                    $analysisPoints = [];
                    if ($alt && $alt > 40) $analysisPoints[] = "Elevated ALT ($alt U/L) suggests possible liver cell injury.";
                    elseif ($alt && $alt < 10) $analysisPoints[] = "Low ALT ($alt U/L) is generally not concerning.";
                    
                    if ($ast && $ast > 40) $analysisPoints[] = "Elevated AST ($ast U/L) may indicate liver or muscle damage.";
                    
                    if ($bilirubin && $bilirubin > 1.2) $analysisPoints[] = "High total bilirubin ($bilirubin mg/dL) could indicate jaundice or bile duct issues.";
                    
                    if ($albumin && $albumin < 3.5) $analysisPoints[] = "Low albumin ($albumin g/dL) suggests decreased liver synthetic function.";
                    
                    if (empty($analysisPoints)) $analysisPoints[] = "All key liver function markers are within normal ranges. Regular check-ups are still advised.";
                @endphp
                <ul class="space-y-3">
                    @foreach($analysisPoints as $point)
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-accent-teal text-sm mt-0.5">lab_profile</span>
                        <span class="text-gray-300">{{ $point }}</span>
                    </li>
                    @endforeach
                </ul>
                <div class="mt-4 p-4 bg-white/5 rounded-xl border border-white/10">
                    <div class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-accent-blue">info</span>
                        <div>
                            <p class="text-sm text-gray-300">This analysis is based on the entered laboratory values and the AI model's risk calculation. It is not a substitute for professional medical advice.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recommendations -->
        <div class="glass-card rounded-2xl p-8 mb-8">
            <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-accent-teal">clinical_notes</span>
                Recommendations
            </h3>
            <ul class="space-y-3">
                @php
                    $recommendations = $prediction->recommendations;
                    if (is_string($recommendations)) {
                        $recommendations = json_decode($recommendations, true);
                    }
                    if (!is_array($recommendations)) {
                        $recommendations = [];
                    }
                @endphp
                @forelse($recommendations as $recommendation)
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-emerald-400 text-sm mt-0.5">check_circle</span>
                        <span class="text-gray-300">{{ $recommendation }}</span>
                    </li>
                @empty
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-emerald-400 text-sm mt-0.5">check_circle</span>
                        <span class="text-gray-300">Please consult with a healthcare provider for more information.</span>
                    </li>
                @endforelse
            </ul>
        </div>
        
        <!-- Lab Values Used -->
        <div class="glass-card rounded-2xl p-8 mb-8">
            <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                <span class="material-symbols-outlined text-accent-teal">lab_profile</span>
                Lab Values Used
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="p-3 bg-deep-navy/50 rounded-lg">
                    <span class="text-gray-400 text-xs">ALT</span>
                    <p class="text-white font-bold">{{ $prediction->alanine_aminotransferase ?? 'N/A' }} U/L</p>
                </div>
                <div class="p-3 bg-deep-navy/50 rounded-lg">
                    <span class="text-gray-400 text-xs">AST</span>
                    <p class="text-white font-bold">{{ $prediction->aspartate_aminotransferase ?? 'N/A' }} U/L</p>
                </div>
                <div class="p-3 bg-deep-navy/50 rounded-lg">
                    <span class="text-gray-400 text-xs">Total Bilirubin</span>
                    <p class="text-white font-bold">{{ $prediction->bilirubin_total ?? 'N/A' }} mg/dL</p>
                </div>
                <div class="p-3 bg-deep-navy/50 rounded-lg">
                    <span class="text-gray-400 text-xs">Albumin</span>
                    <p class="text-white font-bold">{{ $prediction->albumin ?? 'N/A' }} g/dL</p>
                </div>
                <div class="p-3 bg-deep-navy/50 rounded-lg">
                    <span class="text-gray-400 text-xs">Direct Bilirubin</span>
                    <p class="text-white font-bold">{{ $prediction->bilirubin_direct ?? 'N/A' }} mg/dL</p>
                </div>
                <div class="p-3 bg-deep-navy/50 rounded-lg">
                    <span class="text-gray-400 text-xs">Alkaline Phosphatase</span>
                    <p class="text-white font-bold">{{ $prediction->alkaline_phosphatase ?? 'N/A' }} U/L</p>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('prediction.export', $prediction) }}" 
               class="flex-1 text-center py-3 bg-gray-800 rounded-xl hover:bg-gray-700 transition flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-sm">download</span>
                Export Results
            </a>
            <a href="{{ route('prediction.create') }}" 
               class="flex-1 text-center py-3 bg-gradient-to-r bg-cyan-400 text-deep-navy font-bold rounded-xl hover:brightness-110 transition flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-sm">add</span>
                New Analysis
            </a>
            <a href="{{ route('prediction.history') }}" 
               class="flex-1 text-center py-3 bg-deep-navy/50 border border-white/10 rounded-xl hover:bg-white/5 transition flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-sm">history</span>
                View History
            </a>
        </div>
    </div>
</div>
@endsection