<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Melakukan routing ke function index pada controller
Route::get('/', 'App\Http\Controllers\Controller@index')->name('index');

//Melakukan routing ke function hitung pada controller
Route::post('/hitung', 'App\Http\Controllers\Controller@hitung')->name('hitung');

//Melakukan routing ke function ambil_riwayat pada controller
Route::get('/ambil-riwayat/{id}', 'App\Http\Controllers\Controller@ambil_riwayat')->name('ambil_riwayat');