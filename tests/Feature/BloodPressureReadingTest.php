<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Patient;
use App\Http\Livewire\Bp\Create;

class BloodPressureReadingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_not_view_patients()
    {
        $patient = Patient::factory()->make(['email' => 'tosinezekiel1@gmail.com']);
        $this->get("/patients/{$patient->id}/bp_reading/create")
        ->assertNotFound();
    }

    public function test_user_can_view_patients()
    {
        $patient = Patient::factory()->create(['email' => 'tosinezekiel1@gmail.com']);
        $this->get("/patients/{$patient->id}/bp_reading/create")
        ->assertSeeLivewire('bp.create');
    }

    public function test_that_upper_is_required()
    {
        Livewire::test(Create::class)
        ->set('upper', '')
        ->call('save')
        ->assertHasErrors(['upper' => 'required']);
    }

    public function test_that_lower_is_required()
    {
        Livewire::test(Create::class)
        ->set('lower', '')
        ->call('save')
        ->assertHasErrors(['lower' => 'required']);
    }

    public function test_that_upper_is_valid()
    {
        Livewire::test(Create::class)
        ->set('upper', 'string')
        ->call('save')
        ->assertHasErrors(['upper' => 'numeric']);
    }

    public function test_that_lower_is_valid()
    {
        Livewire::test(Create::class)
        ->set('lower', 'string')
        ->call('save')
        ->assertHasErrors(['lower' => 'numeric']);
    }

    public function test_that_user_get_redirected_after_submission()
    {
        $patient = Patient::factory()->create();
        Livewire::test(Create::class, [$patient->id])
        ->set('upper', 120)
        ->set('lower', 180)
        ->call('save')
        ->assertHasNoErrors()
        ->assertSee('Saved.')
        ->assertRedirect(route('patient.show', $patient->id));
    }
}
