<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Restaurant::factory(20)->create();
    }
}
