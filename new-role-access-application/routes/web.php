<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkManagementController;

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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [WorkManagementController::class, 'index'])->name('home');
Route::get('/edit/{id}', [WorkManagementController::class, 'edit'])->name('userData.edit');
Route::post('/edit/{id}', [WorkManagementController::class, 'update'])->name('userData.update');
Route::get('/delete/{id}', [WorkManagementController::class, 'destroy'])->name('userData.destroy');
Route::post('/add', [WorkManagementController::class, 'store'])->name('userData.create');
Route::get('/add', [WorkManagementController::class, 'add']);
