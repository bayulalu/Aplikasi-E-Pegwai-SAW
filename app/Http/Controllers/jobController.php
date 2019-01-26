<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Job;
use App\Models\User;
use App\Models\Notif;
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
        $usr = Auth::user();
    	
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
        $this->validate($request, [
          'type' => 'required',
          'sectors' => 'required',
          'waktuSekarang' => 'required',
          'batasWaktu' => 'required',
          'level' => 'required',
          'title' => 'required',
          'ket' => 'required',

         ]);

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

        $job->users()->attach($request->sectors);

        foreach ($request->sectors as $sector) {
            Notif::create([
                'subject' => 'Tugas dari '. Auth::user()->name .' '.$request->title,
                'seen' => '0',
                'job_id' => $job->id,
                'user_id' => $sector
            ]);
        }

        return redirect()->route('job')->with('msg','Data Berhasil Di Simpan');

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

    public function edit($id)
    {
        $usr = Auth::user();
        $job = Job::findOrFail($id);

        if ($job->isOwner()) { 
            
            if ($usr->eslon == 2) {
                $users = User::all();
            }elseif($usr->eslon == 3){
                $users = User::where('group2', $usr->sector)->where('eslon','>=', 4)->get();
            }elseif($usr->eslon == 4){
                $users = User::where('group1', $usr->sector)->where('eslon','>=', 5)->get();
               
            }

            date_default_timezone_set('Asia/Makassar');

            $date = date('Y-m-d');
            return view('jobs.editTugas', compact('usr', 'users', 'date', 'job'));
         }else{
            dd('hard');
        }

    }

    public function update(Request $request, $id)
    {
         $this->validate($request, [
          'type' => 'required',
          'sectors' => 'required',
          'waktuSekarang' => 'required',
          'batasWaktu' => 'required',
          'level' => 'required',
          'title' => 'required',
          'ket' => 'required',

         ]);

        $user = Auth::user();

        $job = Job::findOrFail($id);         
        $job->update([
            'title' => $request->title,
            'level' => $request->jenisTugas,
            'ket' => $request->ket,
            'time' => $request->waktuSekarang,
            'deadLine' => $request->batasWaktu,
            'level' => $request->level,
            'kind' => $request->type
        ]);
        
        $job->users()->sync($request->sectors);
        return redirect()->route('listJob')->with('msg','Data Berhasil Di Ubah');
    }

    public function acc($id)
    {
        $job = Job::findOrFail($id); 
        // $user = Auth::user();

        // $this->notifAcc($job, $user);

            
        $job->update([
            'status' => 'Acc',
        ]);
        return redirect('/daftar-pemberian-tugas');
    }

    // notif
    //  public function notif($leaders, $users, $title, $id_job){

    //         foreach ($leaders as $leader) {
    //             Notif::create([
    //                 'subject' => 'Tugas dari '. Auth::user()->user .' '.$title,
    //                 'notifable_id' => $leader->id,
    //                 'seen' => '0',
    //                 'notifable_type' => 'App\Models\Leader',
    //                 'job_id' => $id_job
    //             ]);
            
    //         }
    // }

   

}
