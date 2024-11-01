<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Services\LogService;

class IncomeCategoryController extends Controller
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }
    
    public function index()
    {
        $categories = IncomeCategory::all();
        return view('admin.income_categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            // Attempt to create the income category
            $incomeCategory = IncomeCategory::create([
                'name' => $validated['name'],
                'created_by_id' => auth()->id(),
            ]);

            // Log successful creation
            $this->logService->logSuccess('Income Category created successfully: ' . $incomeCategory->name);

            return redirect()->route('admin.income_categories')->with('success', 'Income Category created successfully.');
        } catch (\Exception $e) {
            // Log error if creation fails
            $this->logService->logError('Failed to create Income Category: ' . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to create Income Category: ' . $e->getMessage()]);
        }
    }

     // Show incomes under a specific category
     public function show($id)
     {
         $category = IncomeCategory::findOrFail($id);
         $incomes = Income::where('income_category_id', $id)->get();
 
         return view('admin.income_categories.show', compact('category', 'incomes'));
     }

     public function destroy($id)
    {
        try {
            // Find the income category
            $category = IncomeCategory::findOrFail($id);
            
            // Delete associated income records
            $category->incomes()->delete(); // Assuming there's a relation defined in the IncomeCategory model

            // Log the deletion of associated incomes
            $this->logService->logSuccess('Deleted associated incomes for category: ' . $category->name);

            // Delete the category
            $category->delete();

            // Log the successful deletion of the category
            $this->logService->logSuccess('Income Category deleted successfully: ' . $category->name);

            return redirect()->route('admin.income_categories')->with('success', 'Income Category deleted successfully.');
        } catch (\Exception $e) {
            // Log the error if deletion fails
            $this->logService->logError('Failed to delete Income Category: ' . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to delete Income Category: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $category = IncomeCategory::findOrFail($id);
            $category->name = $request->name;
            $category->save();

            // Log the successful update of the category
            $this->logService->logSuccess('Income Category updated successfully: ' . $category->name);

            // Return a JSON response instead of a redirect
            return redirect()->route('admin.income_categories')->with('success', 'Income Category updated successfully.');
        } catch (\Exception $e) {
            // Log the error if the update fails
            $this->logService->logError('Failed to update Income Category: ' . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to update Income Category: ' . $e->getMessage()]);
        }
    }
    
}