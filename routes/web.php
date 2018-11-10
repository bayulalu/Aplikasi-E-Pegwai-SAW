<?php



Route::get('/', function () {
    return view('authh.login');
});

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@postLogin')->name('login');

Route::group(['middleware' => 'auth'], function(){

	// pendaftaran pegawai
	Route::get('/inputpegawai', 'AuthController@create');
	Route::post('/inputpegawai', 'AuthController@store')->name('daftar');

	// pemberian tugas
	Route::get('/beranda', 'jobController@index')->name('beranda');
	Route::get('/job', 'jobController@create')->name('job');

});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
