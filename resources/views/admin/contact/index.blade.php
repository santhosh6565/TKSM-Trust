@extends('layouts.app')

@section('title', 'Contact form')

@section('scripts')

@endsection

@section('content')
<div class="container mx-auto lg:px-4 py-8">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl dark:text-white font-semibold">Contact Messages</h2>
            <div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center bg-purple-600 text-white font-medium rounded-lg px-4 py-2 transition duration-300 hover:bg-purple-700">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
                </a>
            </div>
        </div>
        
        @if ($contacts->isEmpty())
            <p class="bg-blue-100 border-l-4 border-blue-700 rounded-md p-4 mb-4 text-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                No contact messages found.
            </p>
        @else
            <div class="overflow-x-auto custom-scrollbar mb-5">
                <table class="min-w-full bg-white border-gray-300 rounded-lg shadow-md dark:bg-gray-800">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="px-4 py-2 border border-gray-300 text-left text-gray-800 dark:text-gray-300 dark:border-gray-600">Name</th>
                            <th class="px-4 py-2 border border-gray-300 text-left text-gray-800 dark:text-gray-300 dark:border-gray-600">Email</th>
                            <th class="px-4 py-2 border border-gray-300 text-left text-gray-800 dark:text-gray-300 dark:border-gray-600">Message</th>
                            <th class="px-4 py-2 border border-gray-300 text-left text-gray-800 dark:text-gray-300 dark:border-gray-600">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $contact->name }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $contact->email }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $contact->message }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $contact->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection