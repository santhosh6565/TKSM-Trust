@extends('layouts.app')

@section('title', 'Expenses Categories')

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Define the title dynamically for export files
            var exportTitle = "Expenses under the Category: {{ $category->name }}";
    
            // Function to initialize DataTable on elements with the specified class
            function initializeDataTable(tableClass) {
                $(tableClass).DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'copy',
                            title: exportTitle
                        },
                        {
                            extend: 'csv',
                            title: exportTitle
                        },
                        {
                            extend: 'excel',
                            title: exportTitle
                        },
                        {
                            extend: 'pdf',
                            title: exportTitle
                        },
                        {
                            extend: 'print',
                            title: exportTitle
                        },
                        'colvis'
                    ],
                    responsive: true,
                    lengthMenu: [10, 25, 50, 100],
                    pageLength: 10
                });
            }
    
            // Initialize DataTable for tables with the class 'data-table'
            initializeDataTable('.data-table');
        });
    
        window.addEventListener('beforeunload', (event) => {
            // Perform cleanup or save state here
            localStorage.setItem('myData', JSON.stringify(myData));
    
            // Display a confirmation message to the user
            const confirmationMessage = "Are you sure you want to leave this page?";
            event.returnValue = confirmationMessage; // For some browsers
            return confirmationMessage; // For others
        });
    </script>    
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md pt-4 mb-6">
        <div class="pt-4 pb-4">
            <div class="flex items-center justify-between pt-4">
                <h2 class="text-2xl dark:text-white font-semibold mb-4">Expenses under the Category: {{ $category->name }}</h2>
                <div>
                    <a href="{{ route('admin.expense_categories') }}" class="inline-flex items-center bg-purple-600 text-white font-medium rounded-lg px-4 py-2 mb-6 transition duration-300 hover:bg-purple-700">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                </div>
            </div>
        </div>
        {{-- <h3 class="text-xl pt-4 font-bold mb-4 text-gray-800 dark:text-gray-200">Expenses under the Category: {{ $category->name }}</h3> --}}
        @if ($expenses->isEmpty())
            <tr>
                <td colspan="3" class="py-4 px-6 text-center text-gray-500 dark:text-gray-400">
                    <p class="bg-blue-100 border-l-4 border-blue-700 rounded-md p-4 mb-4 text-sm text-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        No expenses found for this category.
                    </p>
                </td>
            </tr>
        @else
        <div class="overflow-x-auto custom-scrollbar mb-5 pt-4">
            <div class="min-w-full lg:max-w-screen-lg">
                <table class=" tableClass min-w-full table-auto bg-white border-gray-300 rounded-lg shadow-md data-table dark:bg-gray-800">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-left">
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Date</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Name</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Amount</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Mobile Number</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Pan Number</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Payement method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenses as $expense)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $expense->entry_date->format('Y-m-d') }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $expense->name }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">Rs {{ number_format($expense->amount, 2) }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $expense->mobile_number }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $expense->pan_number }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $expense->payment_method }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection