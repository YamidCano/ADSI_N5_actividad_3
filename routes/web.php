<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Apprentices;
use App\Http\Livewire\Instructors;
use App\Http\Livewire\WorkingDay;
use App\Http\Livewire\Registrations;
use App\Http\Livewire\DetailRegistration;
use App\Http\Livewire\Fichas;

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


Route::get('/Aprendices', Apprentices::class)->name('Aprendices');
Route::get('/Instructores', Instructors::class)->name('Instructores');
Route::get('/Jornadas', WorkingDay::class)->name('Jornadas');
Route::get('/Fichas', Fichas::class)->name('Fichas');
Route::get('/', Registrations::class)->name('Registros');
Route::get('/detail', DetailRegistration::class)->name('detail-registro');
