<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   $liked = Reaction::where('user_id', Auth::user()->id)->where('chirp_id', $request->chirp_id)
   ->where('up', 1)->first();
   $disliked = Reaction::where('user_id', Auth::user()->id)->where('chirp_id', $request->chirp_id)
      ->where('down', 1)->first(); 
  
       if ($liked) {  
        Reaction::where('user_id', Auth::user()->id)->where('chirp_id', $request->chirp_id)->where('up', 1)->delete();
       } else if ($disliked) {
        Reaction::where('user_id', Auth::user()->id)->where('chirp_id', $request->chirp_id)->where('down', 1)->delete();
        
       } else {
        $reaction = Reaction::create([
          'user_id' => Auth::user()->id,
           'chirp_id' => $request->chirp_id,
           'up' => $request->up,
           'down' => $request->down
        ]);
        return redirect(route('chirps.index'));

    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function show(Reaction $reaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Reaction $reaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reaction $reaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reaction  $reaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reaction $reaction)
    {
        //
    }
}
