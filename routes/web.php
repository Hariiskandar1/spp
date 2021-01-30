<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

// admin
// dashboard
Route::get('/admin', 'DashboardController@index')->name('admin');
// Data siswa
Route::resource('/student', 'StudentController');
// kelas
Route::resource('/classe', 'ClasseController');
// Spp
Route::resource('/spp', 'SppController');
Route::post('/spp/{$id}', 'SppController@update');
Route::get('/destroy/{id}', 'SppController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
