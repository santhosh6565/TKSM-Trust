@extends('layouts.app')

@section('content')
<div class="container mx-auto lg:px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-900 dark:text-gray-100">Add Expense</h2>
        <form action="{{ route('admin.expense.update', $expense->id) }}" method="POST">
            @csrf
    
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="entry_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Entry Date<span class="m-1 text-red-500">*</span></label>
                    <input type="date" name="entry_date" value="{{ old('entry_date', $expense->entry_date ? $expense->entry_date->format('Y-m-d') : '') }}" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                </div>

                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name<span class="m-1 text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $expense->name ?? '') }}" placeholder="Enter name" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount<span class="m-1 text-red-500">*</span></label>
                    <input type="number" name="amount" value="{{ old('amount', $expense->amount ?? '') }}" placeholder="Enter amount" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                </div>
                
                <div class="form-group mb-4">
                    <label for="payment_method" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Income Method<span class="m-1 text-red-500">*</span></label>
                    <select name="payment_method" class="mt-1 block w-full bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:focus:ring-blue-500" required>
                        <option value="">Select Method</option>
                        @foreach(App\Constants\PaymentConstants::INCOME_METHODS as $methodKey => $methodValue)
                            <option value="{{ $methodKey }}" {{ old('payment_method', $expense->payment_method ?? '') == $methodKey ? 'selected' : '' }}>{{ $methodValue }}</option>
                        @endforeach
                    </select>
                </div> 
            </div> 
    
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                <div>
                    <label for="mobile_number" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Mobile Number (Optional)</label>
                    <input type="text" name="mobile_number" value="{{ old('mobile_number', $expense->mobile_number ?? '') }}" placeholder="Enter mobile number" class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring focus:ring-purple-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500">
                </div>
                <div>
                    <label for="pan_number" class="block text-sm font-medium text-gray-700 dark:text-gray-200">PAN Number (Optional)</label>
                    <input type="text" name="pan_number" value="{{ old('pan_number', $expense->pan_number ?? '') }}" placeholder="Enter PAN number" class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring focus:ring-purple-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500">
                </div>
            </div>
    
            <div class="mb-4">
                <label for="area" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Area (Optional)</label>
                <input type="text" name="area" value="{{ old('area', $expense->area ?? '') }}" placeholder="Enter area" class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring focus:ring-purple-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description<span class="m-1 text-red-500">*</span></label>
                <textarea name="description" placeholder="Optional description" class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring focus:ring-purple-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500" rows="3" required>{{ old('description', $expense->description ?? '') }}</textarea>
            </div>
    
            <div class="mb-6">
                <label for="expense_category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Category<span class="m-1 text-red-500">*</span></label>
                <select name="expense_category_id" class="mt-1 block w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring focus:ring-purple-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-purple-500" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('expense_category_id', $expense->expense_category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="bg-purple-600 text-white font-medium rounded-lg px-4 py-2 hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-300 w-full transition duration-300">Add Expense</button>
        </form>
    </div>    
</div>
@endsection