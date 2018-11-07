<?php



Route::get('/', function () {
    return view('authh.login');
});

Route::get('/tes', function(){
	return view('authh.inputPegawai');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
