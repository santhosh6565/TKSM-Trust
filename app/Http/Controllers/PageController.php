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
        // ->whereBetween('start_date', [now()->subMonths(3), now()]) // Limit to last three months
        ->orderBy('start_date', 'asc')
        ->take(3) // Limit to three events
        ->get();

        // If no upcoming events are found, skip the section
        if ($upcomingEvents->isEmpty()) {
            $upcomingEvents = null;
        }

        // Pass the counts and events to the view
        return view('landing_page.homepage', compact('events', 'upcomingEvents'));
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
        $events = Event::whereIn('view', ['gallery', 'event_and_gallery'])->get();
        return view('landing_page.gallery', compact('events')); // This view should exist in resources/views
    }
}