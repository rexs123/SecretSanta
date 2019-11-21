<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_groups', 'group_id', 'user_id')->withTimestamps();
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}
