<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    protected $fillable = [
        'patient_code',
        'name',
        'address',
        'birth_date',
        'gender',
        'phone',
        'religion',
        'education',
        'occupation',
        'national_id',
        'doctor_id',
        'clinic_id',
        'email',
        'password'
    ];

    public function doctor()
    {
        return $this->belongsTo(Model::class, 'doctor_id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    // App\Models\Patient.php
    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
