<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance\Subscription;
use Illuminate\Support\Carbon;
use App\Models\Event;

class ReservationController extends Controller
{
    public function show(Event $event){
        return view('reservation.show', [
            'event' => $event,
        ]);
    }

    public function reserve(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required',
            'user_id' => 'required',
            'number_of_people' => 'required',
        ]);

        // load the event using the event ID
        $event = Event::find($request->event_id);

        // calculate the total price
        $total_price = $event->price_per_person * $request->number_of_people;

        // create the booking
        $subscription = (new Subscription())->create([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
            'number_of_people' => $request->number_of_people,
            'total_price' => $total_price,
            'status' => 1,
        ]);

        auth()->user()->notify((new \App\Notifications\ReservationSuccess($subscription)));

        return redirect()->route('reservation.index');
    }

    public function index()
    {
        // get the authenticated user
        $user = auth()->user();

        // get the subscriptions for the authenticated user
        $subscriptions = $user->subscriptions;

        return view('reservation.index', [
            'user' => $user,
            'subscriptions' => $subscriptions
        ]);
    }
}
