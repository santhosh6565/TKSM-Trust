<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\IncomeCategory;
use App\Constants\PaymentConstants;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        // Get the current date and the date three months ago
        $threeMonthsAgo = now()->subMonths(3);

        // Fetch incomes from the past three months, ordered by the most recent
        $incomes = Income::with('incomeCategory')
            ->whereDate('entry_date', '>=', $threeMonthsAgo)
            ->orderBy('entry_date', 'desc')
            ->get();

        $categories = IncomeCategory::all();
        return view('admin.income.index', compact('incomes', 'categories'));
    }

    public function create(){
        $categories = IncomeCategory::all();
        return view('admin.income.create', compact( 'categories'));
    }

    public function store(Request $request)
    {
        // Input validation
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'payment_method' => 'required|string|in:' . implode(',', array_keys(PaymentConstants::INCOME_METHODS)),
            'entry_date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:15', // Optional mobile number validation
            'pan_number' => 'nullable|string|max:10',    // Optional PAN number validation
            'area' => 'nullable|string|max:255',         // Optional area validation
            'income_category_id' => 'required|exists:income_categories,id',
        ]);

        try {
            // Creating the income record
            Income::create([
                'name' => $validated['name'],
                'payment_method' => $validated['payment_method'],
                'entry_date' => $validated['entry_date'],
                'amount' => $validated['amount'],
                'description' => $validated['description'],
                'mobile_number' => $validated['mobile_number'], // Optional field
                'pan_number' => $validated['pan_number'],       // Optional field
                'area' => $validated['area'],                   // Optional field
                'income_category_id' => $validated['income_category_id'],
                'created_by_id' => auth()->id(),
            ]);

            return redirect()->route('admin.income')->with('success', 'income added successfully.');
        } catch (\Exception $e) {
            // Error handling
            return back()->withErrors(['error' => 'Failed to add income: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'entry_date' => 'required|date',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'description' => 'nullable|string',
            'income_category_id' => 'required|exists:income_categories,id',
            'mobile_number' => 'nullable|string|max:15',
            'pan_number' => 'nullable|string|max:10',
            'area' => 'nullable|string|max:255',
        ]);

        try {
            $income = Income::findOrFail($id);
            $income->update([
                'entry_date' => $request->entry_date,
                'name' => $request->name,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'description' => $request->description,
                'income_category_id' => $request->income_category_id,
                'mobile_number' => $request->mobile_number,
                'pan_number' => $request->pan_number,
                'area' => $request->area,
            ]);

            return redirect()->route('admin.income')->with('success', 'income updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update income: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $income = Income::findOrFail($id);
        $categories = IncomeCategory::all(); // Retrieve categories if needed in the edit form

        return view('admin.income.edit', compact('income', 'categories'));
    }

    public function destroy($id)
    {
        try {
            $income = Income::findOrFail($id);
            $income->delete();

            return redirect()->route('admin.income')->with('success', 'income deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete income: ' . $e->getMessage()]);
        }
    }

}