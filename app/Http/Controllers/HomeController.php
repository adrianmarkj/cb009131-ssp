<?php

namespace App\Http\Controllers;

use App\cb009131_ssp;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(cb009131_ssp $Cb009131_ssp)
    {
        resolve('cb009131_ssp')->setUrl('home');
        return view('home');
    }
}
