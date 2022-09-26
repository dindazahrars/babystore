<?php

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

use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');
Route::resource('pelanggan','PelangganController');
Route::resource('barang','BarangController');
Route::resource('order','OrderController');
Route::resource('transaksi','TransaksiController');

Route::post('/laporan/create', [LaporanController::class, 'create']);
Route::get('laporan', [LaporanController::class, 'index']);
Route::get('/laporan/print', [LaporanController::class, 'print']);
Route::get('/laporan/export_excel', 'LaporanController@export_excel');

