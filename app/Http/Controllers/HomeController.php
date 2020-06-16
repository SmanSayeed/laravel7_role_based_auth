<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        // $request->session()->flash('success','Testing success flash message');
        // $request->session()->flash('warning','Testing warning flash message');
        // $request->session()->flash('error','Testing error flash message');
        return view('home');
    }
}
