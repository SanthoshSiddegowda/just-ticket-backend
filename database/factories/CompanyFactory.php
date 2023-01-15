<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'name' => 'Domino\'s Pizza',
            'image_url' => 'https://i.insider.com/501fde6feab8ea876c000002',
            'custom_data' => json_encode([
                'primary_color' => '#2a79ae',
                'secondary_color' => '#e63738',
                'total_text' => 'Total',
                'proceed_text' => 'Checkout',
                'order_detail_text' => 'Details',
                'order_text' => 'Place Order',
                'currency_symbol' => '&#8377;', //Rupees
                //'currency_symbol' => '&#8364;', #Euro
            ]),
            'domain' => 'localhost:3000',
        ];
    }
}
