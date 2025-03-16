<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\MedicationsController;
use App\Http\Controllers\MedicationsTypeController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('doctor', DoctorController::class);
    Route::resource('clinic', ClinicController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('medications-type', MedicationsTypeController::class);
    Route::resource('medications', MedicationsController::class);
    Route::get('medications/{id}/edit-stock', [MedicationsController::class, 'editstock'])->name('medications.edit_stock');
    Route::post('medications/{id}/add-stock', [MedicationsController::class, 'addstock'])->name('medications.add_stock');
    Route::resource('employees', EmployeesController::class);
    Route::resource('patients', PatientsController::class);
});

Route::middleware(['auth', 'is_super_admin'])->group(function () {
    Route::resource('user-management', UserController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
