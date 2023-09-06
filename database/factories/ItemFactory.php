<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(rand(10, 30)),
            'category' => rand(1, 10),
            'price' => rand(1, 10000),
            'currency' => $this->faker->randomElement(['EUR', 'USD']),
        ];
    }


}
