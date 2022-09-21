<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Finance\Subscription;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Auth\User;

class SubscriptionController extends Controller
{
    use ListView;

    protected $model = Subscription::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request)
    {
        // get the model
        $model = $this->getModel();

        $validated = $request->validated();

        // load the event using the event ID
        $event = Event::find($request->event_id);

        // calculate the total price
        $total_price = $event->price_per_person * $request->number_of_people;

        // create a new instance of the model
        $model = $model
            ->newQuery()
            ->create([
                'event_id' => $validated['event_id'],
                'user_id' => $validated['user_id'],
                'number_of_people' => $validated['number_of_people'],
                'total_price' => $total_price,
            ]);

        // check if the model was created
        if (!$model) {
            abort(500);
        }

        // redirect to the index page
        return redirect()
            ->route('admin.subscriptions.index')
            ->with('success', 'Event Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        // find subscription maker
        $user = User::find($subscription->user_id);

        // find event
        $event = Event::find($subscription->event_id);

        return view('admin.subscriptions.show', [
            'subscription' => $subscription,
            'user' => $user,
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        return view('admin.subscriptions.form', [
            'model' => $subscription,
            'events' => (new Event())->where('status', 1)->get(),
            'users' => (new User())->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriptionRequest  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        $validated = $request->validated();

        // load the event using the event ID
        $event = Event::find($request->event_id);

        // calculate the total price
        $total_price = $event->price_per_person * $request->number_of_people;

        // update the model
        $subscription->update([
            'event_id' => $validated['event_id'],
            'user_id' => $validated['user_id'],
            'number_of_people' => $validated['number_of_people'],
            'total_price' => $total_price,
        ]);

        // redirect to the index page
        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Subscription Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('admin.subscriptions.index');
    }
}
