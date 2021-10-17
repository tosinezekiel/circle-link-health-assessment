<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/patients');
});

Route::prefix('patients')->group(function(){
    Route::get('/', \App\Http\Livewire\Patient\Home::class)->name('patient.home');
    Route::get('/create', \App\Http\Livewire\Patient\Create::class)->name('patient.create');
    Route::get('/{patient}/show', \App\Http\Livewire\Patient\Show::class)->name('patient.show');
    Route::get('/{patient}/bp_reading/create', \App\Http\Livewire\Bp\Create::class)->name('patient.reading');
});
