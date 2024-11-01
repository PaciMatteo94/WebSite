<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Malfunction;
use App\Models\Solution;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solution>
 */
class SolutionFactory extends Factory
{
    protected $model = Solution::class;

    public function definition()
    {
        return [
            'malfunction_id' => Malfunction::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
        ];
    }
}
