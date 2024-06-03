<?php

namespace Database\Factories;

use App\Models\Farmer;
use App\Models\Assistance;
use App\Models\AssistanceHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class  AssistanceHistoryFactory extends Factory
{
    protected $model = AssistanceHistory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'farmer_id' => $this->faker->randomElement(Farmer::pluck('id')),
            'assistance_id' => $this->faker->randomElement(Assistance::pluck('id')),
            'given_date' => $this->faker->date()
        ];
    }
}
