<?php

namespace App\Http\Controllers;

use App\Group;
use App\Jobs\JoinDiscord;
use App\Jobs\RemoveDiscord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.join');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'bail|required|uuid'
        ]);
        $user = Auth::user();
        $code = Group::where('code', $request->code)->first();
        $code->uses = $code->uses -1;
        $code->save();

        $code->users()->sync($user->id);
        return redirect()->back()->with('status', 'Successfully joined your group.');
    }
}
