<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpanel');
    }
    public function addrestaurant()
    {
        return view('addrestaurant');
    }
    public function userpanel()
    {
        return view('userpanel');
    }
    public function promote($id)
    {
        $u = \App\User::findOrFail($id);
        $u->update([
            'role_id' => 1,
        ]);
        return redirect('/userpanel')->with('message', 'promoted!');
    }
    public function demote($id)
    {
        $u = \App\User::findOrFail($id);
        $u->update([
            'role_id' => 2,
        ]);
        return redirect('/userpanel')->with('message', 'demoted!');

    }
}
