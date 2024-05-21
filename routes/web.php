<?php

use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\AssistanceHistoryController;
use App\Http\Controllers\CropTypeController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\FarmerTypeController;
use App\Models\assistance;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});

//farmers
Route::prefix('farmers')->group(function()
{
    Route::get('/index', [FarmerController::class,'index'])->name('farmers.index');
    Route::get('/create', [FarmerController::class,'create'])->name('farmers.create');
    Route::post('/store', [FarmerController::class,'store'])->name('farmers.store');
    Route::get('/{id}/edit', [FarmerController::class,'edit'])->name('farmers.edit');
    Route::match(['put', 'get'],'/{id}/update', [FarmerController::class,'update'])->name('farmers.update');
    Route::match(['delete', 'get'],'/{id}/destroy', [FarmerController::class,'destroy'])->name('farmers.destroy');
    Route::get('/{id}/show', [FarmerController::class,'show'])->name('farmers.show');
});

//farms
Route::prefix('farms')->group(function()
{
    Route::get('/index', [FarmController::class,'index'])->name('farms.index');
    Route::get('/create', [FarmController::class, 'create'])->name('farms.create');
    Route::post('/store', [FarmController::class,'store'])->name('farms.store');
    Route::get('/{id}/edit', [FarmController::class,'edit'])->name('farms.edit');
    Route::match(['put','get'],'/{id}/update', [FarmController::class,'update'])->name('farms.update');
    Route::match(['delete', 'get'], '/{id}/destroy', [FarmController::class,'destroy'])->name('farms.destroy');
    });

//assistances
Route::prefix('assistances')->group(function()
{
    Route::get('/index', [AssistanceController::class,'index'])->name('assistances.index');
    Route::get('/create', [AssistanceController::class,'create'])->name('assistances.create');
    Route::post('/store', [AssistanceController::class,'store'])->name('assistances.store');
    Route::get('/{id}/edit', [AssistanceController::class,'edit'])->name('assistances.edit');
    Route::match(['put','get'],'/{id}/update', [AssistanceController::class,'update'])->name('assistances.update');
    Route::match(['delete', 'get'], '/{id}/destroy', [AssistanceController::class,'destroy'])->name('assistances.destroy');
});


//crop types
Route::prefix('/croptypes')->group(function()
{
    Route::get('/index', [CropTypeController::class,'index'])->name('croptypes.index');
    Route::get('/create', [CropTypeController::class,'create'])->name('croptypes.create');
    Route::post('/store', [CropTypeController::class,'store'])->name('croptypes.store');
    Route::get('/{id}/edit', [CropTypeController::class,'edit'])->name('croptypes.edit');
    Route::match(['put','get'],'/{id}/update', [CropTypeController::class,'update'])->name('croptypes.update');
    Route::match(['delete', 'get'], '/{id}/destroy', [CropTypeController::class,'destroy'])->name('croptypes.destroy');
});


//farmer types
Route::prefix('/farmertypes')->group(function()
{
    Route::get('/index', [FarmerTypeController::class,'index'])->name('farmertypes.index');
    Route::get('/create', [FarmerTypeController::class,'create'])->name('farmertypes.create');
    Route::post('/store', [FarmerTypeController::class,'store'])->name('farmertypes.store');
    Route::get('/{id}/edit', [FarmerTypeController::class,'edit'])->name('farmertypes.edit');
    Route::match(['put','get'],'/{id}/update', [FarmerTypeController::class,'update'])->name('farmertypes.update');
    Route::match(['delete','get'],'/{id}/destroy', [FarmerTypeController::class,'destroy'])->name('farmertypes.destroy');
});

//assistance history
Route::prefix('/histories')->group(function()
{
    Route::get('/index', [AssistanceHistoryController::class,'index'])->name('histories.index');
    Route::get('/create', [AssistanceHistoryController::class,'create'])->name('histories.create');
    Route::post('/store', [AssistanceHistoryController::class,'store'])->name('histories.store');
    Route::get('/{id}/edit', [AssistanceHistoryController::class,'edit'])->name('histories.edit');
    Route::match(['put','get'],'/{id}/update', [AssistanceHistoryController::class,'update'])->name('histories.update');
    Route::match(['delete','get'],'/{id}/destroy', [AssistanceHistoryController::class,'destroy'])->name('histories.destroy');
});
