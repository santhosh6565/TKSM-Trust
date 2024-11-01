<div class="container mx-auto my-5">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-6">
        <h2 class="text-2xl font-bold text-center mb-5 text-gray-800 dark:text-gray-200">
            Monthly Report for {{ $year }}-{{ $month }}
        </h2>

        <div class="flex justify-end mb-5">
            <form wire:submit.prevent="fetchData" class="flex items-center space-x-3">
                <div class="relative">
                    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Year</label>
                    <select wire:model="year" id="year" class="block mt-1 border border-gray-300 dark:text-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-800">
                        @for($i = 2020; $i <= \Carbon\Carbon::now()->year; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="relative">
                    <label for="month" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Month</label>
                    <select wire:model="month" id="month" class="block mt-1 border border-gray-300 dark:border-gray-600 dark:text-gray-300 rounded-md dark:bg-gray-800">
                        @for($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}">{{ \Carbon\Carbon::create()->month($m)->format('F') }}</option>
                        @endfor
                    </select>
                </div>
                <div class="pt-6">
                    <button type="submit" class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Filter</button>
                </div>
            </form>            
        </div>

        <div class="overflow-x-auto pt-4">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md dark:bg-gray-800">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-left">
                        <th class="px-4 py-2 border-b text-gray-800 dark:text-gray-300">Description</th>
                        <th class="px-4 py-2 border-b text-gray-800 dark:text-gray-300">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="px-4 py-2 border-b font-semibold text-gray-800 dark:text-gray-300">Income</td>
                        <td class="px-4 py-2 border-b text-gray-800 dark:text-gray-300">RS <span class="p-1">{{ number_format($income, 2) }}</span></td>
                    </tr>
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="px-4 py-2 border-b font-semibold text-gray-800 dark:text-gray-300">Expenses</td>
                        <td class="px-4 py-2 border-b text-gray-800 dark:text-gray-300">RS <span class="p-1">{{ number_format($expenses, 2) }}</span></td>
                    </tr>
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="px-4 py-2 border-b font-semibold text-gray-800 dark:text-gray-300">Profit</td>
                        <td class="px-4 py-2 border-b text-gray-800 dark:text-gray-300">RS <span class="p-1">{{ number_format($profit, 2) }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md pt-4 mb-6">
        <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">All Transactions (Income & Expenses)</h3>
        <div class="overflow-x-auto custom-scrollbar mb-5 pt-4">
            <div class="min-w-full lg:max-w-screen-lg">
                <table class="min-w-full table-auto bg-white border-gray-300 rounded-lg shadow-md data-table dark:bg-gray-800">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-left">
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Date</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Type</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Description</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Category</th>
                            <th class="px-4 py-2 border border-gray-300 text-gray-800 dark:text-gray-300 dark:border-gray-600">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($combined as $transaction)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $transaction['date'] }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $transaction['type'] }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $transaction['description'] }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">{{ $transaction['category'] }}</td>
                                <td class="px-4 py-2 border border-gray-300 dark:text-gray-300 dark:border-gray-600">RS {{ number_format($transaction['amount'], 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>
<script>
    $(document).ready(function() {
        // Function to initialize DataTable
        function initializeDataTable() {
            console.log('Initializing DataTable...');
            if ($.fn.DataTable.isDataTable('.data-table')) {
                console.log('Destroying existing DataTable instance');
                $('.data-table').DataTable().destroy(); // Destroy existing DataTable instance
            }

            // Check if the table has data before initializing
            console.log('Initializing new DataTable...');
            $('.data-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ],
                responsive: true,
                lengthMenu: [10, 25, 50, 100],
                pageLength: 10
            });
        }

        // Initialize DataTable on load
        initializeDataTable();

        // Livewire event listener for data updated
        Livewire.on('dataUpdated', function () {
            // console.log('Data updated event triggered');
            setTimeout(function() {
                initializeDataTable(); // Reinitialize DataTable
            }, 100); // Delay to allow DOM update
        });
    });
</script>