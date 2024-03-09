<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorRoleController;
use App\Http\Controllers\DoctorSurgeryController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NotifController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SurgeryController;
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
    Route::patch('/{speciality}',[SpecialityController::class,'update'])->name('speciality.update');
    Route::get('/{speciality}',[SpecialityController::class,'destroy'])->name('speciality.destroy')->middleware('can:delete specialities');

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


Route::prefix('/setting')->middleware('auth')->group(function (){

    Route::get('', [SettingController::class,'index'])->name('setting.index');
    Route::get('/general', [SettingController::class,'general'])->name('setting.general');
    Route::get('/social', [SettingController::class,'social'])->name('setting.social');
    Route::patch('', [SettingController::class,'update'])->name('setting.update');
    Route::delete('/delete/img/{setting}', [SettingController::class,'destroy'])->name('setting.destroy');
});



Route::prefix('/invoice')->middleware('auth')->group(function (){

    Route::get('/pre/index', [InvoiceController::class,'filter'])->name('preinvoice.filter');
    Route::get('/pre', [InvoiceController::class,'search'])->name('preinvoice.search');
    Route::get('/index', [InvoiceController::class,'index'])->name('invoice.index');
    Route::get('/{invoice}', [InvoiceController::class,'edit'])->name('invoice.edit');
    Route::get('/show/{invoice}', [InvoiceController::class,'show'])->name('invoice.show');
    Route::patch('/{invoice}', [InvoiceController::class,'update'])->name('invoice.update');
    Route::get('/delete/{invoice}', [InvoiceController::class,'destroy'])->name('invoice.destroy');
    Route::post('/store', [InvoiceController::class,'store'])->name('invoice.store');

});

Route::prefix('/payment')->middleware('auth')->group(function (){

    Route::get('/payment/create/{id}',[PaymentController::class ,'create'])->name('payment.create');
    Route::patch('/payment/store',[PaymentController::class ,'store'])->name('payment.store');
    Route::get('/payment/index',[PaymentController::class ,'index'])->name('payment.index');
    Route::get('/payment/edit/{payment}',[PaymentController::class ,'edit'])->name('payment.edit');
    Route::patch('/payment/update/{payment}',[PaymentController::class ,'update'])->name('payment.update');



});

Route::resource('notification', NotifController::class);

Route::prefix('log')->middleware('auth')->group(function (){

    Route::get('/index',[ActivityLogController::class,'index'])->name('log.index');

});

Route::middleware('auth')->group(function ()
{
  Route::resource('surgery', SurgeryController::class);
});



Route::prefix('/report')->middleware('auth')->group(function (){

    Route::get('/invoice',[ReportController::class ,'filter'])->name('report.invoice.filter');
    Route::get('/invoice/index',[ReportController::class ,'invoiceIndex'])->name('report.invoice.index');
    Route::get('/invoice/{invoice}',[ReportController::class ,'invoiceShow'])->name('report.invoice.show');

    Route::get('/insurance',[ReportController::class ,'insuranceFilter'])->name('report.insurance.filter');
    Route::get('/insurance/index',[ReportController::class ,'insuranceIndex'])->name('report.insurance.index');


});

