<div class="space-y-4">
    @foreach ($events as $event)
        <!-- Event Card -->
        <div class="p-4 bg-purple-50 rounded-lg shadow-md shadow-purple-500 dark:bg-gray-800 dark:bg-opacity-40 dark:shadow-purple-700">
            <div class="text-center m-2">
                <p class="text-sm font-medium text-gray-800 dark:text-gray-400">{{ $event->title }}</p>
            </div>

            <div class="">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $event->description }}</p>
            </div>

            <!-- Accordion for Requirements -->
            <div class="mt-4">
                <div id="accordion-{{ $event->id }}" class="accordion">
                    <button type="button" class="accordion-toggle bg-purple-500 text-white px-4 py-2 rounded-lg w-full text-left flex justify-between items-center" data-accordion-target="#requirements-{{ $event->id }}" aria-expanded="false" aria-controls="requirements-{{ $event->id }}">
                        View Requirements
                        <svg class="w-4 h-4 ml-2 transition-transform" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!-- Accordion Content -->
                    <div id="requirements-{{ $event->id }}" class="accordion-content overflow-hidden transition-all duration-300 ease-in-out max-h-0">
                        <table class="min-w-full bg-white dark:text-white dark:bg-gray-700 rounded-lg shadow-md mt-4">
                            <thead>
                                <tr class="bg-purple-200 dark:bg-purple-600">
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
                </div>
            </div>
        </div>
    @endforeach
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