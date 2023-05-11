<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureRequest>
 */
class FeatureRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::inRandomOrder()->value('id'),
            'title' => fake()->name,
            'description' => fake()->sentence(10),
            'status' => Arr::random(['pending','complete','inprogress']),
            'vote' => rand(-100, 500),
        ];
    }
}
