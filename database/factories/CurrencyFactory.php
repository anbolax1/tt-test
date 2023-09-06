<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('2022-01-01', '2023-07-01')->format('Y-m-d'),
            'currency' => $this->faker->randomElement(['EUR', 'USD']),
            'value' => rand(10, 100),
        ];
    }
}
