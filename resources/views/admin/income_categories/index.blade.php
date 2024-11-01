@extends('layouts.app')

@section('title', 'Income Categories')

@section('scripts')
<script>
    // JavaScript to open and close the modal
    document.getElementById("openModal").addEventListener("click", function (event) {
        event.preventDefault();
        document.getElementById("categoryModal").classList.remove("hidden");
    });

    document.getElementById("closeModal").addEventListener("click", function () {
        document.getElementById("categoryModal").classList.add("hidden");
    });

    document.getElementById("cancelModal").addEventListener("click", function () {
        document.getElementById("categoryModal").classList.add("hidden");
    });

    // Close modal when clicking outside the modal content
    window.addEventListener("click", function (event) {
        const modal = document.getElementById("categoryModal");
        const modalContent = document.getElementById("modalContent");
        if (event.target === modal && !modalContent.contains(event.target)) {
            modal.classList.add("hidden");
        }
    });
</script>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card bg-white p-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <div class="p-4">
            <div class="flex items-center justify-between pt-4">
                <h2 class="text-2xl dark:text-white font-semibold mb-4">Income Categories</h2>
                <div>
                    <a href="#" class="inline-block bg-purple-600 text-white font-medium rounded-lg px-4 py-2 mb-6 transition duration-300 hover:bg-purple-700" id="openModal">
                        Add Category
                    </a>
                
                    <!-- Modal Background -->
                    <div id="categoryModal" 
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden"> <!-- Modal initially hidden -->
            
                        <!-- Modal Content -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-3/4 md:w-96 relative" id="modalContent">
                            <header class="flex justify-end">
                                <button
                                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover:text-gray-700"
                                    aria-label="close"
                                    id="closeModal"
                                >
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                        <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </header>
                            
                            <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-200">Create Income Category</h2>
                            
                            <p class="bg-purple-100 border-l-4 border-purple-700 rounded-md p-4 mb-4 text-sm text-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                This income category is used to organize incomes, making it easier to maintain.
                            </p>
                            
                            <form action="{{ route('admin.income_categories.create') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Category Name<span class="m-1 text-red-500">*</span></label>
                                    <input type="text" name="name" class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-purple-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500" required>
                                </div>
                            
                                <div class="flex justify-end space-x-2">
                                    <button type="button" id="cancelModal" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 transition duration-300">
                                        Cancel
                                    </button>
                                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300 transition duration-300">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>         
        </div>

        <div class="pt-4 pb-4">
            <p class="bg-purple-100 border-l-4 border-purple-700 rounded-md p-4 mb-4 text-sm text-gray-700 dark:bg-gray-700 dark:border-purple-600 dark:text-white">
                1. This income Category is used to organize the incomes, making it easier to maintain.
            </p>
        </div>
    
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Created At</th>
                        <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($categories as $category)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="py-4 px-6 text-gray-900 dark:text-gray-200">{{ $category->name }}</td>
                            <td class="py-4 px-6 text-gray-900 dark:text-gray-200">{{ $category->created_at->format('Y-m-d') }}</td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center">
                                    <form action="{{ route('admin.income_categories.show', $category->id) }}" method="GET" class="inline">
                                        <button
                                            type="submit"
                                            class="flex items-center justify-center px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-500 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                            aria-label="View incomes"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form>
                                    
                                    <div x-data="{ isModalOpen: false, currentCategoryName: '{{ $category->name }}' }">
                                    <button
                                        @click="isModalOpen = true"
                                        class="ml-2 flex items-center justify-center px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-yellow-500 border border-transparent rounded-full active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow"
                                        aria-label="Edit income Category"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                
                                    <!-- Modal with x-cloak to prevent flicker -->
                                    <div
                                        x-show="isModalOpen"
                                        x-cloak
                                        x-transition:enter="transition ease-out duration-150"
                                        x-transition:enter-start="opacity-0"
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50 sm:items-center sm:justify-center"
                                    >
                                        <div
                                            x-show="isModalOpen"
                                            x-cloak
                                            x-transition:enter="transition ease-out duration-150"
                                            x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0 transform translate-y-1/2"
                                            @click.away="isModalOpen = false"
                                            @keydown.escape.window="isModalOpen = false"
                                            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                                            role="dialog"
                                            id="modal"
                                        >
                                            <!-- Modal header -->
                                            <header class="flex justify-end">
                                                <button
                                                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover:text-gray-700"
                                                    aria-label="close"
                                                    @click="isModalOpen = false"
                                                >
                                                    <svg
                                                        class="w-4 h-4"
                                                        fill="currentColor"
                                                        viewBox="0 0 20 20"
                                                        role="img"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"
                                                            fill-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </header>
                                
                                            <!-- Modal body -->
                                            <div class="mt-4 mb-6">
                                                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                                                    Edit income Category
                                                </p>
                                                <form action="{{ route('admin.income_categories.update', $category->id) }}" method="POST">
                                                    @csrf
                                                    <input 
                                                        type="text" 
                                                        name="name" 
                                                        x-model="currentCategoryName" 
                                                        class="border rounded w-full px-3 py-2 mb-4" 
                                                        required 
                                                        placeholder="Category Name" 
                                                    />
                                            </div>
                                
                                            <!-- Modal footer -->
                                            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                                <button
                                                    @click="isModalOpen = false"
                                                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                                                >
                                                    Cancel
                                                </button>
                                                <button
                                                    type="submit"
                                                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                                >
                                                    Update
                                                </button>
                                            </footer>
                                                </form>
                                            </div>
                                        </div>
                                    </div>                                  

                                    <form action="{{ route('admin.income_categories.delete', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category and its incomes?');">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="ml-2 flex items-center justify-center px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-full active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                                            aria-label="Delete income Category"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>                
            </table>
        </div>
    </div>    
</div>
@endsection
