<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('admin/car',App\Http\Controllers\Admin\CarController::class)->middleware(['auth', 'verified']);

Route::resource('maintenance',MaintenanceController::class)->middleware(['auth', 'verified']);
Route::resource('insurance',InsuranceController::class)->middleware(['auth', 'verified']);
Route::resource('user',UserController::class)->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
