<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class ArchiveController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        resolve('cb009131_ssp')->setUrl('archive');

        $events =  (new Event())->newQuery()->where(function ($query){
            $query->whereDate('end_date', '<', date('Y-m-d'));
        })->with(['categories', 'media']);

        if (request()->has('cid')) {

            $events = $events
                ->whereHas('categories', function ($query) {
                    $query->where('category_id', request()->get('cid'));
                });
        }

        $events = $events
            ->orderBy('start_date', 'desc')
            ->take(10)
            ->get();

        return view('archive', [
            'events' => $events,
            'categories' => (new Category())->newQuery()->where('status', 1)->get(),
        ]);
    }
}
