<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notif;
use App\Models\Job;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $this->validate($request, [
            'tanggapan' => 'required',
        ]);

    	$user = Auth::user();
        $job = Job::findOrFail($id);

        // dd($job->users->user);

        $comment = Comment::create([
            'conten' => $request->tanggapan,
            'job_id' => $id,
            'user_id' => $user->id
        ]);

        if ($job->user->id != Auth::user()->id) {
            Notif::create([
                'subject' => 'Ada tanggapan dari '. Auth::user()->name,
                'user_id' => $job->user->id,
                'job_id' => $id,
                'seen' => 0
            ]);
        }else{
            foreach ($job->users as $user) {
                Notif::create([
                    'subject' => 'Ada tanggapan dari '. Auth::user()->name,
                    'user_id' => $user->id,
                    'job_id' => $job->id,
                    'seen' => 0
                ]);
                
            }
        }
        
        return redirect('rincian/'.$job->slug);

    }
}
