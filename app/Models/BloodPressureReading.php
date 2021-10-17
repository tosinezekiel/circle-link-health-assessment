<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressureReading extends Model
{
    use HasFactory;

    protected $fillable = ['upper', 'lower'];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
