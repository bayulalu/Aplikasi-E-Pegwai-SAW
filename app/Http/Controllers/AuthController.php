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

      die('hard');
      // return redirect()->route('home');
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
            'password' => 'required|string',
        ]);

       $user = User::create([
       		'name' => $request->name,
       		'nip' => $request->nip,
       		'sector' => $request->sector,
       		'user' => $request->user,
       		'eslon' => $request->eslon,
       		'password' =>  bcrypt($request->password),
       		'foto' => ''
       ]);

       die('hard');

    }
}
