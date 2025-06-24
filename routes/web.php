<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/registration', [IndexController::class, 'registration'])->name('registration');
Route::post('/registration', [IndexController::class, 'registerUser'])->name('register-user');
Route::get('/auth', [IndexController::class, 'auth'])->name('login');
Route::post('/auth', [IndexController::class, 'authUser'])->name('login-user');

Route::get('/logout', [IndexController::class, 'logout'])->name('logout');

Route::prefix('/rubrics/{rubrics_id}')->group(function () {
    Route::get('/', [IndexController::class, 'rubrika'])->where('rubrics_id', '[0-9]+')->name('rubrika');
    Route::get('/{post_id}', [IndexController::class, 'statya'])->where(['rubrics_id', '[0-9]+', 'post_id', '[0-9]+'])->name('statya');
    Route::delete('/{post_id}', [AdminController::class, 'destroy'])->middleware('auth', 'admin')->where(['rubrics_id', '[0-9]+', 'post_id', '[0-9]+'])->name('delete');
});

Route::get('/create', [AdminController::class, 'create'])->middleware('auth', 'admin')->name('create');
Route::post('/create', [AdminController::class, 'store'])->middleware('auth', 'admin')->name('store');

Route::get('/rubric', [AdminController::class, 'createRubric'])->middleware('auth', 'admin')->name('create-rubric');
Route::post('/rubric', [AdminController::class, 'storeRubric'])->middleware('auth', 'admin')->name('store-rubric');
