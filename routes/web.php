<?php



Route::get('/', function () {
    return view('authh.login');
});

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@postLogin')->name('login');

Route::get('/daftarKariawan', 'AuthController@create');
Route::post('/daftarKariawan', 'AuthController@store')->name('daftar');

// Route::get('/beranda', '')

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
