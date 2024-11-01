<div class="container mx-auto">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Upcoming Events</h2>
        <ul class="space-y-4">
            @forelse ($upcomingEvents as $event)
                <li class="bg-white dark:bg-gray-700 shadow p-4 rounded-lg">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">{{ $event->title }}</h3>
                    
                    <!-- Display "New" label if the event was added recently -->
                    @if($this->isNew($event))
                        <span class="text-xs text-green-600 font-semibold">New</span>
                    @endif

                    <p class="text-gray-700 dark:text-gray-300">{{ $event->description }}</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Starts: {{ $event->start_date->format('M d, Y') }}</p>
                    
                    @if($event->end_date)
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Ends: {{ $event->end_date->format('M d, Y') }}</p>
                    @endif

                    <p class="text-gray-500 dark:text-gray-500 text-xs">{{ $event->location }}</p>
                </li>
            @empty
                <li class="text-gray-500 dark:text-gray-400">No upcoming events.</li>
            @endforelse
        </ul>
    </div>
</div>