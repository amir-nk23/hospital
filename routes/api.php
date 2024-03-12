<?php


use App\Http\Controllers\Api\Doctor\AuthController;
use App\Http\Controllers\Api\Surgry\SurgeryController;
use Illuminate\Support\Facades\Route;


Route::name('api')->prefix('doctor')->middleware('guest')->group(function (){

    Route::post('/login',[AuthController::class,'login'])->name('doctor.login');
});

Route::name('api')->prefix('doctor')->middleware('auth:doctor-api')->group(function (){

    Route::post('/logout',[AuthController::class,'logout'])->name('doctor.logout');
});

Route::name('api')->prefix('doctor')->middleware('auth:doctor-api')->group(function (){

    Route::get('/surgeries',[SurgeryController::class,'index'])->name('doctor.logout');
});
