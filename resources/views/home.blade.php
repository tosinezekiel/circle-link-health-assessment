@extends('layouts.base')
@section('title', 'Home')

@section('content')
    <div class="flex justify-between">
        <span class="font-semibold text-4xl font-bold uppercase text-gray-800 leading-tight my-10">
            {{ __('Patients') }}
        </span>
        <a href="{{ route('patient.create') }}" class="flex flex-col justify-center">
            <x-button.primary>
                {{ __('Create') }}
            </x-button.primary>
        </a>
    </div>
    
    <livewire:patient.index searchable="first_name, last_name, email, date_of_birth, gender" per-page="20" exportable />
@endsection