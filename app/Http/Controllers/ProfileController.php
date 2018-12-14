<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $role = \App\Role::find($user->role_id);
        return view('myprofile',['user'=>$user,'rolename'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('changepassword');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \App\User::find(Auth::user()->id);
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/myprofile')->with('message', 'You have updated your password.');

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
        $user = \App\User::findOrFail($id);
        return $user;
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
      
        $p1 = $request->input('password_1');
        $p2 = $request->input('password_2');
        if($p1!= null && $p2!=null && $p1 == $p2)
        {
        $u = \App\User::findOrFail($id);
        $u->update([
            'password' => bcrypt($request->input('password_1')),
        ]);
            return redirect('/profile')->with('message', 'Successfully updated your password!');
        }else{
            return redirect('/profile/create')->with('message', 'Try again!');
        }
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
