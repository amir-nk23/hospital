<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorRoleController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\SuperAdminController;
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




Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard.index');

Route::name('auth.')->group(function (){

    Route::get('/login', [AuthController::class,'showlogin'])->name('showlogin');
    Route::post('/login', [AuthController::class,'login'])->name('login');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');


});

Route::prefix('user/')->middleware('auth')->group(function ()
{
 Route::get('superadmin/index',[SuperAdminController::class,'index'])->name('superadmin.index');
 Route::get('superadmin/create',[SuperAdminController::class,'create'])->name('superadmin.create');
 Route::post('superadmin',[SuperAdminController::class,'store'])->name('superadmin.store');
 Route::get('superadmin/edit/{user}',[SuperAdminController::class,'edit'])->name('superadmin.edit');
 Route::put('superadmin/{user}',[SuperAdminController::class,'update'])->name('superadmin.update');
 Route::get('superadmin/{user}',[SuperAdminController::class,'destroy'])->name('superadmin.destroy');

});

Route::prefix('speciality/')->middleware('auth')->group(function ()
{
    Route::get('/index',[SpecialityController::class,'index'])->name('speciality.index')->middleware('can:view specialities');
    Route::get('/create',[SpecialityController::class,'create'])->name('speciality.create')->middleware('can:create specialities');
    Route::post('',[SpecialityController::class,'store'])->name('speciality.store');
    Route::get('/edit/{speciality}',[SpecialityController::class,'edit'])->name('speciality.edit')->middleware('can:update specialities');
    Route::patch('/{user}',[SpecialityController::class,'update'])->name('speciality.update');
    Route::get('/{id}',[SpecialityController::class,'destroy'])->name('speciality.destroy')->middleware('can:delete specialities');

});

Route::prefix('doctor/role')->middleware('auth')->group(function ()
{
    Route::get('/index',[DoctorRoleController::class,'index'])->name('doctor.role.index')->middleware('can:view doctor_role');
    Route::get('/create',[DoctorRoleController::class,'create'])->name('doctor.role.create')->middleware('can:create doctor_role');
    Route::post('',[DoctorRoleController::class,'store'])->name('doctor.role.store');
    Route::get('/edit/{doctorRole}',[DoctorRoleController::class,'edit'])->name('doctor.role.edit')->middleware('can:edit doctor_role');
    Route::patch('/{DoctorRole}',[DoctorRoleController::class,'update'])->name('doctor.role.update');
    Route::get('/{id}',[DoctorRoleController::class,'destroy'])->name('doctor.role.destroy')->middleware('can:delete doctor_role');

});


Route::prefix('operation')->middleware('auth')->group(function ()
{
    Route::get('/index',[OperationController::class,'index'])->name('operation.index')->middleware('can:view operation');
    Route::get('/create',[OperationController::class,'create'])->name('operation.create')->middleware('can:create operation');
    Route::post('',[OperationController::class,'store'])->name('operation.store');
    Route::get('/edit/{operation}',[OperationController::class,'edit'])->name('operation.edit')->middleware('can:update operation');
    Route::patch('/{operation}',[OperationController::class,'update'])->name('operation.update');
    Route::get('/{id}',[OperationController::class,'destroy'])->name('operation.destroy')->middleware('can:delete operation');;

});


Route::prefix('doctor')->middleware('auth')->group(function ()
{
    Route::get('/index',[DoctorController::class,'index'])->name('doctor.index')->middleware('can:view doctor');
    Route::get('/create',[DoctorController::class,'create'])->name('doctor.create')->middleware('can:create doctor');
    Route::post('',[DoctorController::class,'store'])->name('doctor.store');
    Route::get('/edit/{doctor}',[DoctorController::class,'edit'])->name('doctor.edit')->middleware('can:update doctor');
    Route::patch('/{doctor}',[DoctorController::class,'update'])->name('doctor.update');
    Route::get('/{id}',[DoctorController::class,'destroy'])->name('doctor.destroy')->middleware('can:delete doctor');;
});


Route::prefix('insurance')->middleware('auth')->group(function ()
{
    Route::get('/index',[InsuranceController::class,'index'])->name('insurance.index')->middleware('can:view insurance');
    Route::get('/create',[InsuranceController::class,'create'])->name('insurance.create')->middleware('can:create insurance');
    Route::post('',[InsuranceController::class,'store'])->name('insurance.store');
    Route::get('/edit/{insurance}',[InsuranceController::class,'edit'])->name('insurance.edit')->middleware('can:update insurance');
    Route::patch('/{insurance}',[InsuranceController::class,'update'])->name('insurance.update');
    Route::get('/{id}',[InsuranceController::class,'destroy'])->name('insurance.destroy')->middleware('can:delete insurance');;
});



