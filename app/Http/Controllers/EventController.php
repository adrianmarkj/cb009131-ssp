<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

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
        //
        $event = (new Event())->newQuery()->where('url', $url)->first();

        if (!$event) {
            return abort(404);
        }

        return view('event.show', [
            'event' => $event
        ]);
    }
}
