@extends('layouts.app')

@section('title', 'Enroll Income')

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container mx-auto py-4">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md pt-4 mb-6">
        <div class="pt-4 pb-4">
            <div class="flex items-center justify-between pt-4">
                <h2 class="lg:text-2xl text-md dark:text-white font-semibold mb-4">All Transactions Income</h2>
                <div>
                    <a href="{{ route('admin.income.create') }}" class="inline-block whitespace-nowrap bg-purple-600 text-white font-medium rounded-lg px-4 py-2 mb-6 transition duration-300 hover:bg-purple-700">
                        Add Income
                    </a>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto custom-scrollbar mb-5 pt-4">
            @if($incomes->isEmpty())
                <div class="py-4 text-center text-gray-500 dark:text-gray-400">
                    <p class="bg-blue-100 border-l-4 borderlue-700 rounded-md p-4 mb-4 text-sm text-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        No expenses found.
                    </p>
                </div>
            @else
                <div class="relative overflow-y-auto overflow-x-auto custom-scrollbar shadow-md mb-2 rounded-lg border border-gray-300 dark:border-gray-600">
                    <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white rounded-lg dark:bg-gray-800">
                        <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 rounded-tl-lg">Date</th>
                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">Amount</th>
                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">Name</th>
                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">Category</th>
                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">Number</th>
                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600">Pan Number</th>
                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 rounded-tr-lg">Payment method</th>
                                <th class="px-6 py-3 border-b border-gray-300 dark:border-gray-600 rounded-tr-lg">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($incomes as $income)
                                <tr class="bg-white text-center border dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td style="max-width: 100px; min-width: 100px" class="px-4 py-2 border whitespace-nowrap border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white">
                                        {{ $income->entry_date->format('d-m-Y') }}
                                    </td>
                                    <td class="border border-gray-300 text-grey-600 dark:border-gray-600 whitespace-nowrap text-gray-900 dark:text-white">
                                        Rs {{ number_format($income->amount) }}
                                    </td>
                                    <td class="border border-gray-300 text-grey-600 dark:border-gray-600 text-gray-900 dark:text-white">
                                        {{ $income->name }}
                                    </td>
                                    {{-- <td class="px-6 py-4 border border-gray-300 text-gray-900 dark:border-gray-600 cursor-pointer dark:text-white" x-data="{ open: false }">
                                        <div @click="open = !open" class="flex flex-col">
                                            <span x-show="!open" class="description-minimal">{{ Str::limit($income->description, 9) }}...</span>
                                            <span x-show="open" class="description-full">{{ $income->description }}</span>
                                        </div>
                                    </td> --}}
                                    <td class="border border-gray-300 text-gray-900 dark:border-gray-600  dark:text-white">
                                        {{ $income->incomeCategory->name }}
                                    </td>
                                    <td class="border border-gray-300 text-gray-900 dark:border-gray-600 whitespace-nowrap dark:text-white">
                                        {{ $income->mobile_number }}
                                    </td>
                                    <td class="border border-gray-300 text-gray-900 dark:border-gray-600 whitespace-nowrap dark:text-white">
                                        {{ $income->pan_number }}
                                    </td>
                                    <td class="border border-gray-300 text-gray-900 dark:border-gray-600  dark:text-white">
                                        {{ $income->payment_method }}
                                    </td>
                                    <td class="border border-gray-300 text-gray-900 dark:border-gray-600 dark:text-white">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.income.edit', $income->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600">
                                            Edit
                                        </a>
                                    
                                        <!-- Delete Button -->
                                        <button onclick="confirmDelete({{ $income->id }})" class="ml-2 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                                            Delete
                                        </button>
                                    
                                        <!-- Form for Deletion -->
                                        <form id="delete-form-{{ $income->id }}" action="{{ route('admin.income.destroy', $income->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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