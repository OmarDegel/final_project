<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::fallback(function () {
    return redirect('/dashboard/home');
});
Route::group(['prefix' => 'dashboard'], function () {
    Route::fallback(function () {
        return redirect('/dashboard/home');
    });
    Route::get('login', [AuthController::class, 'index'])->name('login.view');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout')->middleware('check.admin');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('change_lang/{lang}', [ProfileController::class, 'changeLang'])->name('profile.change.lang');
    });
    Route::group(['middleware' => 'check.admin'], function () {
        Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('users', UserController::class);
        Route::get('users/active/{user}', [UserController::class, 'userActive'])->name('users.status');


        Route::resource('categories', CategoryController::class);
        Route::get('categories/active/{category}', [CategoryController::class, 'categoryActive'])->name('categories.status');
    });
});
