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
        'schedule_id'
    ];
}
