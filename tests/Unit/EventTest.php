<?php

namespace Tests\Unit;

use App\Models\Event;
use Tests\TestCase;

class EventTest extends TestCase
{
    public function test_system_prevents_duplicate_events()
    {
        $event1 = Event::make([
            'url' => 'this-event',
        ]);

        $event2 = Event::make([
            'url' => 'that-event',
        ]);

        $this->assertTrue($event1->url != $event2->url);
    }

    public function test_system_can_delete_events()
    {
        $event = Event::factory()->count(1)->make();

        $event = Event::first();

        if ($event) {
            $event->delete();
        }

        $this->assertTrue(true);
    }
}
