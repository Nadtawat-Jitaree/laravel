<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\FeaturesController;


Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/create', [PostController::class, 'create'])->name('basic.create');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::get('/show/{post}', [PostController::class, 'show'])->name('basic.show');
Route::get('/edit/{post}', [PostController::class, 'edit'])->name('basic.edit');
Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('delete');

Route::get('/packages', [PackagesController::class, 'index'])->name('packages.index');
Route::get('/packages/create', [PackagesController::class, 'create'])->name('packages.create');
Route::post('/packages/store', [PackagesController::class, 'store'])->name('packages.store');
Route::get('/packages/show/{packages}', [PackagesController::class, 'show'])->name('packages.show');
Route::get('/packages/edit/{packages}', [PackagesController::class, 'edit'])->name('packages.edit');
Route::put('/packages/update/{packages}', [PackagesController::class, 'update'])->name('packages.update');

Route::get('/features/create', [FeaturesController::class, 'create'])->name('features.create');
Route::post('/features/store', [FeaturesController::class, 'store'])->name('features.store');