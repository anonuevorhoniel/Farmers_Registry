<?php

namespace Database\Factories;

use App\Models\CropType;
use App\Models\Farm;
use App\Models\FarmCrop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FarmCrop>
 */
class FarmCropFactory extends Factory
{
    protected $model = FarmCrop::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'farm_id' => $this->faker->randomElement(Farm::pluck('id')->toArray()),
            'crop_id' => $this->faker->randomElement(CropType::pluck('id')->toArray()),
        ];
    }
}
