<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyProduct>
 */
class CompanyProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => fake()->uuid,
            'company_id' => 1,
            'name' => fake()->randomElement([
                'Margherita',
                'Double Cheese Margherita',
                'Farm House',
                'Peppy Paneer',
                'Mexican Green Wave',
            ]),
            'tag' => fake()->randomElement([
                'Standard',
                'Large',
                'Small',
            ]),
            'price' => fake()->randomElement([
                200,
                230,
                280.11,
                300.22,
            ]),
            'base_price' => fake()->randomElement([
                200,
                230,
                280.12,
                300.12,
            ]),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
        ];
    }
}
