<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = ['School Management System', 'Hospital Management System', 'Project Management System'];

        foreach ($projects as $project) {
            Project::create(['name' => $project]);
        }
    }
}
