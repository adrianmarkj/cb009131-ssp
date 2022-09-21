<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        //get 10 events ordered by ascending start date
        $events =  (new Event())->newQuery()->where(function ($query){
            $query->where('status', 1);
        })->with(['categories', 'media']);

        // check if the request has a cid param and get the hotels by the category id
        if (request()->has('cid')) {

            $events = $events
                ->whereHas('categories', function ($query) {
                    $query->where('category_id', request()->get('cid'));
                });
        }

        //get the mose popular events of all time by page view count descending order
        $events = Event::popularAllTime()->get();

        return view('home', [
            'events' => $events,
            'categories' => (new Category())->newQuery()->where('status', 1)->get(),
        ]);
    }
}
