<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prediction extends Model
{
    protected $table = 'predictions';
    
    protected $fillable = [
        'user_id', 'patient_name', 'age',
        'bilirubin_total', 'bilirubin_direct', 'alkaline_phosphatase',
        'alanine_aminotransferase', 'aspartate_aminotransferase', 'gamma_gt',
        'total_protein', 'albumin', 'globulin', 'platelets', 'inr', 'creatinine',
        'risk_score', 'risk_level', 'prediction_details', 'recommendations',
        'lab_report_path', 'ultrasound_image_path'
    ];

    protected $casts = [
        'prediction_details' => 'array',
        'recommendations' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getRiskColorAttribute(): string
    {
        return match($this->risk_level) {
            'Low' => 'green',
            'Moderate' => 'yellow',
            'High' => 'red',
            default => 'gray',
        };
    }
    
    public function getRiskBadgeClassAttribute(): string
    {
        return match($this->risk_level) {
            'Low' => 'bg-green-500/20 text-green-400 border-green-500/50',
            'Moderate' => 'bg-yellow-500/20 text-yellow-400 border-yellow-500/50',
            'High' => 'bg-red-500/20 text-red-400 border-red-500/50',
            default => 'bg-gray-500/20 text-gray-400 border-gray-500/50',
        };
    }
}