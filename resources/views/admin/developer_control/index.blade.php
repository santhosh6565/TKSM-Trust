@extends('layouts.app')

@section('title', 'Developer Control')

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle restore button confirmation
        const restoreForms = document.querySelectorAll('.restore-form');
        restoreForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to restore this user!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, restore it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form if confirmed
                    }
                });
            });
        });

        // Handle delete button confirmation
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent form submission
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form if confirmed
                    }
                });
            });
        });
    });
</script>
@endsection

@section('content')
<div class="container mx-auto px-4 py-4">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md pt-4 mb-6">
        <h2>Trashed Users</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="mb-2 overflow-x-auto custom-scrollbar ">
            <table class="min-w-full table-auto bg-white border border-gray-300 rounded-lg shadow-md dark:bg-gray-800">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-left">
                        <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 whitespace-nowrap dark:border-gray-600">ID</th>
                        <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 whitespace-nowrap dark:border-gray-600">Name</th>
                        <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Email</th>
                        <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Phone</th>
                        <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Address</th>
                        <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 whitespace-nowrap dark:border-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trashedUsers as $user)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                            <td class="px-4 py-2 border border-gray-300 dark:text-white dark:border-gray-600">{{ $user->id }}</td>
                            <td class="px-4 py-2 border border-gray-300 dark:text-white dark:border-gray-600">{{ $user->name }}</td>
                            <td class="px-4 py-2 border border-gray-300 dark:text-white dark:border-gray-600">{{ $user->email }}</td>
                            <td class="px-4 py-2 border border-gray-300 dark:text-white dark:border-gray-600">{{ $user->phone }}</td>
                            <td class="px-4 py-2 border border-gray-300 dark:text-white dark:border-gray-600">{{ $user->address }}</td>
                            <td class="px-4 py-2 border border-gray-300 dark:text-white dark:border-gray-600">
                                <!-- Restore User -->
                                <form action="{{ route('developer.user.restore', $user->id) }}" method="POST" style="display:inline-block;" class="restore-form">
                                    @csrf
                                    <button type="submit" class="flex items-center justify-center w-8 h-8 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-full active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" aria-label="Restore User">
                                        <i class="fas fa-undo-alt"></i> <!-- Font Awesome icon for restore -->
                                    </button>
                                </form>
                            
                                <!-- Permanently Delete User -->
                                <form action="{{ route('developer.user.force-delete', $user->id) }}" method="POST" style="display:inline-block;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center justify-center w-8 h-8 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-full active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" aria-label="Delete User Permanently">
                                        <i class="fas fa-trash-alt"></i> <!-- Font Awesome icon for delete -->
                                    </button>
                                </form>
                            </td>                                                                                  
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No trashed users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>        
    </div>
</div>
@endsection