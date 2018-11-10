<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;


class jobController extends Controller
{
    public function index()
    {
    	$jobs = Job::with('users')->orderBy('id', 'desc')->get();

    	return view('jobs.beranda', compact('jobs'));
    }

    public function create()
    {
        $user = Auth::user();
    	
        if ($user->eslon == 2) {
            $users = User::all();
        }elseif($user->eslon == 3){
            $users = User::where('group2', $user->sector)->where('eslon','>=', 4)->get();
            dd($users);
        }


        // if ($users->eslon == 2) {
        //     die('hard');
        // }
        die('hard');

    	date_default_timezone_set('Asia/Makassar');

        $date = date('Y-m-d');
    	return view('jobs.formTugas', compact('users','date'));
    }
}
