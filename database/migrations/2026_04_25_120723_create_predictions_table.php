<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('patient_name')->nullable();
            $table->integer('age')->nullable();
            
            // Liver function tests
            $table->float('bilirubin_total')->nullable();
            $table->float('bilirubin_direct')->nullable();
            $table->float('alkaline_phosphatase')->nullable();
            $table->float('alanine_aminotransferase')->nullable();
            $table->float('aspartate_aminotransferase')->nullable();
            $table->float('gamma_gt')->nullable();
            $table->float('total_protein')->nullable();
            $table->float('albumin')->nullable();
            $table->float('globulin')->nullable();
            
            // Additional parameters
            $table->float('platelets')->nullable();
            $table->float('inr')->nullable();
            $table->float('creatinine')->nullable();
            
            // Prediction results
            $table->float('risk_score')->nullable();
            $table->string('risk_level')->nullable(); // Low, Moderate, High
            $table->json('prediction_details')->nullable();
            $table->json('recommendations')->nullable();
            
            // File uploads
            $table->string('lab_report_path')->nullable();
            $table->string('ultrasound_image_path')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('predictions');
    }
};