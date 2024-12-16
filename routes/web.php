<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthentificationController;
use App\Http\Controllers\Auth\RegisterContoller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthentificationController::class, 'create'])->name('login');
Route::post('/login', [AuthentificationController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterContoller::class, 'create'])->name('register');
Route::post('/register', [RegisterContoller::class, 'store'])->name('register.store');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [CourseController::class, 'index'])->name('dashboard');
    Route::name('course.')->group(function () {
        Route::get('cours/ajouter', [CourseController::class, 'create'])->name('create');
        Route::post('cours/ajouter', [CourseController::class, 'store'])->name('store');
        Route::get('cours/{course}', [CourseController::class, 'show'])->name('show');
        Route::get('cours/{course}/modifier', [CourseController::class, 'edit'])->name('edit');
        Route::put('cours/{course}/modifier', [CourseController::class, 'update'])->name('update');
        Route::delete('cours/{course}/supprimer', [CourseController::class, 'delete'])->name('delete');
    });
    Route::name('category.')->group(function () {
        Route::get('categories', [CategoryController::class, 'index'])->name('index');
        Route::get('categories/ajouter', [CategoryController::class, 'create'])->name('create');
        Route::post('categories/ajouter', [CategoryController::class, 'store'])->name('store');
        Route::get('categories/{category}', [CategoryController::class, 'show'])->name('show');
        Route::get('categories/{category}/modifier', [CategoryController::class, 'edit'])->name('edit');
        Route::put('categories/{category}/modifier', [CategoryController::class, 'update'])->name('update');
        Route::delete('categories/{category}/supprimer', [CategoryController::class, 'delete'])->name('delete');
    });
    Route::name('profile.')->group(function () {
        Route::get('profil', [ProfileController::class, 'edit'])->name('edit');
        Route::put('profil', [ProfileController::class, 'update'])->name('update');
        Route::post('logout', [ProfileController::class, 'logout'])->name('logout');
    });
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        });
    });
});