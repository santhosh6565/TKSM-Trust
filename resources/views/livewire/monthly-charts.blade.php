<div>
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md mb-4">
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
                    <button type="submit"  class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Filter</button>
                </div>
            </form>            
        </div>

        <div class="pt-4">
            <div class="flex flex-col md:flex-row items-center justify-center gap-6">
                <div class="pe-4">
                    <div class="my-6 w-full max-w-xs md:max-w-md">
                        <canvas id="myPieChart" width="400" height="400"></canvas>
                    </div>
                </div>
                <div class="ps-4"></div>
                <div class="ps-6"></div>
                <div class="ps-6"></div>
                <div class="ps-4 pt-4"> <!-- Add padding top to this div -->
                    <div class="my-6 w-full max-w-xs md:max-w-md">
                        <canvas id="myBarChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>               
    </div>

    <script>
        let myPieChart;
        let myBarChart;
    
        // Function to initialize charts
        function initCharts(income, expenses, profit) {
            const pieCtx = document.getElementById('myPieChart').getContext('2d');
            if (myPieChart) myPieChart.destroy();
    
            myPieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Income', 'Expenses', 'Profit'],
                    datasets: [{
                        label: 'Amount',
                        data: [income, expenses, profit],
                        backgroundColor: ['#4CAF50', '#FF5722', '#2196F3'],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: { display: true, text: 'Monthly Financial Report - Pie Chart' }
                    }
                }
            });
    
            const barCtx = document.getElementById('myBarChart').getContext('2d');
            if (myBarChart) myBarChart.destroy();
    
            myBarChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['Income', 'Expenses', 'Profit'],
                    datasets: [{
                        label: 'Amount',
                        data: [income, expenses, profit],
                        backgroundColor: ['#4CAF50', '#FF5722', '#2196F3'],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'top' },
                        title: { display: true, text: 'Monthly Financial Report - Bar Chart' }
                    }
                }
            });
        }
    
        // Listen for the 'update-charts' event and reinitialize charts with updated data
        window.addEventListener('update-charts', () => {
            if (@this.income !== undefined && @this.expenses !== undefined && @this.profit !== undefined) {
                initCharts(@this.income, @this.expenses, @this.profit);
            }
        });
    
        // Initialize charts on page load with initial data from Livewire properties
        document.addEventListener('DOMContentLoaded', () => {
            // initCharts(@this.income, @this.expenses, @this.profit);
            initCharts({{ $income }}, {{ $expenses }}, {{ $profit }});
        });
    </script>      
</div>