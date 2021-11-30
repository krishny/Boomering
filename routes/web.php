<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorsController;

use App\Models\Doctor;
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
    return view('welcome');
});


//Route::get('/doctors', [App\Http\Controllers\DoctorsController::class, 'index']);
//Route::get('/doctors/{doctor}', [App\Http\Controllers\DoctorsController::class, 'show']);
//Route::get('/doctors/{doctor}/edit', [App\Http\Controllers\DoctorsController::class, 'edit']);
//Route::get('/doctors/create', [App\Http\Controllers\DoctorsController::class, 'create']);
Route::get('/doctors/create', [DoctorsController::class, 'create']);
Route::post('/doctors', [DoctorsController::class, 'store']);
Route::delete('doctors/{doctor}', [DoctorsController::class, 'destroy']);
Route::get('doctors/details/{id}', [DoctorsController::class, 'getDetails'])->name('getDetails');

Route::get('/patients/create', [PatientsController::class, 'create']);
Route::post('/patients', [PatientsController::class, 'store']);
Route::delete('patients/{patient}', [PatientsController::class, 'destroy']);


Route::get('/appointments/create', [AppointmentsController::class, 'create']);
Route::post('/appointments', [AppointmentsController::class, 'store']);
Route::delete('appointments/{appointment}', [AppointmentsController::class, 'destroy']);


//Route::get('/doctors/{doctors}', [App\Http\Controllers\DoctorsController::class, 'show']);
//Route::get('/doctors/id', [App\Http\Controllers\DoctorsController::class, 'show'])->name('id');
//Route::post('/doctors/id', [App\Http\Controllers\DoctorsController::class, 'store'])->name('id');
//Route::post('/doctors/id', [App\Http\Controllers\DoctorsController::class, 'update'])->name('id');
//Route::delete('/doctors/id', [App\Http\Controllers\DoctorsController::class, 'delete'])->name('doctors');
//Route::delete('doctors/{id}', 'App\Http\Controllers\DoctorsController@deleteDoctors')->name('deleteDoctors');

Route::resource('doctors', 'DoctorsController');
Route::resource('patients', 'PatientsController');
Route::resource('appointments', 'AppointmentsController');
//Route::resource('doctorSchedule', 'DoctorScheduleController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
