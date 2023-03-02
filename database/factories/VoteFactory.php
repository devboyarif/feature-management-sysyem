<?php

namespace Database\Factories;

use App\Models\FeatureRequest;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'feature_request_id' => FeatureRequest::inRandomOrder()->value('id'),
            'type' => Arr::random(['up','down']),
            'ip' => fake()->ipv4
        ];
    }
}
