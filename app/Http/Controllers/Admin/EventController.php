<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Helpers\ListView;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Str;

class EventController extends Controller
{
    use ListView;

    protected $model = Event::class;

    protected $fields = [
        'name',
        'url',
        'address',
        'phone',
        'email',
        'start_date',
        'price_per_person',
        'sort_order',
        'status',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        // update the url attribute with the slug
        $request->merge([
            'url' => Str::slug($request->name)
        ]);

        // get the model
        $model = $this->getModel();

        // create a new instance of the model
        $model = $model
            ->newQuery()
            ->create($request->all());

        // check if the request has categories and sync them
        if ($request->has('categories')) {
            $model->categories()->sync($request->categories);
        }

        // check if the request has images and add them
        if ($request->has('images')) {
            $model->addMediaFromRequest('images')->toMediaCollection('images');
        }

        // check if the model was created
        if (!$model) {
            abort(500);
        }

        // redirect to the index page
        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('admin.events.show', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.form', [
            'model' => $event,
            'categories' => (new Category())->where('status', 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        // update the url attribute with the slug
        $request->merge([
            'url' => Str::slug($request->name)
        ]);

        // update the model
        $event->update($request->all());

        // check if the request has categories and sync them
        if ($request->has('categories')) {
            $event->categories()->sync($request->categories);
        }

        // check if the request has images and add them
        if ($request->has('images')) {
            $event->clearMediaCollection('images');
            $event->addMediaFromRequest('images')->toMediaCollection('images');
        }

        // redirect to the index page
        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

         return redirect()
             ->route('admin.events.index')
             ->with('success', 'Event Deleted Successfully');
    }
}
