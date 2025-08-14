<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Currencies;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExpensesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first() ?? UserFactory::factory()->create();
        $category = Categories::inRandomOrder()->first() ?? CategoriesFactory::factory()->create();
        $currency = Currencies::inRandomOrder()->first() ?? CurrenciesFactory::factory()->create();
        

        return [
            'user_id'         => $user->id,
            'category_id'     => $category->id,
            'value'           => fake()->randomFloat(2, 1, 1000),
            'currency_id'     => $currency->id,
            'currency_symbol' => $currency->currency_symbol,
            'deleted'         => false,
            'created_at'      => now(),
            'updated_at'      => now(),
        ];
    }
}
