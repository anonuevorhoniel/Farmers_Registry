<?php

namespace Database\Seeders;

use App\Models\FarmerType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FarmerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FarmerType::factory()->count(5)->create();
    }
}
