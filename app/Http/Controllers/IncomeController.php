<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\IncomeCategory;
use App\Constants\PaymentConstants;
use Illuminate\Http\Request;
use App\Services\LogService;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    protected $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

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
        // Input validation with custom error handling
        $validator = Validator::make($request->all(), [
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

        // Check if validation fails
        if ($validator->fails()) {
            // Log validation error
            $this->logService->logError('Validation failed for adding income: ' . $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Creating the income record
            $income = Income::create([
                'name' => $request->name,
                'payment_method' => $request->payment_method,
                'entry_date' => $request->entry_date,
                'amount' => $request->amount,
                'description' => $request->description,
                'mobile_number' => $request->mobile_number, // Optional field
                'pan_number' => $request->pan_number,       // Optional field
                'area' => $request->area,                   // Optional field
                'income_category_id' => $request->income_category_id,
                'created_by_id' => auth()->id(),
            ]);

            // Log success
            $this->logService->logSuccess('Income added successfully: ' . $income->name . ' - Amount: ' . $income->amount);
            
            return redirect()->route('admin.income')->with('success', 'Income added successfully.');
        } catch (\Exception $e) {
            // Log any exceptions
            $this->logService->logError('Failed to add income: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to add income: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        // Validate request input
        $validator = Validator::make($request->all(), [
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

        if ($validator->fails()) {
            // Log validation errors
            $this->logService->logError('Failed to update income: ' . $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Find and update the income record
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

            // Log success
            $this->logService->logSuccess('Income updated successfully: ' . $income->name . ' - Amount: ' . $income->amount);

            return redirect()->route('admin.income')->with('success', 'Income updated successfully.');
        } catch (\Exception $e) {
            // Log any exceptions during update
            $this->logService->logError('Failed to update income for ID ' . $id . ': ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to update income: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            // Attempt to find the income record
            $income = Income::findOrFail($id);
            $categories = IncomeCategory::all(); // Retrieve categories if needed in the edit form

            // Log successful retrieval
            $this->logService->logSuccess('Income record loaded for editing: ' . $income->name . ' - ID: ' . $income->id);

            return view('admin.income.edit', compact('income', 'categories'));
        } catch (\Exception $e) {
            // Log error if income record is not found or another error occurs
            $this->logService->logError('Failed to load income record for editing: ' . $e->getMessage());

            return redirect()->route('admin.income')->withErrors(['error' => 'Failed to load income record.']);
        }
    }

    public function destroy($id)
    {
        try {
            // Attempt to find and delete the income record
            $income = Income::findOrFail($id);
            $incomeName = $income->name;
            $income->delete();

            // Log successful deletion
            $this->logService->logSuccess('Income deleted successfully: ' . $incomeName . ' - ID: ' . $id);

            return redirect()->route('admin.income')->with('success', 'Income deleted successfully.');
        } catch (\Exception $e) {
            // Log error if deletion fails
            $this->logService->logError('Failed to delete income: ' . $e->getMessage());

            return back()->withErrors(['error' => 'Failed to delete income: ' . $e->getMessage()]);
        }
    }

}