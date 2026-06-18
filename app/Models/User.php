<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'phone',
        'medical_license_number',
        'country',
        'date_of_birth',
        'gender',
        'status',           // active, inactive, pending
        'institution',      // hospital/university name
        'last_active_at',   // timestamp of last activity
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth'     => 'date',
        'last_active_at'    => 'datetime',
    ];

    // Relationship: a user can have many predictions
    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }

    // Role helpers
    public function isDoctor(): bool
    {
        return $this->role === 'doctor';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Get full name (fallback to 'name' column if first/last are empty)
    public function getFullNameAttribute(): string
    {
        if ($this->first_name && $this->last_name) {
            return $this->first_name . ' ' . $this->last_name;
        }
        return $this->name ?? 'Unknown User';
    }
}