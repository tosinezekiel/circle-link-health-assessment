<?php

namespace App\Http\Livewire\Bp;

use App\Models\Patient;
use Livewire\Component;
use App\Services\PatientService;

class Create extends Component
{

    public $message = null;

    public $patient;
    public $upper;
    public $lower;

    public function mount(Patient $patient){
        $this->patient = $patient;
    }

    protected $rules = [
        'upper' => 'required|numeric|min:1|max:300',
        'lower' => 'required|numeric|min:1|max:300'
    ];

    public function save(){
        $validated = $this->validate();
        // dd($this->patient);
        (new PatientService())->createBloodPressureReading($this->patient, $validated);
        $this->message  = "Saved.";
        $this->resetFormData();
    }

    public function render()
    {
        return view('livewire.bp.create')
        ->extends('layouts.base')
        ->section('content');
    }

    protected function resetFormData(){
        $this->reset(array_keys($this->rules));
    }
}