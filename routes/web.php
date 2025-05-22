<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\AuthController;

Route::middleware('auth')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('basic.create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{post}', 'show')->name('basic.show');
    Route::get('/edit/{post}', 'edit')->name('basic.edit');
    Route::put('/update/{post}', 'update')->name('update');
    Route::delete('/delete/{post}', 'destroy')->name('delete');

});

Route::middleware('auth')->controller(PackagesController::class)->group(function () {
    Route::get('/packages', 'index')->name('packages.index');
    Route::get('/packages/create', 'create')->name('packages.create');
    Route::post('/packages/store', 'store')->name('packages.store');
    Route::get('/packages/show/{packages}', 'show')->name('packages.show');
    Route::get('/packages/edit/{packages}', 'edit')->name('packages.edit');
    Route::put('/packages/update/{packages}', 'update')->name('packages.update');
});

Route::middleware('auth')->controller(FeaturesController::class)->group(function () {
    Route::get('/features/create', 'create')->name('features.create');
    Route::post('/features/store', 'store')->name('features.store');
    Route::post('/features/storeMultiple', 'storeMultiple')->name('features.storeMultiple');

});

Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');