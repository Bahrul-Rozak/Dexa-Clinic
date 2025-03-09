<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicationsType extends Model
{
    protected $fillable = ['medication_type'];
    protected $table = 'medications_type';
}
