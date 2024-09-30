<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->text(40),
            'quantity'=>[1,2,3,4,5,6,7,8][array_rand([1,2,4,5,6,7,8])],
            'price'=>[50,40,30,20,10][ array_rand([50,20,30,40,10])],
        ];
    }
}
