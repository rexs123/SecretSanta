<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }
}
