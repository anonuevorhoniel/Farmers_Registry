<?php

namespace Database\Factories;

use App\Models\Assistance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assistance>
 */
class AssistanceFactory extends Factory
{
  /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Assistance::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
