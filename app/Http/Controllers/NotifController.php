<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notif;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function seen()
    {
		$user = Auth::user()->notifications()->where('seen', '0');
	    
	    $user->update([
	        'seen' => 1
	     ]);
    }
}
