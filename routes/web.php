<?php

use Illuminate\Support\Facades\Route;

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
//Route::get('/admin/dashboard', [ \App\Http\Controllers\Admin\DashboardController::class, 'index' ])->name('admin.dashboard');



use App\Http\Controllers\RealEstate\UsersController;
use \App\Http\Controllers\RealEstate\StaffsController;
use \App\Http\Controllers\RealEstate\RealEstatesController;
use \App\Http\Controllers\RealEstate\DashboardsController;
use App\Http\Controllers\RealEstate\AdminsController;
use App\Http\Controllers\RealEstate\RequestsController;
use App\Http\Controllers\RealEstate\RequestDetailsController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/file', function () {
    return view('file');
});


//admin
Route::group(['prefix' => 'admin'], function (){

    Route::get('/', [ AdminsController::class, 'index' ])->name('real-estates.admin.all');
    Route::get('/create', [ AdminsController::class, 'create' ])->name('real-estates.admin.create');
    Route::post('/store', [ AdminsController::class, 'store' ])->name('real-estates.admin.store');
    Route::get('/edit/{admin}', [ AdminsController::class, 'edit' ])->name('real-estates.admin.edit');
    Route::post('/update/{admin}', [ AdminsController::class, 'update' ])->name('real-estates.admin.update');
    Route::get('/delete', [ AdminsController::class, 'delete' ])->name('real-estates.admin.delete');
    Route::get('/ajax-search', [ AdminsController::class, 'ajaxSearch' ])->name('real-estates.admin.ajax-search');

});





// real-estates
Route::group(['prefix' => 'real-estates'], function (){

    Route::get('/', [ RealEstatesController::class, 'index' ])->name('real-estates.real-estates.all');
    Route::get('/create', [ RealEstatesController::class, 'create' ])->name('real-estates.real-estates.create');
    Route::post('/store', [ RealEstatesController::class, 'store' ])->name('real-estates.real-estates.store');
    Route::get('/edit/{real-estates}', [ RealEstatesController::class, 'edit' ])->name('real-estates.real-estates.edit');
    Route::post('/update/{real-estates}', [ RealEstatesController::class, 'update' ])->name('real-estates.real-estates.update');
    Route::post('/delete/{real-estates}', [ RealEstatesController::class, 'delete' ])->name('real-estates.real-estates.delete');
    Route::get('/ajax-search', [ RealEstatesController::class, 'ajaxSearch' ])->name('real-estates.real-estates.ajax-search');

});



