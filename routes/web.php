<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// admin
// auth
Route::get('/admin', 'AuthAdminController@index')->name('admin');
Route::post('/adminLogin', 'AuthAdminController@login')->name('adminLogin');
Route::group(['middleware' => ['auth' , 'adminMiddleware']], function () {
        // Auth::routes();   
        // logout
        Route::get('/adminLogout', 'AuthAdminController@logout')->name('adminLogout');
        // dashboard
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        // Data siswa
        Route::resource('/student', 'StudentController');
        Route::post('/studentUpdate/{id}', 'StudentController@update');
        Route::get('/deleteStudent/{id}', 'StudentController@destroy');
        Route::get('/student-pdf', 'StudentController@pdf');
        Route::get('/student-pdf-belum', 'StudentController@pdfbelum');
        // kelas
        Route::resource('/classe', 'ClasseController');
        Route::post('/classUpdate/{id}', 'ClasseController@update');
        Route::get('/deleteClass/{id}', 'ClasseController@destroy');
        // Spp
        Route::resource('/spp', 'SppController');
        Route::post('/sppUpdate/{id}', 'SppController@update');
        Route::get('/destroy/{id}', 'SppController@destroy');
        // Payment
        Route::resource('/payment', 'PaymentController');
        Route::post('/sppUpdate/{id}', 'PaymentController@update');
        Route::get('/destroyPayment/{id}', 'PaymentController@destroy');
        Route::post('/storePayment', 'StudentController@storePayment');
        // data petugas
        Route::resource('/officer', 'OfficerController');
        // data admin
        Route::resource('/dataAdmin', 'UserController');
        Route::get('/destroyAdmin/{id}', 'UserController@destroy');
});
// end admin

// petugas
// auth
    Route::get('/petugas', 'AuthPetugasController@index')->name('petugas');
    Route::post('/petugasLogin', 'AuthPetugasController@login')->name('petugasLogin');
// data siswa
    Route::group(['middleware' => ['petugasMiddleware']], function () { 
        Route::get('/petugasLogout', 'AuthPetugasController@logout')->name('petugasLogout');
        Route::resource('/petugasStudent', 'PetugasController');
        Route::post('/storePetugas', 'PetugasController@storePetugas');
        // Route::get('/petugasbayar/{id}', 'PetugasController@show');
});
// end petugas

// siswa
// auth
Route::get('/', function() {
    return view('siswa.login');
});
Route::post('/siswaLogin', 'AuthSiswaController@login')->name('siswaLogin');
Route::group(['middleware' => ['siswaMiddleware']], function () { 
    //data siswa
    Route::get('/siswa', 'AuthSiswaController@index')->name('siswa');
    // logout
    Route::get('/siswaLogout', 'AuthSiswaController@logout')->name('siswaLogout');
});
// end siswa








// Route::get('/pdf', 'pdfController@pdf');


// Route::get('/home', 'HomeController@index')->name('home');
