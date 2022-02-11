<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkManagementController;
use App\Http\Controllers\RoleMapPageController;

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



 
Route::get('/home',['middleware' => 'auth',WorkManagementController::class, 'index'])->name('home')->middleware('auth');
Route::get('/edit/{id}', [WorkManagementController::class, 'edit'])->name('userData.edit')->middleware('auth');
Route::post('/edit/{id}', [WorkManagementController::class, 'update'])->name('userData.update')->middleware('auth');
Route::get('/delete/{id}', [WorkManagementController::class, 'destroy'])->name('userData.destroy')->middleware('auth');
Route::post('/add', [WorkManagementController::class, 'store'])->name('userData.create')->middleware('auth');
Route::get('/add', [WorkManagementController::class, 'add'])->middleware('auth');

Route::get('/role_map_page', [RoleMapPageController::class, 'index'])->name('roleData.index')->middleware('auth');
Route::get('/addrolemap', [RoleMapPageController::class, 'add'])->middleware('auth');
Route::post('/addrolemap', [RoleMapPageController::class, 'store'])->name('roleData.create')->middleware('auth');
Route::get('/editrole/{id}', [RoleMapPageController::class, 'edit'])->name('roleData.edit')->middleware('auth');
Route::post('/editrole/{id}', [RoleMapPageController::class, 'update'])->name('roleData.update')->middleware('auth');
Route::get('/deleterole/{id}', [RoleMapPageController::class, 'destroy'])->name('roleData.destroy')->middleware('auth');
 

