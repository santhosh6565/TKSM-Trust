@extends('layouts.app')

@section('scripts')
<script>
    let requirementIndex = 1;

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
            event.target.parentElement.remove();
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
        submitButton.innerText = 'Creating...'; // Change the button text
        submitButton.classList.add('bg-gray-500'); // Optional: Change the button color
    }
</script>
@endsection

@section('css')
    
@endsection

@section('content')
<div class="container mx-auto lg:px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <form id="imageForm" method="POST" action="{{ route('admin.images.store') }}" enctype="multipart/form-data" onsubmit="disableButton()">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" required class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                <input type="date" name="end_date" id="end_date" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload Image (AVIF only)</label>
                <input type="file" name="image" id="image" required class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
            </div>

            <div class="mb-4">
                <label for="view" class="block text-sm font-medium text-gray-700 dark:text-gray-300">View</label>
                <select name="view" id="view" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
                    <option value="gallery">Gallery</option>
                    <option value="event">Event</option>
                    <option value="event_and_gallery">Event & Gallery</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                <input type="text" name="location" id="location" class="mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white">
            </div>

            <div id="requirement-fields">
                <div class="requirement-group flex gap-4 items-center mb-4">
                    <div class="flex-1">
                        <label>Requirement Name</label>
                        <input type="text" name="requirements[0][requirement_name]" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="flex-1">
                        <label>Cost</label>
                        <input type="number" name="requirements[0][cost]" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="flex-1">
                        <label>Quantity</label>
                        <input type="number" name="requirements[0][quantity]" class="form-control mt-1 block w-full p-2 border rounded-lg dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="pt-4">
                        <button type="button" class="remove-requirement bg-red-500 text-white px-4 py-2 rounded-lg mt-2 dark:text-white-400">Remove</button>
                    </div>
                </div>
            </div>

            <button type="button" id="add-more-requirements" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-2">Add More Requirements</button>

            <div class="flex justify-end mt-4">
                <button id="submitButton" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Creat</button>
            </div>
        </form>
    </div>
</div>
@endsection