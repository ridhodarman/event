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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin_403', function () { return view('admin.403'); })->name('admin_403');

Route::middleware(['AksesAdmin'])->group(function () {
    Route::get('/admin_index', function () { return view('admin.index'); })->name('admin_index');
    Route::get('/admin/agen', function () { return view('admin.agen.index'); })->name('agen');
});
