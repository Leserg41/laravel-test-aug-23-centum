<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', [App\Http\Controllers\LinkController::class, 'add'])->name('add');
Route::get('/{link}', [App\Http\Controllers\LinkController::class, 'link'])->name('link');
Route::post('/add-handler', [App\Http\Controllers\LinkController::class, 'addHandler'])->name('addHandler');
