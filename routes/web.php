<?php

use App\Models\City;
use App\Models\Farm;
use App\Models\Farmer;
use App\Models\CropType;
use App\Models\assistance;
use App\Models\FarmerType;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\AssistanceHistory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\CropTypeController;
use App\Http\Controllers\CityTotalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\FarmerTypeController;
use App\Http\Controllers\AssistanceHistoryController;

//users
Route::get('/', function () {
    return view('login');
})->name('login');

Route::controller(UserController::class)->group(function () {
    Route::get('/logging', 'logging')->name('');
    Route::get('/register', 'register')->name('');
    Route::post('/registration', 'registration')->name('');
    Route::get('/logout', 'logout')->name('');
});

//dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('user')->name('dashboard');

//farmers
Route::middleware('user')->prefix('farmers')->controller(FarmerController::class)->group(function () {
    Route::get('/index', 'index')->name('farmers.index');
    Route::get('/{id}/report', 'report')->name('farmers.report');
    Route::get('/create', 'create')->name('farmers.create');
    Route::post('/store', 'store')->name('farmers.store');
    Route::get('/{id}/edit', 'edit')->name('farmers.edit');
    Route::match(['put', 'get'], '/{id}/update', 'update')->name('farmers.update');
    Route::match(['delete', 'get'], '/{id}/destroy', 'destroy')->name('farmers.destroy');
    Route::get('/{id}/show', 'show')->name('farmers.show')->name('farmers.show');
    Route::get('/{id}/pdf', 'pdf')->name('farmers.pdf');
});

//farms
Route::middleware('user')->prefix('farms')->controller(FarmController::class)->group(function () {
    Route::get('/index', 'index')->name('farms.index');
    Route::get('/create', 'create')->name('farms.create');
    Route::post('/store', 'store')->name('farms.store');
    Route::get('/{id}/edit', 'edit')->name('farms.edit');
    Route::match(['put', 'get'], '/{id}/update', 'update')->name('farms.update');
    Route::match(['delete', 'get'], '/{id}/destroy', 'destroy')->name('farms.destroy');
});

//assistances
Route::middleware('user')->prefix('assistances')->controller(AssistanceController::class)->group(function () {
    Route::any('/index', 'index')->name('assistances.index');
    Route::any('/{id}/report', 'report')->name('assistances.report');
    Route::get('/create', 'create')->name('assistances.create');
    Route::post('/store', 'store')->name('assistances.store');
    Route::get('/{id}/edit', 'edit')->name('assistances.edit');
    Route::match(['put', 'get'], '/{id}/update', 'update')->name('assistances.update');
    Route::match(['delete', 'get'], '/{id}/destroy', 'destroy')->name('assistances.destroy');
});


//crop types
Route::middleware('user')->prefix('/croptypes')->controller(CropTypeController::class)->group(function () {
    Route::get('/index', 'index')->name('croptypes.index');
    Route::get('/create', 'create')->name('croptypes.create');
    Route::post('/store', 'store')->name('croptypes.store');
    Route::get('/{id}/edit', 'edit')->name('croptypes.edit');
    Route::match(['put', 'get'], '/{id}/update', 'update')->name('croptypes.update');
    Route::match(['delete', 'get'], '/{id}/destroy', 'destroy')->name('croptypes.destroy');
});


//farmer types
Route::middleware('user')->prefix('/farmertypes')->controller(FarmerTypeController::class)->group(function () {
    Route::get('/index', 'index')->name('farmertypes.index');
    Route::get('/create', 'create')->name('farmertypes.create');
    Route::post('/store', 'store')->name('farmertypes.store');
    Route::get('/{id}/edit', 'edit')->name('farmertypes.edit');
    Route::match(['put', 'get'], '/{id}/update', 'update')->name('farmertypes.update');
    Route::match(['delete', 'get'], '/{id}/destroy', 'destroy')->name('farmertypes.destroy');
});

//assistance history
Route::middleware('user')->prefix('/histories')->controller(AssistanceHistoryController::class)->group(function () {
    Route::get('/index', 'index')->name('histories.index');
    Route::get('/create', 'create')->name('histories.create');
    Route::post('/store', 'store')->name('histories.store');
    Route::get('/{id}/edit', 'edit')->name('histories.edit');
    Route::match(['put', 'get'], '/{id}/update', 'update')->name('histories.update');
    Route::match(['delete', 'get'], '/{id}/destroy', 'destroy')->name('histories.destroy');
});

//cities
Route::middleware('user')->prefix('/cities')->controller(CityController::class)->group(function () {
    Route::get('/index', 'index')->name('cities.index');
    Route::get('/create', 'create')->name('cities.create');
    Route::any('/store', 'store')->name('cities.store');
    Route::get('/{id}/edit', 'edit')->name('cities.edit');
    Route::match(['put', 'get'], '/{id}/update', 'update')->name('cities.update');
    Route::match(['delete', 'get'], '/{id}/destroy', 'destroy')->name('cities.destroy');

});

Route::middleware('user')->prefix('/totalcities')->controller(CityTotalController::class)->group(function () {
    Route::get('/{id}/farms/index', 'farms')->name('citiestotal.farms');
    Route::get('/{id}/farmers/index', 'farmers')->name('citiestotal.farmers');
    Route::get('/{id}/histories/index', 'histories')->name('citiestotal.histories');


});
Route::middleware('admin')->prefix('/superadmin')->controller(AdminController::class)->group(function()
{
    Route::get('/dashboard', 'dashboard')->name('superadmin.index');
});
