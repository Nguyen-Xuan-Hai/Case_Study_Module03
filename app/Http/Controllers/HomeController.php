<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        toastSuccess('Congratulations on your successful login');
        return view('frontend.home');
    }

    public function logout(){
        Auth::logout();
        toastSuccess('See you again!');
        return redirect()->route('home');
    }
}
