<?php

namespace App\Http\Controllers;

use App\Models\Event;

class PageController extends Controller
{
    public function index()
    {
        // Fetch all events with status 'event' or 'event_and_gallery'
        $events = Event::whereIn('view', ['event', 'event_and_gallery'])->get();

        // Fetch upcoming events that start after now and within the next 10 days
        $upcomingEvents = Event::where('event_status', 'upcoming')
            ->where('start_date', '>=', now()) // Start date is now or later
            ->where('start_date', '<=', now()->addDays(10)) // Start date is within the next 10 days
            ->orderBy('start_date', 'asc')
            ->get();

        // If no upcoming events found, show at least one event from all events
        if ($upcomingEvents->isEmpty() && $events->isNotEmpty()) {
            $upcomingEvents = $events->take(1);
        }

        // Count total events
        $totalEventCount = $events->count();

        // Count upcoming events
        $upcomingEventCount = $upcomingEvents->count();

        // Pass the counts and events to the view
        return view('landing_page.homepage', compact('events', 'upcomingEvents', 'totalEventCount', 'upcomingEventCount'));
    }

    public function donations()
    {
        return view('landing_page.donations'); // This view should exist in resources/views
    }

    public function event()
    {
        return view('landing_page.event'); // This view should exist in resources/views
    }

    public function gallery()
    {
        $events = Event::whereIn('view', ['event_and_gallery'])->get();
        return view('landing_page.gallery', compact('events')); // This view should exist in resources/views
    }
}