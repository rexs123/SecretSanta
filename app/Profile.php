<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
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

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

}
