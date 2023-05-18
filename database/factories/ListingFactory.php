<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'property_name' => $this->faker->randomElement(['ハイツ', 'コーポ', 'メゾン']) . $this->faker->firstName . $this->faker->numberBetween(1,9) . '0' . $this->faker->numberBetween(1,9),
            'year_built' => $this->faker->numberBetween(0, 50),
            'postal_code' => $this->faker->postcode,
            'prefecture' => $this->faker->prefecture,
            'city' => $this->faker->city,
            'address1' => $this->faker->streetAddress,
            'nearest_station' => $this->faker->firstName. '駅',
            'specific_floor' => $this->faker->numberBetween(1, 10),
            'rent' => $this->faker->numberBetween(50000, 300000),
            'administration_fee' => $this->faker->numberBetween(5000, 20000),
            'security_deposit' => $this->faker->numberBetween(10000, 50000),
            'gratuity_fee' => $this->faker->numberBetween(0, 50000),
            'floor_plan' => $this->faker->randomElement(['1R', '1K', '1DK', '1LDK', '2K', '2DK', '2LDK', '3DK', '3LDK', '4DK', '4LDK']),
            'exclusive_area' => $this->faker->randomFloat(2, 20, 200),
        ];
    }
}
