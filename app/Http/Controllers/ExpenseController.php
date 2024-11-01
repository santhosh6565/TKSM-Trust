<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Constants\PaymentConstants;
use Illuminate\Http\Request;
use App\Services\LogService;

class ExpenseController extends Controller
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }
    public function index()
    {
        $expenses = Expense::with('expenseCategory')->get();
        $categories = ExpenseCategory::all();
        return view('admin.expenses.index', compact('expenses', 'categories'));
    }

    public function create()
    {
        $categories = ExpenseCategory::all();
        return view('admin.expenses.create', compact('categories'));
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
            'expense_category_id' => 'required|exists:expense_categories,id',
        ]);

        try {
            // Creating the expense record
            $expense = Expense::create([
                'name' => $validated['name'],
                'payment_method' => $validated['payment_method'],
                'entry_date' => $validated['entry_date'],
                'amount' => $validated['amount'],
                'description' => $validated['description'],
                'mobile_number' => $validated['mobile_number'], // Optional field
                'pan_number' => $validated['pan_number'],       // Optional field
                'area' => $validated['area'],                   // Optional field
                'expense_category_id' => $validated['expense_category_id'],
                'created_by_id' => auth()->id(),
            ]);

            // Log success
            $this->logService->logSuccess('Expense added successfully: ' . $expense->name . ' - Amount: ' . $expense->amount);

            return redirect()->route('admin.expense')->with('success', 'Expense added successfully.');
        } catch (\Exception $e) {
            // Log error
            $this->logService->logError('Failed to add expense: ' . $e->getMessage());

            // Error handling
            return back()->withErrors(['error' => 'Failed to add expense: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        // Input validation
        $request->validate([
            'entry_date' => 'required|date',
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'description' => 'nullable|string',
            'expense_category_id' => 'required|exists:expense_categories,id',
            'mobile_number' => 'nullable|string|max:15',
            'pan_number' => 'nullable|string|max:10',
            'area' => 'nullable|string|max:255',
        ]);

        try {
            $expense = Expense::findOrFail($id);

            // Updating the expense record
            $expense->update([
                'entry_date' => $request->entry_date,
                'name' => $request->name,
                'amount' => $request->amount,
                'payment_method' => $request->payment_method,
                'description' => $request->description,
                'expense_category_id' => $request->expense_category_id,
                'mobile_number' => $request->mobile_number,
                'pan_number' => $request->pan_number,
                'area' => $request->area,
            ]);

            // Log success
            $this->logService->logSuccess('Expense updated successfully: ' . $expense->name . ' - Amount: ' . $expense->amount);

            return redirect()->route('admin.expense')->with('success', 'Expense updated successfully.');
        } catch (\Exception $e) {
            // Log error
            $this->logService->logError('Failed to update expense (ID: ' . $id . '): ' . $e->getMessage());

            // Return with error message
            return back()->withErrors(['error' => 'Failed to update expense: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $categories = ExpenseCategory::all(); // Retrieve categories if needed in the edit form

        return view('admin.expenses.edit', compact('expense', 'categories'));
    }

    public function destroy($id)
    {
        try {
            $expense = Expense::findOrFail($id);
            
            // Store expense details for logging before deletion
            $expenseName = $expense->name;
            $expenseAmount = $expense->amount;

            // Delete the expense record
            $expense->delete();

            // Log success
            $this->logService->logSuccess("Expense deleted successfully: $expenseName - Amount: $expenseAmount");

            return redirect()->route('admin.expense')->with('success', 'Expense deleted successfully.');
        } catch (\Exception $e) {
            // Log error
            $this->logService->logError("Failed to delete expense (ID: $id): " . $e->getMessage());

            // Return with error message
            return back()->withErrors(['error' => 'Failed to delete expense: ' . $e->getMessage()]);
        }
    }
    
}
