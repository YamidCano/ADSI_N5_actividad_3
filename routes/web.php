<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Apprentice;
use App\Http\Livewire\Instructor;
use App\Http\Livewire\WorkingDay;
use App\Http\Livewire\Registration;
use App\Http\Livewire\DetailRegistration;

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


Route::get('/Aprendices', Apprentice::class)->name('aprendices');
Route::get('/Instructor', Instructor::class)->name('instructor');
Route::get('/Jornada', WorkingDay::class)->name('jornada');
Route::get('/', Registration::class)->name('registro');
Route::get('/detail', DetailRegistration::class)->name('detail-registro');
