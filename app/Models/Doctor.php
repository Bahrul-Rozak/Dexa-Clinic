<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'id',
        'name',
        'address',
        'clinic_id',
        'phone',
        'schedule_id',
    ];

    public function clinic(){
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
    public function schedule(){
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
