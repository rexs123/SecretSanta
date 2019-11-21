<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'active_url|required|bail',
            'notes' => 'nullable'
        ]);

        Wishlist::create([
            'profile_id' => $request->profile_id,
            'user_id' => Auth::id(),
            'url' => $request->url,
            'notes' => $request->notes
        ]);

        return redirect()->back()->with('status', 'Successfully added an item to your wish list.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
