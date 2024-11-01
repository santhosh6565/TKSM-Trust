<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IncomeCategory;

class IncomeCategorySeeder extends Seeder
{
    public function run()
    {
        // Create 3 fake income categories
        IncomeCategory::create([
            'name' => 'Salary',
            'created_by_id' => 1, // Replace with a valid user ID if needed
        ]);

        IncomeCategory::create([
            'name' => 'Business Revenue',
            'created_by_id' => 1, // Replace with a valid user ID if needed
        ]);

        IncomeCategory::create([
            'name' => 'Investments',
            'created_by_id' => 1, // Replace with a valid user ID if needed
        ]);
    }
}