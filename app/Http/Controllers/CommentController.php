<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $this->validate($request, [
            'tanggapan' => 'required',
        ]);

    	$user = Auth::user();

    	$comment = Comment::create([
            'conten' => $request->tanggapan,
            'job_id' => $id,
            'user_id' => $user->id
        ]);

       	dd('hard');
    }
}
