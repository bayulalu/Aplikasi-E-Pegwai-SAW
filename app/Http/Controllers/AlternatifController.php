<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Parameter;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $users = User::where('eslon', '>' , '2')->has('parameters', 'empty')->get();
       
        return view('spk.alternatif', compact('users'));
    }

    public function create($id)
    {
        $user = User::findOrFail($id);

        // $parameters = Parameter::where('katagori','Perilaku Kerja')->get();
        return view('spk.inputAlternatif', compact('user'));
    }

    public function store(Request $request, $id)
    {

        // $this->validate($request, [
        //   'type' => 'required',
        //   'sectors' => 'required',
        //   'waktuSekarang' => 'required',
        //   'batasWaktu' => 'required',
        //   'level' => 'required',
        //   'title' => 'required',
        //   'ket' => 'required',

        // ]);

        /*
            memasukan dengan metode sins 

        */
        $user = User::findOrFail($id);
        
        $this->submitAlternatif($user, $request->op, $request->op2);
        $this->submitAlternatif($user,$request->integrasi, $request->integrasi2);
        $this->submitAlternatif($user,$request->komitmen, $request->komitmen2);
        $this->submitAlternatif($user,$request->disiplin, $request->disiplin2);
        $this->submitAlternatif($user,$request->ks, $request->ks2);
        $this->submitAlternatif($user,$request->kepemimpinan, $request->kepemimpinan2);

        die('berhasil');
        return view('spk.inputAlternatif', compact('user'));
    }

    public function submitAlternatif($user,$value1, $value2)
    {
        $user->parameters()->attach($value1, ['nilai' => $value2]);
    }
}
