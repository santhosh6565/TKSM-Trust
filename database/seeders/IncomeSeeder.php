<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Income;

class IncomeSeeder extends Seeder
{
    public function run()
    {
        // Create 10 income records
        Income::factory()->count(10)->create();
    }
}

