<?php

use App\Actions\TimeEntries\CreateTimeEntryAction;
use App\Models\Project;
use App\Models\User;

it('creates a time entry for a user and project', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create([
        'user_id' => $user->id,
    ]);

    $data = [
        'date' => now()->toDateString(),
        'start_time' => now()->toTimeString(),
        'end_time' => now()->addHour()->toTimeString(),
        'description' => 'Test description',
    ];

    $timeEntry = (new CreateTimeEntryAction())->execute($data, $project);

    expect($timeEntry->project_id)->toBe($project->id)
        ->and($timeEntry->project->user_id)->toBe($user->id); 
});
