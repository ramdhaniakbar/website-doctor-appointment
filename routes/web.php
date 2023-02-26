<?php

use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Frontsite\AppointmentController;

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

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // appointment page
    Route::resource('appointment', AppointmentController::class);
    // payment page
    Route::resource('payment', PaymentController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    // dashboard page
    Route::resource('dashboard', DashboardController::class);
    // type user 
    Route::resource('type_user', TypeUserController::class);
    // specialist 
    Route::resource('specialist', SpecialistController::class);
    // doctor
    Route::resource('doctor', DoctorController::class);
    // config payment
    Route::resource('config_payment', ConfigPaymentController::class);
    // consultation
    Route::resource('consultation', ConsultationController::class);
    // permission
    Route::resource('permission', PermissionController::class);
    // role
    Route::resource('role', RoleController::class);
    // report appointment
    Route::resource('report_appointment', ReportAppointmentController::class);
    // report transaction
    Route::resource('report_transaction', ReportTransactionController::class);
    // hospital patient
    Route::resource('hospital_patient', HospitalPatientController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
