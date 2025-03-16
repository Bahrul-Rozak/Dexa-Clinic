<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
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
        'clinic_id'
    ];

    public function doctor(){
        return $this->belongsTo(Model::class, 'doctor_id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
}
