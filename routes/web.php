<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//To add/view patient details
Route::get('/addPatient', function () {
    return view('addPatient');
})->middleware(['auth', 'verified'])->name('addPatient');

//To add a new patient
Route::post('/addPatientDetails', [PatientController::class,'store'])->middleware(['auth', 'verified'])->name('addPatientDetails');
///To update details of an existing patient
Route::post('/updatePatientDetails', [PatientController::class,'update'])->middleware(['auth', 'verified'])->name('updatePatientDetails');
//To delete a patient
Route::post('/deletePatientDetails', [PatientController::class,'destroy'])->middleware(['auth', 'verified'])->name('deletePatientDetails');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
