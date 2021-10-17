<?php

namespace App\Services;

use App\Models\Patient;

class PatientService
{
    public function createPatient(array $patient){
        $patient = Patient::create($patient);
        return $patient;
    }

    public function createBloodPressureReading(Patient $patient, Array $reading){
        $reading = $patient->readings()->create($reading);
        return $reading;  
    }
}
