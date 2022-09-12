<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\View\Component;

class EventList extends Component
{
    public $events;

    public $event_id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($eventId = null)
    {
        $this->events = (new Event())->get();

        $this->event_id = $eventId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.event-list', [
            'events' => $this->events,
            'event_id' => $this->event_id
        ]);
    }
}
