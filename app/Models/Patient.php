<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'gender', 'date_of_birth', 'email'];

    public function readings(){
        return $this->hasMany(BloodPressureReading::class);
    }
}
