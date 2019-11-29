<?php

namespace App\Http\Controllers;

use App\Group;
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
        return view('home', [
            'groups' => Auth::user()->groups,
            'group' => Auth::user()->groups->first(),
            'profile' => (Auth::user()->groups()->exists())? Profile::where('user_id', Auth::id())->where('group_id', Auth::user()->groups->first()->id)->first() : '',
            'receiver' => (Auth::user()->groups()->exists())? Profile::where('santa_id', Auth::id())->where('group_id', Auth::user()->groups->first()->id)->first() : '',
        ]);
    }

    public function show($slug)
    {
        $group = Group::where('slug', $slug)->first();
        return view('home', [
            'groups' => Auth::user()->groups,
            'group' => $group,
            'profile' => Profile::where('user_id', Auth::id())->where('group_id', $group->id)->first(),
            'receiver' => Profile::where('santa_id', Auth::id())->where('group_id', $group->id)->first()
        ]);
    }
}
