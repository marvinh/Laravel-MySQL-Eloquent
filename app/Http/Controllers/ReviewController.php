<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('review');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rating = $request->input('rating');
        $tag = $request->input('tagline');
        $rev = $request->input('review');
        $id =  $request->input('restaurant_id');
        if($rating != null && $tag !=null && $rev != null)
        {
            
         $r = \App\Review::create([
            'restaurant_id' => $request->input('restaurant_id'),
            'user_id'=> Auth::user()->id,
            'rating' => $request->input('rating'),
            'tagline' => $request->input('tagline'),
            'review' => $request->input('review'),
            
        ]);
            $redirect = '/restaurantdetail'.'/'.$id;
            return redirect($redirect)->with('message', 'submitted review');
        }else{
            $redirect = '/review'.'/'.$id;
            return redirect($redirect)->with('message', 'Missing fields.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $r = \App\Restaurant::find($id);
        return view('review',['r'=>$r]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
