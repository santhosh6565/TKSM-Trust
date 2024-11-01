<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExpenseCategory;

class ExpenseCategorySeeder extends Seeder
{
    public function run()
    {
        // Create sample expense categories
        ExpenseCategory::create([
            'name' => 'Travel',
            'created_by_id' => 1, // Replace with a valid user ID if needed
        ]);

        ExpenseCategory::create([
            'name' => 'Office Supplies',
            'created_by_id' => 1, // Replace with a valid user ID if needed
        ]);

        ExpenseCategory::create([
            'name' => 'Entertainment',
            'created_by_id' => 1, // Replace with a valid user ID if needed
        ]);

        ExpenseCategory::create([
            'name' => 'Utilities',
            'created_by_id' => 1, // Replace with a valid user ID if needed
        ]);

        ExpenseCategory::create([
            'name' => 'Miscellaneous',
            'created_by_id' => 1, // Replace with a valid user ID if needed
        ]);
    }
}