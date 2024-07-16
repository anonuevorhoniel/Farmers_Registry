<?php

namespace Database\Seeders;

use App\Models\CropType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CropTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CropType::factory()->count(20)->create();
    }
}
