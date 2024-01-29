<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\ClassInfoController;
use App\Http\Controllers\AdmissionUserController;
use App\Http\Controllers\AdmissionApplicationController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::controller(StateController::class)->group(function () {
    Route::get('/state', 'index')->name('state.index');
    Route::post('/state', 'insert')->name('state.insert');
    Route::put('/state/{state}', 'update')->name('state.update');
    Route::delete('/state/{state}', 'destroy')->name('state.delete');
});

Route::controller(ReligionController::class)->group(function () {
    Route::get('/religion', 'index')->name('religion.index');
    Route::get('/religion/create', 'create')->name('religion.create');
    Route::get('religion/{id}/edit', 'edit')->name('religion.edit');
    Route::get('/religion/{id}', 'select')->name('religion.select');
    Route::post('/religion/store', 'store')->name('religion.store');
    Route::put('/religion/{religion}', 'update')->name('religion.update');
    Route::delete('/religion/{religion}', 'delete')->name('religion.delete');
    Route::post('/religion/upload', 'storeImage')->name('religion.storeimage');
});

Route::group(['middleware' => ['auth:admission']], function () {
    Route::controller(AdmissionApplicationController::class)->group(function(){
        
        Route::post('/admission/parents','parentsInfo')->name('admission.parents');
        Route::post('/admission/personal','personal')->name('admission.personal');
        Route::post('/admission/upload','uploadDocuments')->name('admission.upload');
        Route::get('/admission/{id}','show')->name('admission.show');
        Route::post('/admission/submit','submit')->name('admission.submit');
    });
});