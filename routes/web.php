<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
