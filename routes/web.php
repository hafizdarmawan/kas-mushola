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
// Kas Pemasu
Route::resource('kas-pemasukan', 'KasPemasukanController');
Route::get('/kas-pemasukan/getdata', 'KasPemasukanController@getData')->name('kas-pemasukan.getData');
// Kas Pengeluaran
Route::resource('kas-pengeluaran', 'KasPengeluaranController');
Route::get('/kas-pengeluaran/getdata', 'KasPengeluaranController@getData')->name('kas-pengeluaran.getData');
