<?php

namespace Database\Seeders;

use App\Models\Venues;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Venues::factory()->count(10)->create();
    }
}
