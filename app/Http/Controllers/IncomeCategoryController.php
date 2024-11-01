<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use App\Models\Income;

class IncomeCategoryController extends Controller
{
    public function index()
    {
        $categories = IncomeCategory::all();
        return view('admin.income_categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        IncomeCategory::create([
            'name' => $request->name,
            'created_by_id' => auth()->id(),
        ]);

        return redirect()->route('admin.income_categories')->with('success', 'Income Category created successfully.');
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
        $category = IncomeCategory::findOrFail($id);
        
        // Delete associated income
        $category->incomes()->delete(); // Assuming there's a relation defined in the incomeCategory model

        // Delete the category
        $category->delete();

        return redirect()->route('admin.income_categories')->with('success', 'income Category deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = IncomeCategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        // Return a JSON response instead of a redirect
        return redirect()->route('admin.income_categories')->with('success', 'income Category updated successfully.');
    }
}