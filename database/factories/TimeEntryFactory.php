<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\TimeEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeEntryFactory extends Factory
{
    protected $model = TimeEntry::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-2 weeks', 'now');
        $end = (clone $start)->modify('+' . rand(1, 8) . ' hours');

        return [
            'project_id' => Project::factory(),
            'date' => $start->format('Y-m-d'),
            'start_time' => $start->format('H:i'),
            'end_time' => $end->format('H:i'),
            'description' => $this->faker->optional()->sentence(),
        ];
    }
}
