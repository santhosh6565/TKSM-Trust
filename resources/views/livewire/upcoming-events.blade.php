<div class="container mx-auto">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Planning Events</h2>
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
                    
                    <!-- Accordion for Requirements -->
                    <div class="flex-grow mt-4">
                        <div id="accordion-{{ $event->id }}" class="accordion my-5">
                            <button type="button" class="accordion-toggle bg-purple-500 text-white px-4 py-2 rounded-lg w-full text-left flex justify-between items-center" data-accordion-target="#requirements-{{ $event->id }}" aria-expanded="false" aria-controls="requirements-{{ $event->id }}">
                                View Requirements
                                <svg class="w-4 h-4 ml-2 transition-transform" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            
                            <!-- Accordion Content -->
                            <div id="requirements-{{ $event->id }}" class="accordion-content overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                                <table class="min-w-full bg-white rounded-lg shadow-md mt-4">
                                    <thead>
                                        <tr class="bg-purple-200">
                                            <th class="px-4 py-2 text-left">Requirement Name</th>
                                            <th class="px-4 py-2 text-left">Cost</th>
                                            <th class="px-4 py-2 text-left">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $requirements = is_string($event->requirements) ? json_decode($event->requirements, true) : $event->requirements;
                                        @endphp

                                        @if(is_array($requirements))
                                            @foreach ($requirements as $requirement)
                                                <tr>
                                                    <td class="border px-4 py-2">{{ $requirement['requirement_name'] }}</td>
                                                    <td class="border px-4 py-2">{{ $requirement['cost'] }}</td>
                                                    <td class="border px-4 py-2">{{ $requirement['quantity'] }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" class="text-center text-gray-500 px-4 py-2">No requirements available</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="w-full flex items-center justify-center my-5">
                                <a href="/donations" class="text-center border-2 border-purple-500 rounded-full text-purple-500 hover:bg-purple-500 hover:text-white w-full py-3">Donate</a>
                            </div> --}}
                        </div>
                    </div>
                </li>
            @empty
                <li class="text-gray-500 dark:text-gray-400">No upcoming events.</li>
            @endforelse
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Toggle accordion content
        document.querySelectorAll('.accordion-toggle').forEach(button => {
            button.addEventListener('click', function () {
                const target = document.querySelector(this.getAttribute('data-accordion-target'));

                if (target.style.maxHeight) {
                    target.style.maxHeight = null; // Close
                    this.querySelector('svg').classList.remove('rotate-180');
                } else {
                    target.style.maxHeight = target.scrollHeight + 'px'; // Open
                    this.querySelector('svg').classList.add('rotate-180');
                }
            });
        });
    });
</script>