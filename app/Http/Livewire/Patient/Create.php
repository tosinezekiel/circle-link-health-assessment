<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use App\Services\PatientService;

class Create extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $gender;
    public $date_of_birth;

    public $message  = null;

    protected $listeners = ['refreshCreatePatient' => '$refresh'];

    protected $rules = [
        'first_name' => 'required|string|min:3|max:10',
        'last_name' => 'required|string|min:3|max:10',
        'email' => 'required|email|unique:patients,email',
        'gender' => 'required|string',
        'date_of_birth' => 'required|date'
    ];

    public function save(){
        $validated = $this->validate();
        (new PatientService())->createPatient($validated);
        $this->message  = "Saved.";
        $this->resetFormData();

    }

    public function render()
    {
        return view('livewire.patient.create')
        ->extends('layouts.base')
        ->section('content');
    }

    protected function resetFormData(){
        $this->reset(array_keys($this->rules));
    }
}
