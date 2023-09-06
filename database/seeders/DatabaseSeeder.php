<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Item::factory(400000)->create();
        Currency::factory(500)->create();
    }
}
