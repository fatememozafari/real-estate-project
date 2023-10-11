<?php

use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UsersController;


Route::group(['prefix' => 'user/{user}','middleware' => 'auth'], function () {

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    Route::get('/show', [UsersController::class, 'show'])->name('user.users.show');
    Route::get('/edit', [UsersController::class, 'edit'])->name('user.users.edit');
    Route::post('/update', [UsersController::class, 'update'])->name('user.users.update');
    Route::get('/ajax-search', [UsersController::class, 'ajaxSearch'])->name('user.users.ajax-search');


});
