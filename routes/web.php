<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\ClassInfoController;
use App\Http\Controllers\AdmissionUserController;
use App\Http\Controllers\AdmissionPaymentController;
use App\Http\Controllers\AdmissionApplicationController;


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
    Route::get('/admission/registrationcomplete','registrationcomplete')->name('admission.registrationcomplete');
    Route::get('/registration/verification/{token}/{email}','verifyemail')->name('admission.verifyemail');
    Route::get('/admission/register','registration')->name('admission.registration');
    Route::post('/admission/register','register')->name('admission.register');
    Route::get('/admission/login','loginpage')->name('admission.loginpage');
    Route::post('/admission/login','login')->name('admission.login');
    Route::get('/admission/thankyou','thankyou')->name('admission.thankyou');
});
Auth::routes();

Route::controller(AdmissionApplicationController::class)->group(function(){
    Route::get('/admission/dashboard','dashboard')->name('admission.dashboard');
    Route::get('/admission/parents','family')->name('admission.parents');
    Route::put('/admission/parents','parentsInfo')->name('admission.parentsinfo');
    Route::get('/admission/editparents/{applicant}','editparents')->name('admission.editparents');
    Route::get('/admission/editpersonal/{applicant}','editpersonal')->name('admission.editpersonal');
    Route::put('/admission/updatepersonal/{applicant}','updatepersonal')->name('admission.updatepersonal');
    Route::get('/admission/personal','getPersonalInfo')->name('admission.getpersonalinfo');
    Route::post('/admission/personal','personal')->name('admission.personal');
    Route::get('/admission/documents','documents')->name('admission.documents');
    Route::post('/admission/upload','uploadDocuments')->name('admission.upload');
    
    Route::get('/admission/preview','preview')->name('admission.preview');
    Route::post('/admission/submit','submit')->name('admission.submit');
    Route::get('/admission/{id}','show')->name('admission.show');
});


Route::controller(AdmissionPaymentController::class)->group(function(){
    Route::get('/admissionpayment/create', 'create')->name('admissionpayment.create');
    Route::post('/admissionpayment/processpayment', 'processPayment')->name('admissionpayment.processpayment');
    Route::get('/admissionpayment/razor-thank-you', 'RazorThankYou')->name('admissionpayment.razorthankyou');
    Route::get('/admissionpayment/downloadreceipt/{id}', 'downloadReceipt')->name('admissionpayment.downloadreceipt');
  });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
