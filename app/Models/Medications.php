<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medications extends Model
{
    protected $table = 'medications';

    protected $fillable = [
        'medication_code',
        'stock',
        'type_id',
        'name',
        'dosage',
        'price',
        'expiration_date'
    ];


    public function type(){
        return $this->belongsTo(MedicationsType::class, 'type_id');
    }
}
