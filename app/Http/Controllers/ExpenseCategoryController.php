<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Services\LogService;

class ExpenseCategoryController extends Controller
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function index()
    {
        $categories = ExpenseCategory::all();
        return view('admin.expense_categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // Input validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            // Create the expense category
            $expenseCategory = ExpenseCategory::create([
                'name' => $validated['name'],
                'created_by_id' => auth()->id(),
            ]);

            // Log success
            $this->logService->logSuccess("Expense Category created successfully: " . $expenseCategory->name);

            return redirect()->route('admin.expense_categories')->with('success', 'Expense Category created successfully.');
        } catch (\Exception $e) {
            // Log error
            $this->logService->logError("Failed to create Expense Category: " . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to create Expense Category: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        $expenses = Expense::where('expense_category_id', $id)->get();
        
        return view('admin.expense_categories.show', compact('category', 'expenses'));
    }

    public function destroy($id)
    {
        try {
            $category = ExpenseCategory::findOrFail($id);

            // Log category found
            $this->logService->logSuccess("Deleting Expense Category: ID - {$category->id}, Name - {$category->name}");

            // Delete associated expenses
            $deletedExpenses = $category->expenses()->delete(); // Assuming there's a relation defined in the ExpenseCategory model
            $this->logService->logSuccess("Deleted {$deletedExpenses} associated expenses for Expense Category ID - {$category->id}");

            // Delete the category
            $category->delete();

            // Log success
            $this->logService->logSuccess("Expense Category deleted successfully: ID - {$category->id}, Name - {$category->name}");

            return redirect()->route('admin.expense_categories')->with('success', 'Expense Category deleted successfully.');
        } catch (\Exception $e) {
            // Log error
            $this->logService->logError("Failed to delete Expense Category: " . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to delete expense category: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $category = ExpenseCategory::findOrFail($id);

            // Log information about the category before updating
            $this->logService->logSuccess("Updating Expense Category: ID - {$category->id}, Original Name - {$category->name}");

            // Update the category's name
            $category->name = $request->name;
            $category->save();

            // Log success with updated information
            $this->logService->logSuccess("Expense Category updated successfully: ID - {$category->id}, New Name - {$category->name}");

            return redirect()->route('admin.income_categories')->with('success', 'Expense Category updated successfully.');
        } catch (\Exception $e) {
            // Log any errors that occur
            $this->logService->logError("Failed to update Expense Category: " . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to update expense category: ' . $e->getMessage()]);
        }
    }

}