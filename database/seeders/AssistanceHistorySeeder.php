<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssistanceHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssistanceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssistanceHistory::factory()->count(10000)->create();
    }
}
