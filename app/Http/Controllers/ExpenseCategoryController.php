<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        $categories = ExpenseCategory::all();
        return view('admin.expense_categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExpenseCategory::create([
            'name' => $request->name,
            'created_by_id' => auth()->id(),
        ]);

        return redirect()->route('admin.expense_categories')->with('success', 'Expense Category created successfully.');
    }

    public function show($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        $expenses = Expense::where('expense_category_id', $id)->get();
        
        return view('admin.expense_categories.show', compact('category', 'expenses'));
    }

    public function destroy($id)
    {
        $category = ExpenseCategory::findOrFail($id);
        
        // Delete associated expenses
        $category->expenses()->delete(); // Assuming there's a relation defined in the ExpenseCategory model

        // Delete the category
        $category->delete();

        return redirect()->route('admin.expense_categories')->with('success', 'Expense Category deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = ExpenseCategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        // Return a JSON response instead of a redirect
        return redirect()->route('admin.income_categories')->with('success', 'Expense Category updated successfully.');
    }

}