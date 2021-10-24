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

// Route untuk Dana Sosial Pemasukan
Route::get('/dana-sosial-pemasukan', 'DanaPemasukanController@index')->name('dana-pemasukan.index');
Route::get('/dana-sosial-pemasukan/getdata', 'DanaPemasukanController@getData')->name('dana-pemasukan.getdata');
Route::post('/dana-sosial-pemasukan/store', 'DanaPemasukanController@store')->name('dana-pemasukan.store');
Route::get('/dana-sosial-pemasukan/edit', 'DanaPemasukanController@edit')->name('dana-pemasukan.edit');
Route::post('/dana-sosial-pemasukan/destroy/{id}', 'DanaPemasukanController@destroy')->name('dana-pemasukan.destroy');

// Route untuk Dana Sosial Pengeluaran
Route::get('/dana-sosial-pengeluaran', 'DanaPengeluaranController@index')->name('dana-pengeluaran.index');
Route::get('/dana-sosial-pengeluaran/getdata', 'DanaPengeluaranController@getData')->name('dana-pengeluaran.getdata');
Route::post('/dana-sosial-pengeluaran/store', 'DanaPengeluaranController@store')->name('dana-pengeluaran.store');
Route::get('/dana-sosial-pengeluaran/edit', 'DanaPengeluaranController@edit')->name('dana-pengeluaran.edit');
Route::post('/dana-sosial-pengeluaran/destroy/{id}', 'DanaPengeluaranController@destroy')->name('dana-pengeluaran.destroy');

// Route untuk Kas Rekapitulasi
Route::get('/dana-sosial-rekapitulasi', 'DanaRekapController@index')->name('dana-rekapitulasi.index');
Route::get('/dana-sosial-rekapitulasi/getdata', 'DanaRekapController@getData')->name('dana-rekapitulasi.getdata');// Rekap Kas
Route::get('/kas-rekap', 'KasRekapController@index')->name('kas-rekap.index');
Route::get('/kas-rekap/getdata', 'KasRekapController@getData')->name('kas-rekap.getdata');
