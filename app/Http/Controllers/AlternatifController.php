<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Parameter;
use App\Models\Job;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index(Request $request)
    {

        // $tags = Tag::all();
        $search_q = urldecode($request->search);

        if (!empty($search_q)){
            // $quotes = Quote::with('tags')->where('title','like','%'.$search_q.'%')->get();
            $users = User::where('group2', 'like' ,'%'.$search_q.'%')->has('parameters', 'empty')->get();
            
        }else{
            // $quotes = Quote::with('tags')->orderBy('id', 'desc')->get();
            $users = User::where('eslon', '>' , '2')->has('parameters', 'empty')->get();
        }

        // =============
        
       
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
        $this->validate($request, [
            'op2' => 'required',
            'integrasi2' => 'required',
            'komitmen2' => 'required',
            'disiplin2' => 'required',
            'ks2' => 'required',
            'kepemimpinan2' => 'required|string'
        ]);
  
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

        // die('berhasil');
        // redirect()->route('job')->with
        return redirect()->route('alternatif')->with('msg','Data Berhasil Di Simpan');
    }

    public function submitAlternatif($user,$value1, $value2)
    {
        $user->parameters()->attach($value1, ['nilai' => $value2]);
    }

    public function daftarNilai(){
        $users = User::where('eslon', '>' , '2')->has('parameters')->has('jobss')->get();
        return view('spk.daftarNilai', compact('users'));
    }
}
