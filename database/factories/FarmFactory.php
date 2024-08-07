<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farm>
 */
class FarmFactory extends Factory
{
    protected $model = Farm::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'city_id' => $this->faker->randomElement(City::pluck('id')->toArray()),
            'size' => $this->faker->numberBetween(50, 150),
        ];
    }
}
