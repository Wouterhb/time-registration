<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\TimeEntry;

class TimeEntrySeeder extends Seeder
{
    public function run(): void
    {
        Project::all()->each(function ($project) {
            TimeEntry::factory()
                ->count(rand(5, 10))
                ->create([
                    'project_id' => $project->id,
                ]);
        });
    }
}
