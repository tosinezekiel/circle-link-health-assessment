<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Patient;
use App\Services\PatientService;
use App\Models\BloodPressureReading;

use function PHPUnit\Framework\assertNotNull;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientServiceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_that_patient_record_persist_in_db()
    {
        $patientService = new PatientService();
        $mockedPatient = Patient::factory()->make(["email" => "tosinezekiel1@gmail.com"])->toArray();
        $data = $patientService->createPatient($mockedPatient);
        $this->assertModelExists($data);

    }

    public function test_that_patient_blood_pressure_reading_persist_in_db()
    {
        $patientService = new PatientService();
        $existingPatient = Patient::factory()->create();
        $mockedReading = BloodPressureReading::factory()->make()->toArray();
        $data = $patientService->createBloodPressureReading($existingPatient, $mockedReading);
        $this->assertDatabaseHas('blood_pressure_readings', [
            'id' => $data['id'],
            'patient_id' => $data['patient_id']
        ]);
    }


}
