<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $number = fake()->numberBetween(1,30);
        $street = fake()->streetName();
        $postcode = fake()->postcode();
        $name = $number." ".$street;

        return [
            'number' => $number,
            'street'  => $street,
            'postcode' => $postcode,
            'name' => $name,
            'city' => fake()->city(),
            'label' => fake()->streetAddress(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
        ];
    }
}
