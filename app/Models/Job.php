<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function isOwner(){

      if (Auth::guest()) {
        return false;
      }

      return Auth::user()->id == $this->leader_id;
    }
}