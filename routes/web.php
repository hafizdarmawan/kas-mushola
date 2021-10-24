<?php

use App\Kas_Pemasukan;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');
// Route untuk Kas Pemasukan
Route::get('/kas-pemasukan', 'KasPemasukanController@index')->name('kas-pemasukan.index');
Route::get('/kas-pemasukan/getdata', 'KasPemasukanController@getData')->name('kas-pemasukan.getdata');
Route::post('/kas-pemasukan/store', 'KasPemasukanController@store')->name('kas-pemasukan.store');
Route::get('/kas-pemasukan/edit', 'KasPemasukanController@edit')->name('kas-pemasukan.edit');
Route::post('/kas-pemasukan/destroy/{id}', 'KasPemasukanController@destroy')->name('kas-pemasukan.destroy');

// Route untuk Kas Pengeluaran
Route::get('/kas-pengeluaran', 'KasPengeluaranController@index')->name('kas-pengeluaran.index');
Route::get('/kas-pengeluaran/getdata', 'KasPengeluaranController@getData')->name('kas-pengeluaran.getdata');
Route::post('/kas-pengeluaran/store', 'KasPengeluaranController@store')->name('kas-pengeluaran.store');
Route::get('/kas-pengeluaran/edit', 'KasPengeluaranController@edit')->name('kas-pengeluaran.edit');
Route::post('/kas-pengeluaran/destroy/{id}', 'KasPengeluaranController@destroy')->name('kas-pengeluaran.destroy');


// // Kas Pemasu
// Route::resource('kas-pemasukan', 'KasPemasukanController');
// Route::get('/kas-pemasukan/getdata', 'KasPemasukanController@getData')->name('kas-pemasukan.getData');
// // Kas Pengeluaran
// Route::resource('kas-pengeluaran', 'KasPengeluaranController');
// Route::get('/kas-pengeluaran/getdata', 'KasPengeluaranController@getData')->name('kas-pengeluaran.getData');
// Rekap Kas
Route::get('/kas-rekap', 'KasRekapController@index')->name('kas-rekap.index');
Route::get('/kas-rekap/getdata', 'KasRekapController@getData')->name('kas-rekap.getdata');
