<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    /**
     * @var \App\User
     */
    private $users;

    /**
     * @var \Auth $auth
     */
    private $auth;

    /**
     * LoginController constructor.
     *
     * @param \App\User $users
     * @param \Auth $auth
     */
    public function __construct(User $users, Auth $auth)
    {
        $this->users = $users;
        $this->auth = $auth;
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return $this->getAuthorizationFirst();
    }

    /**
     * Obtain the user information from Discord.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function handleProviderCallback(Request $request)
    {
        if ($request->error) return redirect()->route('home');
        if (!$request->code) return $this->getAuthorizationFirst();

        $user = $this->users->findByUsernameOrCreate($this->getDiscordUser());

        if ($user) {
            Auth::login($user, true);
            return redirect()->intended();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * @return mixed
     */
    private function getAuthorizationFirst()
    {
        return socialite::driver('discord')
            ->setScopes(['email', 'identify', 'guilds.join'])
            ->redirect();
    }

    /**
     * @return mixed
     */
    private function getDiscordUser()
    {
        return socialite::driver('discord')->stateless()->user();
    }
}