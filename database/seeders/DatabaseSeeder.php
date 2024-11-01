<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the RoleSeeder and UserSeeder
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            IncomeCategorySeeder::class,
            IncomeSeeder::class,
            ExpenseCategorySeeder::class,
            ExpenseSeeder::class,
            EventSeeder::class,
            NotificationSeeder::class
        ]);
    }
}