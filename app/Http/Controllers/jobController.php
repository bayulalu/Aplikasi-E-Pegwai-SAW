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
        // dd($jobs);
    	return view('jobs.beranda', compact('jobs'));
    }

    public function create()
    {
        $usr = Auth::user();
        // $users = '';
    	
        if ($usr->eslon == 2) {
            $users = User::all();
        }elseif($usr->eslon == 3){
            $users = User::where('group2', $usr->sector)->where('eslon','>=', 4)->get();
        }elseif($usr->eslon == 4){
            $users = User::where('group1', $usr->sector)->where('eslon','>=', 5)->get();
           
        }

    	date_default_timezone_set('Asia/Makassar');

        $date = date('Y-m-d');
        // dd($users);
    	return view('jobs.formTugas', compact('users','date', 'usr'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        $slug = $slug = str_slug($request->judul.time(), '-');

        $job = job::create([
            'title' => $request->title, 
            'slug' => $slug,
            'ket' => $request->ket,
            'time' => $request->waktuSekarang,
            'deadLine' => $request->batasWaktu,
            'status' => 'belum',
            'kind' => $request->type,
            'level' => $request->level,
            'user_id' => $user->id
        ]); 

        // dd($request->sectors);
        $job->users()->attach($request->sectors);
        die('sukses');

    }

    public function show($slug)
    {
        $job = Job::where('slug', $slug)->first(); 
        return view('jobs.singgle', compact('job'));
    }

    public function delete($id)
    {
        $job = Job::findOrFail($id);  
        $job->delete();
        $job->users()->detach($id);

        return redirect()->route('listJob');
    }

    public function listJob()
    {
        $owner = Auth::user()->id;
        $jobs = Job::with('users')->where('user_id', $owner)->orderBy('id', 'desc')->get();

        return view('jobs.daftarPemberianTugas', compact('jobs'));
    }


}
