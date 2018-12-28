<?php





Route::group(['middleware' => 'guest'], function(){
	Route::get('/', function () {
	    return view('authh.login');
	});
	Route::get('/login', 'AuthController@login')->name('login');
	Route::post('/login', 'AuthController@postLogin')->name('login');
});


Route::group(['middleware' => 'auth'], function(){

	// pendaftaran pegawai
	Route::get('/daftar-pegawai', 'AuthController@create')->name('daftar');
	Route::post('/daftar-pegawai', 'AuthController@store')->name('daftar');

	// pemberian tugas
	Route::get('/beranda', 'jobController@index')->name('beranda');
	Route::get('/rincian/{id}', 'jobController@show');
	Route::get('/pemberian-tugas', 'jobController@create')->name('job');
	Route::post('/pemberian-tugas', 'jobController@store')->name('job');
	Route::get('/daftar-pemberian-tugas', 'jobController@listJob')->name('listJob');

	// hapus tugas yang di berikan tadi
	Route::get('/hapus-tugas/{id}', 'jobController@delete');

	// edit tugas 
	Route::get('/pemberian-tugas/{id}/edit', 'jobController@edit');
	Route::put('/pemberian-tugas/{id}', 'jobController@update');

	// tanggapan(Komentar) tugas 
	Route::post('/tanggapan-tugas/{id}', 'CommentController@comment');
	

	// Logout
	Route::get('/logout', 'AuthController@logout')->name('logout');
});


// Route::get('/home', 'HomeController@index')->name('home');
