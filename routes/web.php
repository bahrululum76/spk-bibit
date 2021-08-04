<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes([
    'register' => false
]);

Route::get('/', 'Konsumen\HomeController@index')->name('front.home');
Route::get('/katalog', 'Konsumen\KatalogController@index')->name('katalog');
Route::get('/cari-alternatif', 'Konsumen\CariAlternatifController@index')->name('cari.alt');
Route::post('/cari-alternatif', 'Konsumen\CariAlternatifController@cari')->name('cari.alt.post');


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::resource('/user', 'Admin\UserController');

    Route::resource('/kriteria', 'Admin\KriteriaController')->only('index', 'store', 'update', 'destroy');
    Route::get('/sub-kriteria/{id_kriteria}', 'Admin\SubKriteriaController@get_sub_kriteria')->name('admin.sub-kriteria');
    Route::resource('sub-kriteria', 'Admin\SubKriteriaController')->only('store', 'update', 'destroy');
    Route::resource('peripheral', 'Admin\PeripheralController');

    Route::resource('kategori', 'Admin\KategoriController');
    Route::resource('/data', 'Admin\DataController');
    Route::patch('/update/{id}', 'Admin\DataController@update');
});
Route::get('/home', 'HomeController@index')->name('home');
