<?php

namespace Database\Factories;

use App\Models\Farm;
use App\Models\Farmer;
use App\Models\FarmerType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farmer>
 */
class FarmerFactory extends Factory
{
    protected $model = Farmer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name,
            'middle_name' => $this->faker->name,
            'last_name'=> $this->faker->lastName,
            'name_extension' => $this->faker->word,
            'birth_date' => $this->faker->date(),
            'birth_place' => $this->faker->address,
            'sex' => $this->faker->randomElement(['Male', 'Female']),
            'contact_number' => $this->faker->randomNumber(8, true),
            'other_information' => $this->faker->word,
            'farm_id' => $this->faker->randomElement(Farm::pluck('id')->toArray()),
            'farmer_type_id' => $this->faker->randomElement(FarmerType::pluck('id')->toArray()),
        ];
    }
}
