<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('categories', [CategoryController::class, 'index'])->name('index');
Route::get('/create', [CategoryController::class,'create'])->name('create');


Route::post('/create', [CategoryController::class,'store'])->name('store');


Route::get('categories/{id}/edit',[CategoryController::class,'edit']);

Route::put('categories/{id}/edit',[CategoryController::class,'update']);

Route::get('categories/{id}/delete',[CategoryController::class,'destroy']);
