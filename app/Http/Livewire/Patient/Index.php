<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class Index extends LivewireDatatable
{
    
    public $model = Patient::class;

    public $persistPerPage = false;

    public $searchable = ['first_name'];

    public $exportable = false;
    
    function columns()
    {
    	return [
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::callback(['id', 'first_name'], function ($id, $first_name) {
                return view('datatables::link', [
                    'href' => route('patient.show', $id),
                    'slot' => ucfirst($first_name)
                    ]);
            })->label('first_name'),
    		Column::callback('last_name', function ($last_name) {
                return ucfirst($last_name);
            })->label('Last Name'),
    		Column::callback('email', function ($email) {
                    return ucfirst($email);
            })->label('Email'),
    		Column::callback('gender', function ($gender) {
                return ucfirst($gender);
            })->label('Gender'),
    		DateColumn::name('date_of_birth')->label('DOB'),
    		DateColumn::name('created_at')->label('Creation Date'),
    	];
    }
}
