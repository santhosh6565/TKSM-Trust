@extends('layouts.app')

@section('title', 'Events Management')

@section('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('descriptionToggle', () => ({
            expanded: false,
        }));
    });
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                // Show SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit(); // Submit the form if confirmed
                    }
                });
            });
        });
    });
</script>
@endsection

@section('css')
    
@endsection
@section('content')
<div class="container mx-auto lg:px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <div class="m-2 pt-4 pb-4">
            <div class="flex items-center justify-between pt-4">
                <h2 class="text-2xl dark:text-white font-semibold mb-4"></h2>
                <div x-data="{ isCategoryModalOpen: false }">
                    <a href="{{ route('admin.images.create') }}" class="inline-block bg-purple-600 text-white font-medium rounded-lg px-4 py-2 mb-6 transition duration-300 hover:bg-purple-700">
                        Add Event
                    </a>
                </div>
            </div>
        </div>
        <div class="pt-4 pb-4 flex items-center">
            <h3 class="mr-3 dark:text-white">View Counts:</h3>
            <span class="bg-blue-500 text-white px-2 py-1 rounded-lg mr-2 dark:bg-blue-700">Event: {{ $imageCounts->get('Event')->count ?? 0 }}</span>
            <span class="bg-gray-500 text-white px-2 py-1 rounded-lg mr-2 dark:bg-gray-700">Gallery: {{ $imageCounts->get('gallery')->count ?? 0 }}</span>
            <span class="bg-green-500 text-white px-2 py-1 rounded-lg dark:bg-green-700">Event and Gallery: {{ $imageCounts->get('event_and_gallery')->count ?? 0 }}</span>
        </div>              
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($images as $image)
                <!-- Wrap each card in its own Alpine.js component -->
                <div x-data="{ expanded: false }" class="bg-gray-50 dark:bg-gray-700 shadow-md border border-gray-200 dark:border-none rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $image->title }}</h2>
                        
                        <!-- Description with toggle specific to this card -->
                        <p class="text-sm text-gray-600 dark:text-gray-400 cursor-pointer" @click="expanded = !expanded">
                            <span x-show="!expanded">{{ Str::limit($image->description, 30) }}</span>
                            <span x-show="expanded">{{ $image->description }}</span>
                        </p>
                        
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Location:</strong> {{ $image->location }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>Event Status:</strong> {{ ucfirst($image->event_status) }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><strong>View Status:</strong> {{ ucfirst($image->view) }}</p>

                        <div class="flex items-center justify-between mt-4">
                            <a href="{{ route('admin.images.edit', $image->id) }}" class="text-blue-500 dark:text-blue-400 hover:underline">Edit</a>
                            <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 dark:text-red-400 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection