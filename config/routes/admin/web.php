<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsersController;
use \App\Http\Controllers\Admin\EmployeesController;
use \App\Http\Controllers\Admin\RealEstatesController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\RequestsController;
use App\Http\Controllers\Admin\RequestDetailsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionsController;
use \App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StaffsController;
use App\Http\Controllers\Admin\LocationsController;

Route::group(['middleware' => 'auth.admin', 'namespace' => 'Auth'], function () {

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    //admins
    Route::group(['prefix' => 'admins'], function () {

        Route::get('/', [AdminsController::class, 'index'])->name('admin.admins.all');
        Route::get('/create', [AdminsController::class, 'create'])->name('admin.admins.create');
        Route::post('/store', [AdminsController::class, 'store'])->name('admin.admins.store');
        Route::get('/show/{admin}', [AdminsController::class, 'show'])->name('admin.admins.show');
        Route::get('/edit/{admin}', [AdminsController::class, 'edit'])->name('admin.admins.edit');
        Route::post('/update/{admin}', [AdminsController::class, 'update'])->name('admin.admins.update');
        Route::get('/delete/{admin}', [AdminsController::class, 'delete'])->name('admin.admins.delete'); // Route Model Binding
        Route::get('/ajax-search', [AdminsController::class, 'ajaxSearch'])->name('admin.admins.ajax-search');

    });

    // Users
    Route::group(['prefix' => 'users'], function () {

        Route::get('/', [UsersController::class, 'index'])->name('admin.users.all');
        Route::get('/create', [UsersController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UsersController::class, 'store'])->name('admin.users.store');
        Route::get('/show/{user}', [UsersController::class, 'show'])->name('admin.users.show');
        Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{user}', [UsersController::class, 'update'])->name('admin.users.update');
        Route::get('/delete/{user}', [UsersController::class, 'delete'])->name('admin.users.delete');
        Route::get('/ajax-search', [UsersController::class, 'ajaxSearch'])->name('admin.users.ajax-search');

    });

    // staffs
    Route::group(['prefix' => 'staffs'], function () {
        Route::get('/', [StaffsController::class, 'index'])->name('admin.staffs.all');
        Route::get('/create/{realEstate}', [StaffsController::class, 'create'])->name('admin.staffs.create');
        Route::post('/store/{realEstate}', [StaffsController::class, 'store'])->name('admin.staffs.store');
        Route::get('/delete/{realEstate}/{staff}', [StaffsController::class, 'delete'])->name('admin.staffs.delete');
        Route::get('/ajax-search', [StaffsController::class, 'ajaxSearch'])->name('admin.staffs.ajax-search');
    });

    // real-estates
    Route::group(['prefix' => 'real-estates'], function () {

        Route::get('/', [RealEstatesController::class, 'index'])->name('admin.real-estates.all');
        Route::get('/create', [RealEstatesController::class, 'create'])->name('admin.real-estates.create');
        Route::post('/store', [RealEstatesController::class, 'store'])->name('admin.real-estates.store');
        Route::get('/show/{realEstate}', [RealEstatesController::class, 'show'])->name('admin.real-estates.show');
        Route::get('/edit/{realEstate}', [RealEstatesController::class, 'edit'])->name('admin.real-estates.edit');
        Route::post('/update/{realEstate}', [RealEstatesController::class, 'update'])->name('admin.real-estates.update');
        Route::get('/delete/{realEstate}', [RealEstatesController::class, 'delete'])->name('admin.real-estates.delete');
        Route::get('/ajax-search', [RealEstatesController::class, 'ajaxSearch'])->name('admin.real-estates.ajax-search');
        Route::get('/staff-list/{realEstate}', [RealEstatesController::class, 'staffList'])->name('admin.real-estates.staffList');


        // locations
        Route::group(['prefix' => '/{realEstate}/locations'], function () {

            Route::get('/', [LocationsController::class, 'index'])->name('admin.locations.all');

            Route::get('/create', [LocationsController::class, 'create'])->name('admin.locations.create');
            Route::post('/store', [LocationsController::class, 'store'])->name('admin.locations.store');
            Route::get('/show/{location}', [LocationsController::class, 'show'])->name('admin.locations.show');
            Route::get('/edit/{location}', [LocationsController::class, 'edit'])->name('admin.locations.edit');
            Route::post('/update/{location}', [LocationsController::class, 'update'])->name('admin.locations.update');
            Route::get('/delete/{location}', [LocationsController::class, 'delete'])->name('admin.locations.delete');
            Route::get('/ajax-search', [LocationsController::class, 'ajaxSearch'])->name('admin.locations.ajax-search');
        });


    });

    // locations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('/list', [LocationsController::class, 'list'])->name('admin.locations.list');
    });


    //permissions
    Route::group(['prefix' => 'permissions'], function () {

        Route::get('/', [PermissionsController::class, 'index'])->name('admin.permissions.all');
        Route::get('/create', [PermissionsController::class, 'create'])->name('admin.permissions.create');
        Route::post('/store', [PermissionsController::class, 'store'])->name('admin.permissions.store');
        Route::get('/delete', [PermissionsController::class, 'delete'])->name('admin.permissions.delete');

        Route::get('give-permission-to-admin/{admin}', [PermissionsController::class, 'givePermissionToAdmin'])->name('admin.give.permissions');
        Route::post('give-permission-to-admin/{admin}', [PermissionsController::class, 'givePermissionToAdminStore'])->name('admin.give.permission.store');
        Route::post('remove-permission-from-admin/{admin}', [PermissionsController::class, 'removePermission'])->name('admin.remove.permission');
        Route::post('refresh-permission-admin/{admin}', [PermissionsController::class, 'refreshPermission'])->name('admin.refresh.permission');
        Route::post('has-permission', [PermissionsController::class, 'hasPermission'])->name('admin.has.permission');
        Route::get('/ajax-permission', [PermissionsController::class, 'ajaxPermission'])->name('admin.ajax-permission');
        Route::get('/ajax-has-permission', [PermissionsController::class, 'ajaxHasPermission'])->name('admin.ajax.has.permission');


    });


    //roles
    Route::group(['prefix' => 'roles'], function () {

        Route::get('/', [RolesController::class, 'index'])->name('admin.roles.all');
        Route::get('/create', [RolesController::class, 'create'])->name('admin.roles.create');
        Route::post('/store', [RolesController::class, 'store'])->name('admin.roles.store');
        Route::get('/delete', [RolesController::class, 'delete'])->name('admin.roles.delete');

        Route::post('give-role-to-admin/{admin}', [RolesController::class, 'giveRoleToUserStore'])->name('admin.give.role.store');
        Route::post('remove-role-from-admin/{admin}', [RolesController::class, 'removeRole'])->name('admin.remove.role');
        Route::post('refresh-role-admin/{admin}', [RolesController::class, 'refreshRole'])->name('admin.refresh.role');
        Route::post('has-role', [RolesController::class, 'hasRole'])->name('admin.has.role');
        Route::get('/ajax-role', [RolesController::class, 'ajaxRole'])->name('admin.ajax-role');

    });
});

