<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	// Login Data Pegawai
	public function login()
	{
		return view('authh.login');
	}

	public function postLogin(Request $request)
	{
		$users = auth()->attempt(['user' => $request->user, 'password' => $request->password ]);

	   	if (!$users) {
	        return redirect()->back();
	    }

      // die('hard');
      return redirect()->route('beranda');
	}

	// menyimpan Data Pegawai

	public function create(){
		return view('authh.inputPegawai');
	}


    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
          'nip' => 'required',
          'sector' => 'required',
          'user' => 'required|unique:users',
          'eslon' => 'required',
          'password' => 'required|string'
      ]);

      
      // dd($group2);
      $group2 = $this->group($request);
  
      if (empty($group2)) {
          $group2 = '';
      }

      $user = User::create([
       		'name' => $request->name,
       		'nip' => $request->nip,
       		'sector' => $request->sector,
       		'user' => $request->user,
       		'eslon' => $request->eslon,
       		'password' =>  bcrypt($request->password),
       		'foto' => '',
          'group1' => $request->sector,
          'group2' => $group2
      ]);

       // die('hard');
       return redirect()->route('daftar');
    }

    public function group($request){
      if (($request->sector == 'Program' || $request->sector == 'Keuangan' || $request->sector == 'Umum' || $request->sector == 'Sekertaris')  && ($request->eslon == 4 || $request->eslon == 5)) {
          return $group2 = 'Sekertaris';

      }elseif ($request->sector == 'Informasi & Komuikasi Public' || $request->sector == 'Pengelolahan & Dokumentasi Informasi' || $request->sector == 'Publikasi' || $request->sector == 'Kelembagaan'  && $request->eslon == 4 || $request->eslon == 5) {
          return $group2 = 'Informasi & Komuikasi Public';

      }elseif($request->sector == 'Pengelolahan Teknologi & Komunikasi' || $request->sector == 'Aplikasi Teknologi & Komunikasi' || $request->sector == 'Intastruktur Teknologi Informasi & Komunikasi' || $request->sector == 'Tata Kelola Teknologi Informasi & Komunikasi'  && $request->eslon == 4 || $request->eslon == 5){
          return $group2 = 'Pengelolahan Teknologi & Komunikasi';
        
      }elseif($request->sector == 'Persedian Dan LPSE' || $request->sector == 'Persedian Dan Keamanan Informasi' || $request->sector == 'Layanan Pengadaan Secara Elektronik' || $request->sector == 'Telekomunikasi Dan Pengendalian'  && $request->eslon == 4 || $request->eslon == 5){
          return $group2 = 'Persedian Dan LPSE';
        
      }elseif($request->sector == 'Statistik' || $request->sector == 'Statistik Ekonomi' || $request->sector == 'Statistik SDA Dan Infastruktur' || $request->sector == 'Statistik Sosial'  && $request->eslon == 4 || $request->eslon == 5){
          return $group2 = 'Statistik';
      
      }elseif ($request->sector == 'Balai Informasi Teknologi Edukasi' || $request->sector == 'Tata Usaha' || $request->sector == 'Pendataan Dan Jaringan' || $request->sector == 'Pelayanan Dan Kerja Sama'  && $request->eslon == 4 || $request->eslon == 5) {
          return $group2 = 'Balai Informasi Teknologi Edukasi';
      }

    }

    public function logout()
    {
      Auth::guard()->logout();
     return redirect()->route('login');
    }
}
