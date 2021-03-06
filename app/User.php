<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'avatar', 'ip', 'discord_id', 'password', 'token'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];

    public function profile()
    {
        return $this->hasMany('App\Profile');
    }

    public function receiver()
    {
        return $this->hasOne('App\Profile', 'santa_id', 'id');
    }

    public function santa()
    {
        return $this->hasOne('App\Profile', 'santa_id', 'id');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'user_groups', 'user_id', 'group_id')->withTimestamps();
    }

    public function findByUsernameOrCreate($userData)
    {
        return User::updateOrCreate(
            ['email' => $userData->email, 'discord_id' => $userData->id],
            [
                'username' => $userData->nickname,
                'avatar' => ($userData->avatar)? $userData->avatar : 'https://antidote.group/assets/img/avatar.svg',
                'discord_id' => $userData->id,
                'token' => $userData->token,
                'ip' => request()->ip()
            ]
        );
    }
}
