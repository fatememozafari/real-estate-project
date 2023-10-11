<?php

use App\Http\Controllers\RealEstate\DashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RealEstate\LocationsController;
use \App\Http\Controllers\RealEstate\StaffsController;
use App\Http\Controllers\RealEstate\UsersController;
use App\Http\Controllers\RealEstate\RealEstatesController;
use App\Http\Controllers\RealEstate\RequestsController;
use App\Http\Controllers\RealEstate\RequestDetailsController;

Route::group(['prefix' => 'real-estate/{realEstate}', 'middleware' => 'checkManager'], function () {

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('real-estate.dashboard');

    //real-estates
    Route::group(['prefix' => 'real-estates'], function () {

        Route::get('/', [RealEstatesController::class, 'index'])->name('real-estate.real-estates.all');
        Route::get('/show', [RealEstatesController::class, 'show'])->name('real-estate.real-estates.show');
        Route::get('/edit', [RealEstatesController::class, 'edit'])->name('real-estate.real-estates.edit');
        Route::post('/update', [RealEstatesController::class, 'update'])->name('real-estate.real-estates.update');

    });

    //staffs
    Route::group(['prefix' => 'staffs'], function () {

        Route::get('/', [StaffsController::class, 'index'])->name('real-estate.staffs.all');
        Route::get('/create', [StaffsController::class, 'create'])->name('real-estate.staffs.create');
        Route::post('/store', [StaffsController::class, 'store'])->name('real-estate.staffs.store');
        Route::get('/delete/{staff}', [StaffsController::class, 'delete'])->name('real-estate.staffs.delete');
        Route::get('/ajax-search', [StaffsController::class, 'ajaxSearch'])->name('real-estate.staffs.ajax-search');

    });

    //locations
    Route::group(['prefix' => 'locations'], function () {

        Route::get('/', [LocationsController::class, 'index'])->name('real-estate.locations.all');
        Route::get('/create', [LocationsController::class, 'create'])->name('real-estate.locations.create');
        Route::post('/store', [LocationsController::class, 'store'])->name('real-estate.locations.store');
        Route::get('/show/{location}', [LocationsController::class, 'show'])->name('real-estate.locations.show');
        Route::get('/edit/{location}', [LocationsController::class, 'edit'])->name('real-estate.locations.edit');
        Route::post('/update/{location}', [LocationsController::class, 'update'])->name('real-estate.locations.update');
        Route::get('/delete/{location}', [LocationsController::class, 'delete'])->name('real-estate.locations.delete');
        Route::get('/ajax-search', [LocationsController::class, 'ajaxSearch'])->name('real-estate.locations.ajax-search');
    });

    //requests
    Route::group(['prefix' => 'requests'], function () {

        Route::get('/', [RequestsController::class, 'index'])->name('real-estate.requests.all');
        Route::get('/create', [RequestsController::class, 'create'])->name('real-estate.requests.create');
        Route::post('/store', [RequestsController::class, 'store'])->name('real-estate.requests.store');
        Route::get('/delete/{request}', [RequestsController::class, 'delete'])->name('real-estate.requests.delete');
        Route::get('/ajax-search', [RequestsController::class, 'ajaxSearch'])->name('real-estate.requests.ajax-search');
    });

    //request-details
    Route::group(['prefix' => 'request-details'], function () {

        Route::get('show/{requestDetail}', [RequestDetailsController::class, 'show'])->name('real-estate.request-details.show');
        Route::get('/edit/{requestDetail}', [RequestDetailsController::class, 'edit'])->name('real-estate.request-details.edit');
        Route::post('/update/{requestDetail}', [RequestDetailsController::class, 'update'])->name('real-estate.request-details.update');
        Route::get('/delete/{requestDetail}', [RequestDetailsController::class, 'delete'])->name('real-estate.request-details.delete');
        Route::get('/ajax-search', [RequestDetailsController::class, 'ajaxSearch'])->name('real-estate.request-details.ajax-search');
    });

    //Users
    Route::group(['prefix' => 'users'], function () {

        Route::get('/create', [UsersController::class, 'create'])->name('real-estate.users.create');
        Route::post('/store', [UsersController::class, 'store'])->name('real-estate.users.store');
        Route::get('/show/{user}', [UsersController::class, 'show'])->name('real-estate.users.show');
        Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('real-estate.users.edit');
        Route::post('/update/{user}', [UsersController::class, 'update'])->name('real-estate.users.update');

        Route::get('/ajax-search', [UsersController::class, 'ajaxSearch'])->name('real-estate.users.ajax-search');

    });

});
