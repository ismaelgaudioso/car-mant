<?php

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



Route::resource('admin/user', App\Http\Controllers\Admin\UserController::class)->middleware(['auth', 'verified']);
Route::resource('admin/car', App\Http\Controllers\Admin\CarController::class)->middleware(['auth', 'verified']);
Route::resource(
    'admin/maintenance',
    App\Http\Controllers\Admin\MaintenanceController::class,
    [
        'names' => [
            'index' => 'admin/maintenance.index',
            'show' => 'admin/maintenance.show',
            'store' => 'admin/maintenance.store',
            'create' => 'admin/maintenance.create',
            'update' => 'admin/maintenance.update',
            'destroy' => 'admin/maintenance.destroy',
            'edit' => 'admin/maintenance.edit'
        ]
    ]
)->middleware(['auth', 'verified']);
Route::resource(
    'admin/insurance',
    App\Http\Controllers\Admin\InsuranceController::class,
    [
        'names' => [
            'index' => 'admin/insurance.index',
            'show' => 'admin/insurance.show',
            'store' => 'admin/insurance.store',
            'create' => 'admin/insurance.create',
            'update' => 'admin/insurance.update',
            'destroy' => 'admin/insurance.destroy',
            'edit' => 'admin/insurance.edit'
        ]
    ]
)->middleware(['auth', 'verified']);





Route::resource('maintenance', App\Http\Controllers\MaintenanceController::class)->middleware(['auth', 'verified']);
Route::resource('insurance', App\Http\Controllers\InsuranceController::class)->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
