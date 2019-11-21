<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function santa()
    {
        return $this->hasMany('App\User', 'santa_id');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist');
    }
}
