<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['practice_schedule'];

    public function doctor(){
        return $this->hasMany(Doctor::class);
    }
}
