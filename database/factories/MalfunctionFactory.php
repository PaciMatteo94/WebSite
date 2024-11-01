<?php

namespace Database\Factories;
use App\Models\Malfunction;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Malfunction>
 */
class MalfunctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = Malfunction::class;
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
        ];
    }
}
