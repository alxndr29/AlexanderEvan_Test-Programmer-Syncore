<?php

use App\Perdin;
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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'cekadmin'])->group(function () {
    Route::get('admin', 'AdminController@index')->name('admin.index');
    Route::get('admin/search/{id}', 'AdminController@search')->name('admin.search');
});
Route::middleware(['auth', 'cekkandidat'])->group(function () {
    Route::get('kandidat', 'KandidatController@index')->name('kandidat.index');
    Route::post('kandidat/biodata', 'KandidatController@storeBiodata')->name('biodata.store');
    Route::post('kandidat/pendidikan', 'KandidatController@storePendidikan')->name('pendidikan.store');
    Route::post('kandidat/pelatihan', 'KandidatController@storePelatihan')->name('pelatihan.store');
    Route::post('kandidat/pekerjaan', 'KandidatController@storePekerjaan')->name('pekerjaan.store');
});
