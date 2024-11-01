@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-gray-100">Add Income</h2>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.income.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="entry_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Entry Date<span class="m-1 text-red-500">*</span></label>
                    <input type="date" name="entry_date" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                </div>

                <div class="form-group mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name<span class="m-1 text-red-500">*</span></label>
                    <input type="text" name="name" placeholder="Enter name" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount<span class="m-1 text-red-500">*</span></label>
                    <input type="number" name="amount" placeholder="Enter amount" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                </div>
                
                <div class="form-group mb-4">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Income Method<span class="m-1 text-red-500">*</span></label>
                    <select name="payment_method" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                        <option value="">Select Method</option>
                        @foreach(App\Constants\PaymentConstants::INCOME_METHODS as $methodKey => $methodValue)
                            <option value="{{ $methodKey }}">{{ $methodValue }}</option>
                        @endforeach
                    </select>
                </div> 
            </div>           

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="mobile_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mobile Number (Optional)</label>
                    <input type="text" name="mobile_number" placeholder="Enter mobile number" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500">
                </div>

                <!-- PAN Number Field -->
                <div class="form-group">
                    <label for="pan_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">PAN Number (Optional)</label>
                    <input type="text" name="pan_number" placeholder="Enter PAN number" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500">
                </div>
            </div>

            <!-- Area Field -->
            <div class="form-group mb-4">
                <label for="area" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Area (Optional)</label>
                <input type="text" name="area" placeholder="Enter area" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500">
            </div>

            <div class="form-group mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description<span class="m-1 text-red-500">*</span></label>
                <textarea name="description" placeholder="Optional description" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" rows="3"></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="income_category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category<span class="m-1 text-red-500">*</span></label>
                <select name="income_category_id" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-purple-600 dark:bg-purple-700 text-white px-6 py-2 rounded-lg shadow-md hover:bg-purple-700 dark:hover:bg-purple-800 focus:outline-none focus:ring focus:ring-purple-300 dark:focus:ring-purple-500 transition duration-300">Add Income</button>
        </form>
    </div>
</div>
@endsection