<?php

namespace App\Http\Controllers;

use App\Jobs\AssignRole;
use App\Jobs\JoinDiscord;
use App\Jobs\RemoveDiscord;
use App\Jobs\RemoveRole;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'full_name' => 'required|bail',
            'address' => 'required',
            'address_opt' => 'nullable',
            'city' => 'required',
            'state' => 'nullable',
            'zip' => 'required',
            'country' => 'required',
            'bio' => 'required|min:4'
        ]);

        Profile::create([
            'user_id' => Auth::id(),
            'group_id' => $request->group_id,
            'confirmed' => 0,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'address_opt' => $request->address_opt,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'bio' => $request->bio
        ]);
        return redirect()->back()->with('status', 'Profile successfully created.');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Profile $profile)
    {
        $profile->confirmed = true;
        $profile->save();
        JoinDiscord::dispatch(Auth::user());
        AssignRole::dispatch(Auth::user(), $profile->group);
        return redirect()->back()->with('status', 'Entry successfully confirmed. Thank you. 😄');
    }

    public function destroy(Profile $profile)
    {
        $profile->confirmed = false;
        $profile->save();
        RemoveRole::dispatch(Auth::user(), $profile->group);
        return redirect()->back()->with('warning', 'Entry successfully bowed out, we\'re sorry to see you leave. You have been removed from the role. 🙁');
    }
}
