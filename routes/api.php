<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IconsController;
use App\Models\User;

Route::group(['prefix'=>'api'],function(){
    Route::post('/auth/check', [AuthController::class, 'login'])->name("check-api");
    Route::post('/icon/check', [IconsController::class, 'nameckeck'])->name("icon.name.ckeck");
     
    
    
})

?>