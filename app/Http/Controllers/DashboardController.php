<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return dd();
        return view('home', [
            'groups' => Auth::user()->groups,
            'profile' => (Auth::user()->groups)? Profile::where('user_id', Auth::id())->where('group_id', Auth::user()->groups->first()->id)->first() : ''
        ]);
    }
}
