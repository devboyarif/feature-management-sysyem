<?php

namespace Database\Seeders;

use App\Models\FeatureRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeatureRequest::factory(100)->create();
    }
}
