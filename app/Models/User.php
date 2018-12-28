<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   

    protected $guarded = ['id'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }

    public function jobss(){
      return $this->belongsToMany('App\Models\Job');
    }

    public function comments()
    {
      return $this->hasMany('App\Models\Comment');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notif');
    }


}
