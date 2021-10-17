<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Patient;
use App\Services\PatientService;
use App\Http\Livewire\Patient\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_view_patients()
    {
        $this->get('/patients')
        ->assertSeeLivewire('patient.index');
    }

    public function test_user_can_view_create_patient_form()
    {
        $this->get('/patients/create')
        ->assertSeeLivewire('patient.create');
    }

    public function test_that_first_name_is_required()
    {
        Livewire::test(Create::class)
        ->set('first_name', '')
        ->call('save')
        ->assertHasErrors(['first_name' => 'required']);
    }

    public function test_that_date_of_birth_is_valid()
    {
        Livewire::test(Create::class)
        ->set('date_of_birth', 'two days ago')
        ->call('save')
        ->assertHasErrors(['date_of_birth' => 'date']);
    }

    public function test_that_email_is_required()
    {
        Livewire::test(Create::class)
        ->set('email', '')
        ->call('save')
        ->assertHasErrors(['email' => 'required']);
    }

    public function test_that_email_is_valid()
    {
        Livewire::test(Create::class)
        ->set('email', 'tosin')
        ->call('save')
        ->assertHasErrors(['email' => 'email']);
    }

    public function test_that_first_name_is_invalid()
    {
        Livewire::test(Create::class)
        ->set('first_name', 1234)
        ->call('save')
        ->assertHasErrors(['first_name' => 'string']);
    }

    public function test_that_last_name_is_invalid()
    {
        Livewire::test(Create::class)
        ->set('last_name', 1234)
        ->call('save')
        ->assertHasErrors(['last_name' => 'string']);
    }

    public function test_that_first_name_minimum_length_is_invalid()
    {
        Livewire::test(Create::class)
        ->set('first_name', "to")
        ->call('save')
        ->assertHasErrors(['first_name' => 'min']);
    }

    public function test_that_last_name_minimum_length_is_invalid()
    {
        Livewire::test(Create::class)
        ->set('last_name', "to")
        ->call('save')
        ->assertHasErrors(['last_name' => 'min']);
    }

    public function test_that_first_name_max_length_is_invalid()
    {
        Livewire::test(Create::class)
        ->set('first_name', "tosinoluwaseun")
        ->call('save')
        ->assertHasErrors(['first_name' => 'max']);
    }

    public function test_that_last_name_max_length_is_invalid()
    {
        Livewire::test(Create::class)
        ->set('last_name', "tosinoluwaseun")
        ->call('save')
        ->assertHasErrors(['last_name' => 'max']);
    }
    
    public function test_that_email_has_been_taken()
    {
        $patient = Patient::factory()->create(['email' => 'tosinezekiel1@gmail.com']);
        Livewire::test(Create::class)
        ->set('email', 'tosinezekiel1@gmail.com')
        ->call('save')
        ->assertHasErrors(['email' => 'unique']);
    }

    public function test_that_email_has_not_been_taken()
    {
        $patient = Patient::factory()->make(['email' => 'tosinezekiel1@gmail.com']);
        Livewire::test(Create::class)
        ->set('email', 'email2@test.com')
        ->assertHasNoErrors();
    }

    public function test_that_create_patient_form_has_no_errors()
    {
        $patient = Patient::factory()->make();
        Livewire::test(Create::class, ['patientservice' => new PatientService()])
        ->set('message', null)
        ->set('first_name', $patient->first_name)
        ->set('last_name', $patient->last_name)
        ->set('email', $patient->email)
        ->set('gender', $patient->gender)
        ->set('date_of_birth', $patient->date_of_birth)
        ->call('save')
        ->assertHasNoErrors()
        ->assertSee('Saved.');
    }

    public function test_that_user_can_view_single_patient()
    {
        $patient = Patient::factory()->create(['email' => 'tosinezekiel1@gmail.com']);
        $this->get("/patients/{$patient->id}/show")
        ->assertSeeLivewire('patient.show');
    }
}
