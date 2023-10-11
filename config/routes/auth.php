<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\RealEsatateAuthController;
use \App\Http\Controllers\Auth\UserAuthController;

/*----------admin------------*/

Route::group(['prefix'=>'/admin' , 'namespace'=> 'Auth'], function (){

    Route::get('/login' ,[AdminAuthController::class , 'loginForm'])->name('admin.login.form');
    Route::post('/login' ,[AdminAuthController::class , 'login'])->name('admin.login');
    Route::get('/logout' ,[AdminAuthController::class , 'logout'])->name('admin.logout');

    Route::get('/sign-up' ,[AdminAuthController::class , 'signUpForm'])->name('admin.sign-up.form');
    Route::get('/reset-password' ,[AdminAuthController::class , 'resetPassForm'])->name('admin.reset-password.form');
    Route::get('/two-step' ,[AdminAuthController::class , 'twoStepForm'])->name('admin.two-step.form');



});


/*----------real estate------------*/

Route::group(['prefix'=>'/real-estate/{realEstate}' , 'namespace'=> 'Auth'], function (){

    Route::get('/login' ,[RealEsatateAuthController::class , 'login'])->name('real-estate.login');
    Route::get('/logout' ,[RealEsatateAuthController::class , 'logout'])->name('real-estate.logout');



});


/*----------user------------*/

Route::group(['prefix'=>'/user' , 'namespace'=> 'Auth'], function (){

    Route::get('/login' ,[UserAuthController::class , 'loginForm'])->name('user.login.form');
    Route::post('/login' ,[UserAuthController::class , 'login'])->name('user.login');
    Route::get('/logout' ,[UserAuthController::class , 'logout'])->name('user.logout');

    Route::get('/sign-up' ,[UserAuthController::class , 'signUpForm'])->name('user.sign-up.form');
    Route::get('/reset-password' ,[UserAuthController::class , 'resetPassForm'])->name('user.reset-password.form');
    Route::get('/two-step' ,[UserAuthController::class , 'twoStepForm'])->name('user.two-step.form');



});
