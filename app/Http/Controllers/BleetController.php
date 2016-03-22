<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BleetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Bleet::orderBy('id', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bleet = new \App\Bleet;
        $bleet->user_id = \Auth::user()->id;
        $bleet->save();

        return $bleet;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return \App\Bleet::with([
            'user'
            ])->find($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bleet = \App\Bleet::find($id);
        if ($bleet->user_id = \Auth::user()->id) {
        $bleet->save();
    } else {
        return response("Unauthorized", 403);
    }
        
        return $bleet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bleet = \App\Bleet::find($id);
        if ($comment->user_id == \Auth::user()->id) {
        $bleet->delete();
    } else {
        return response("Unauthorized", 403);
    }
        return $bleet;
    }
}
