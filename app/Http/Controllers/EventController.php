<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $url)
    {
        $event = (new Event())->newQuery()->where('url', $url)->with(['media', 'category'])->first();

        if (!$event) {
            return abort(404);
        }

        // increment page visits once per hour for the same session
        $event->visit()->hourlyIntervals()->withSession();

        // get the number of page visits
        $count = DB::table('laravisits')->select('visitable_id')->where('visitable_id', $event->id)->count();

        // get the number of subscriptions
        $subscriptions = DB::table('subscriptions')->select('event_id')->where('event_id', $event->id)->count();

        return view('event.show', [
            'event' => $event,
            'count' => $count,
            'subscriptions' => $subscriptions
        ]);
    }
}
