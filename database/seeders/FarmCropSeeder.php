<?php

namespace Database\Seeders;

use App\Models\FarmCrop;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FarmCropSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FarmCrop::factory()->count(500)->create();
    }
}
