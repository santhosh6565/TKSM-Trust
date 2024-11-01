@extends('layouts.app')

@section('title', 'Announcement Module')

@section('scripts')
    <script>
    $(document).ready(function() {
        $('.permissions-select').select2({
            placeholder: "Select permissions",
            tags: true,
            width: '100%' // For full-width display
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="pb-8">
        <div class="card p-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <h1 class="pb-4 pt-4 text-2xl dark:text-white font-semibold mb-4">Create Announcement</h1>
            <form id="announcementForm" method="POST" action="{{ route('admin.announcement.store') }}" class="mb-6">
                @csrf
                <div class="">
                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title" class="form-label text-sm font-medium text-gray-900 dark:text-white">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" name="title" 
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    
                    <!-- Description Field -->
                    <div class="mb-3">
                        <label for="description" class="form-label text-sm font-medium text-gray-900 dark:text-white">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" 
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <!-- User Selector Field -->
                    <div class="mb-3">
                        <label for="userSelector" class="form-label text-sm font-medium text-gray-900 dark:text-white">
                            Select Users
                        </label>
                        <select class="permissions-select" name="user_ids[]" multiple
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Notify All Users Checkbox -->
                    <div class="mb-3 pt-6 flex items-center">
                        <input type="checkbox" id="is_all_users" name="is_all_users" 
                            class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:bg-gray-700 dark:border-gray-600" value="1">
                        <label for="is_all_users" class="ml-2 text-sm font-medium text-gray-900 dark:text-white">Notify all users</label>
                    </div>
                </div>

                <button type="submit" 
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800 mt-4">
                    Create Announcement
                </button>
            </form>
        </div>
    </div>
    <div class="pb-4">
        <div class="card p-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            @if ($announcements->isEmpty())
                <div class="flex items-center justify-center p-6 bg-purple-100 dark:bg-purple-800 rounded-lg shadow-md">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mx-auto mb-4 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14.75V6m0 8.75h-3a1 1 0 000 2h6a1 1 0 000-2h-3zm3-8h.01M15 5.75A7.25 7.25 0 1117.25 12" />
                        </svg>
                        <h3 class="text-xl font-semibold mb-2 dark:text-white">No Announcements</h3>
                        <p class="text-gray-600 dark:text-gray-300">It looks like there are currently no announcements to display. Please check back later!</p>
                    </div>
                </div>
            @else
                <h1 class="pt-6 text-2xl dark:text-white font-semibold mb-4 text-center">Create Announcement</h1>
                <div class="container overflow-x-auto custom-scrollbar mx-auto py-6">
                    <table class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full table-auto">
                        <thead>
                            <tr class="w-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                <th class="py-2 px-4 text-left text-sm font-medium">Title</th>
                                <th class="py-2 px-4 text-left text-sm font-medium">Description</th>
                                <th class="py-2 px-4 text-left text-sm font-medium">For</th>
                                <th class="py-2 px-4 text-left text-sm font-medium">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($announcements->count() > 30)
                                <script>
                                    alert('Warning: The number of announcements exceeds 30!');
                                </script>
                            @endif
                            
                            @foreach ($announcements as $announcement)
                                <tr class="border-b dark:border-gray-600">
                                    <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-300">
                                        <span x-data="{ expanded: false }">
                                            <span @click="expanded = !expanded" class="cursor-pointer" x-show="!expanded">{{ Str::limit($announcement->title, 30) }}</span>
                                            <span x-show="expanded" @click="expanded = !expanded">{{ $announcement->title }}</span>
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 text-sm text-gray-900 dark:text-gray-300">
                                        <span x-data="{ expanded: false }">
                                            <span @click="expanded = !expanded" class="cursor-pointer" x-show="!expanded">{{ Str::limit($announcement->description, 30) }}</span>
                                            <span x-show="expanded" @click="expanded = !expanded">{{ $announcement->description }}</span>
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-medium">
                                            @if ($announcement->is_all_users)
                                                All Users
                                            @else
                                                {{ implode(', ', $announcement->users()->pluck('name')->toArray()) }}
                                            @endif
                                        </span>                                                                                
                                    </td>
                                    <td class="py-2 px-4 text-sm text-gray-500 dark:text-gray-400">
                                        <div class="flex justify-center">
                                            <!-- Delete Button -->
                                            <button class="text-red-500 hover:text-red-700" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m6 0H9m0 0h6m-6 0V6m0 6H6a2 2 0 01-2-2V4a2 2 0 012-2h12a2 2 0 012 2v6a2 2 0 01-2 2h-6z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>            
            @endif
        </div>
    </div>    
</div>
@endsection