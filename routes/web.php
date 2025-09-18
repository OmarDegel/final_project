<?php

use App\Http\Controllers\Dashboard\StorageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Storage;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EnrollementController;

Route::fallback(function () {
    return redirect('/dashboard/home');
});
Route::get('login', [AuthController::class, 'index'])->name('login.view');
Route::get('register', [AuthController::class, 'registerPage'])->name('register.view');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'dashboard'], function () {
    Route::fallback(function () {
        return redirect('/dashboard/home');
    });


    Route::group(['prefix' => 'profile'], function () {
        Route::get('change_lang/{lang}', [ProfileController::class, 'changeLang'])->name('profile.change.lang');
    });
    Route::group(['middleware' => 'check.auth'], function () {
        Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::resource('users', UserController::class)->only(['edit', 'update']);

        Route::group(['middleware' => 'check.auth'], function () {
            Route::group(['middleware' => 'instructor'], function () {
                
            Route::resource('categories', CategoryController::class);
            Route::get('categories/active/{category}', [CategoryController::class, 'categoryActive'])->name('categories.status');

            Route::resource('courses', CourseController::class);
            Route::get('courses/active/{course}', [CourseController::class, 'courseActive'])->name('courses.status');

            Route::resource('enrollements', EnrollementController::class)->only(['index', 'destroy', 'store']);
            });

            Route::resource("storage", StorageController::class)->only(['index', 'destroy']);
        });
    });
});
Route::get('courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('courses/{course}', [HomeController::class, 'show'])->name('course.show')->middleware('check.course');
