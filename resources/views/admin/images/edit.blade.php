@extends('layouts.app')

@section('scripts')
<script>
    let requirementIndex = {{ count(json_decode($image->requirements, true) ?? []) }};

    document.getElementById('add-more-requirements').addEventListener('click', function() {
        const requirementFields = document.getElementById('requirement-fields');

        const newRequirementGroup = document.createElement('div');
        newRequirementGroup.classList.add('requirement-group', 'flex', 'gap-4', 'items-center', 'mb-4');

        newRequirementGroup.innerHTML = `
            <div class="flex-1">
                <label>Requirement Name</label>
                <input type="text" name="requirements[${requirementIndex}][requirement_name]" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
            </div>
            <div class="flex-1">
                <label>Cost</label>
                <input type="number" name="requirements[${requirementIndex}][cost]" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
            </div>
            <div class="flex-1">
                <label>Quantity</label>
                <input type="number" name="requirements[${requirementIndex}][quantity]" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
            </div>
            <button type="button" class="remove-requirement bg-red-500 text-white px-4 py-2 rounded-lg mt-6 dark:text-white-400">Remove</button>
        `;
        requirementFields.appendChild(newRequirementGroup);
        requirementIndex++;
    });

    document.getElementById('requirement-fields').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-requirement')) {
            event.target.closest('.requirement-group').remove(); // This removes the entire requirement group
        }
    });


    document.getElementById('start_date').addEventListener('change', validateDates);
    document.getElementById('end_date').addEventListener('change', validateDates);

    function validateDates() {
        const startDate = new Date(document.getElementById('start_date').value);
        const endDate = new Date(document.getElementById('end_date').value);

        if (startDate && endDate && startDate > endDate) {
            alert('Start date cannot be after the end date');
            document.getElementById('start_date').value = '';
        }
    }

</script>
<script>
    function disableButton() {
        const submitButton = document.getElementById('submitButton');
        submitButton.disabled = true; // Disable the button
        submitButton.innerText = 'Updating...'; // Change the button text
        submitButton.classList.add('bg-gray-500'); // Optional: Change the button color
    }
</script>
@endsection

@section('content')
<div class="container mx-auto lg:px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <form id="imageForm" method="POST" action="{{ route('admin.images.update', $image->id) }}" enctype="multipart/form-data" onsubmit="disableButton()">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $image->title) }}" required class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4 flex gap-4">
                <div class="flex-1">
                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('end_date', $image->start_date ? $image->start_date->format('Y-m-d') : '') }}" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                </div>
    
                <div class="flex-1">
                    <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $image->end_date ? $image->end_date->format('Y-m-d') : '') }}" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">{{ old('description', $image->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Only upload the image you want edited (the image size should not exceed 2 MB.)</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                <select name="view" id="view" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                    <option value="gallery" {{ $image->status == 'gallery' ? 'selected' : '' }}>Gallery</option>
                    <option value="event" {{ $image->status == 'event' ? 'selected' : '' }}>Event</option>
                    <option value="event_and_gallery" {{ $image->status == 'event_and_gallery' ? 'selected' : '' }}>Event & Gallery</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location', $image->location) }}" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
            </div>

            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event Status</label>
            <select name="event_status" class="mt-1 block w-full border-gray-300 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                <option value="upcoming" {{ $image->event_status == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                <option value="finished" {{ $image->event_status == 'finished' ? 'selected' : '' }}>Finished</option>
                <option value="planning" {{ $image->event_status == 'planning' ? 'selected' : '' }}>Planning</option>
            </select>

            <div id="requirement-fields">
                @foreach (json_decode($image->requirements, true) ?? [] as $index => $requirement)
                <div class="requirement-group flex gap-4 items-center mb-4">
                    <div class="flex-1">
                        <label>Requirement Name</label>
                        <input type="text" name="requirements[{{ $index }}][requirement_name]" value="{{ $requirement['requirement_name'] }}" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="flex-1">
                        <label>Cost</label>
                        <input type="number" name="requirements[{{ $index }}][cost]" value="{{ $requirement['cost'] }}" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="flex-1">
                        <label>Quantity</label>
                        <input type="number" name="requirements[{{ $index }}][quantity]" value="{{ $requirement['quantity'] }}" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="pt-4">
                        <button type="button" class="remove-requirement bg-red-500 text-white px-4 py-2 rounded-lg mt-2 dark:text-white-400">Remove</button>
                    </div>
                </div>
                @endforeach
            </div>

            <button type="button" id="add-more-requirements" class="bg-purple-500 text-white px-4 py-2 rounded-lg mt-2">Add More Requirements</button>

            <div class="flex justify-end mt-4">
                <button id="submitButton" type="submit" class="bg-purple-500 text-white px-4 py-2 rounded-lg">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection