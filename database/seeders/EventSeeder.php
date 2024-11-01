<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        // Create 10 fake event records using the Event factory
        Event::factory()->count(10)->create();
    }
}