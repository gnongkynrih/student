<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\ClassInfoController;
use App\Http\Controllers\AdmissionUserController;


Route::get('/', function () {
    return view('welcome');
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
Route::controller(ClassInfoController::class)->group(function () {
    Route::get('/classinfo', 'index')->name('classinfo.index');
    Route::get('/classinfo/create', 'insert')->name('classinfo.insert');
    Route::post('/classinfo', 'create')->name('classinfo.create');
    Route::get('/classinfo/{id}/edit', 'edit')->name('classinfo.edit');
    Route::put('/classinfo/{classInfo}', 'update')->name('classinfo.update');
    Route::delete('/classinfo/{clsinfo}', 'delete')->name('classinfo.delete');
});

Route::controller(AdmissionUserController::class)->group(function(){
    Route::post('/admission/register','register')->name('admission.register');
    Route::get('/admission/login','loginpage')->name('admission.loginpage');
    Route::post('/admission/login','login')->name('admission.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
