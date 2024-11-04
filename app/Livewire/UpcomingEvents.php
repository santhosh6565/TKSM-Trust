<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Event;
use Livewire\Component;

class UpcomingEvents extends Component
{
    public function render()
    {
        // Fetch upcoming events where `start_date` is in the future and status is 'planning'
        $upcomingEvents = Event::where('event_status', 'planning')
            ->where('event_status', 'planning') // Filter for events with status 'planning'
            ->get();

        return view('livewire.upcoming-events', [
            'upcomingEvents' => $upcomingEvents,
        ]);
    }

    // Check if an event is new (added within the last 7 days)
    public function isNew($event)
    {
        return $event->created_at->greaterThanOrEqualTo(Carbon::now()->subDays(7));
    }
}