<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owner' => $this->faker->name(),
            'weight' => $this->faker->randomFloat(2, 1.0, 25.0),
            'status' => Package::STATUS_WAIT,
        ];
    }
}
