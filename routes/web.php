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
    
    Route::get('/event', 'EventsController@index')->name('event');
    Route::get('/event/tambah', 'EventsController@create');
    Route::post('/event', 'EventsController@store');
    Route::get('/event/{event}', 'EventsController@show');
    Route::get('/event/{event}/edit', 'EventsController@edit');
    Route::patch('/event/{event}/edit', 'EventsController@update');
    Route::delete('/event/{event}', 'EventsController@destroy');
    Route::delete('/event/{event}/hapus_foto', 'EventsController@hapus_foto');
    Route::get('/event/{event}/foto', 'EventsController@form_upload_foto');
    Route::patch('/event/{event}/foto', 'EventsController@upload_foto');

    Route::get('/jenis_tiket', 'Jenis_tiketsController@index')->name('jenis_tiket');
    Route::get('/jenis_tiket/{event}/tambah', 'Jenis_tiketsController@create');
    Route::post('/jenis_tiket/{event}/tambah', 'Jenis_tiketsController@store');
    Route::get('/jenis_tiket/{jenis_tiket}', 'Jenis_tiketsController@show');
    Route::get('/jenis_tiket/{jenis_tiket}/edit', 'Jenis_tiketsController@edit');
    Route::patch('/jenis_tiket/{jenis_tiket}/edit', 'Jenis_tiketsController@update');
    Route::delete('/jenis_tiket/{jenis_tiket}', 'Jenis_tiketsController@destroy');
    Route::delete('/jenis_tiket/{jenis_tiket}/hapus_foto', 'Jenis_tiketsController@hapus_foto');
    Route::get('/jenis_tiket/{jenis_tiket}/foto', 'Jenis_tiketsController@form_upload_foto');
    Route::patch('/jenis_tiket/{jenis_tiket}/foto', 'Jenis_tiketsController@upload_foto');

    Route::get('/admin/agen', function () { return view('admin.agen.index'); })->name('agen');
    Route::get('/admin/user', function () { return view('admin.user.index'); })->name('user_register');
});
