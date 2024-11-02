@extends('layouts.app')

@section('title', 'Income Categories')

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
<div class="container mx-auto lg:px-4 py-8">
    <div class="card p-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
        <div class="p-4">
            <div class="container mx-auto p-6">
                <div class="pt-4 pb-4">
                    <div class="flex items-center justify-between pt-4">
                        <h2 class="text-2xl dark:text-white font-semibold mb-4">Incomes under the Category: {{ $category->name }}</h2>
                        <div>
                            <a href="{{ route('admin.income_categories') }}" class="inline-flex items-center bg-purple-600 text-white font-medium rounded-lg px-4 py-2 mb-6 transition duration-300 hover:bg-purple-700">
                                <i class="fas fa-arrow-left mr-2"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                @if ($incomes->isEmpty())
                    <div class="flex items-center justify-center py-6">
                        <p class="flex items-center bg-blue-100 border-l-4 border-blue-700 rounded-md p-4 mb-4 text-sm text-gray-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <i class="fas fa-info-circle text-blue-600 dark:text-blue-300 mr-2"></i>
                            No incomes found for this category. Please check back later or add a new record.
                        </p>
                    </div>
                @else
                    <div class="overflow-x-auto mt-4">
                        <table class="min-w-full bg-white dark:bg-gray-800 shadow-md rounded-lg data-table">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Date
                                    </th>
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Name
                                    </th>
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Amount
                                    </th>
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Mobile Number
                                    </th>
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Pan Number
                                    </th>
                                    <th class="py-3 px-6 text-left text-sm font-medium text-gray-700 dark:text-gray-200">
                                        Payment Method
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($incomes as $income)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="py-4 px-6 text-gray-900 dark:text-gray-200">
                                            {{ $income->entry_date->format('Y-m-d') }}
                                        </td>
                                        <td class="py-4 px-6 text-gray-900 dark:text-gray-200">
                                            {{ $income->name }}
                                        </td>
                                        <td class="py-4 px-6 text-gray-900 dark:text-gray-200">
                                            ${{ number_format($income->amount, 2) }}
                                        </td>
                                        <td class="py-4 px-6 text-gray-900 dark:text-gray-200">
                                            {{ $income->mobile_number }}
                                        </td>
                                        <td class="py-4 px-6 text-gray-900 dark:text-gray-200">
                                            {{ $income->pan_number }}
                                        </td>
                                        <td class="py-4 px-6 text-gray-900 dark:text-gray-200">
                                            {{ $income->payment_method }}
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
</div>
@endsection