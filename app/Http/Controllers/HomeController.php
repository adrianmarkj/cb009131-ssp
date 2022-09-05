<?php

namespace App\Http\Controllers;

use App\Models\Event;

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
    public function index()
    {
        resolve('cb009131_ssp')->setUrl('home');

        //get 10 events ordered by created date
        $events =  (new Event())->where('status', 1)->orderBy('created_at', 'desc')->take(10);

        return view('home', [
            'events' => $events
        ]);
    }
}
