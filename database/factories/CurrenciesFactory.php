<?php

namespace Database\Factories;

use App\Models\Currencies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CurrenciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'currency_name'   => fake()->currencyCode(),
            'currency_symbol' => fake()->unique()->randomElement(['$', '€', '£', '¥']),
            'deleted'         => false,
            'created_at'      => now(),
            'updated_at'      => now(),
        ];
    }

    public function inRandomOrder(){
        $currency = Currencies::first();

        return $currency;
    }
}
