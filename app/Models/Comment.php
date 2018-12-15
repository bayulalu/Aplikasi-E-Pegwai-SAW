<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
		return $this->belongsTo('App\Models\User');
    }

    public function job()
    {
		return $this->belongsTo('App\Models\Job');
    }
}
