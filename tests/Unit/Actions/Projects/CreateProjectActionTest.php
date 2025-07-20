<?php

use App\Actions\Projects\CreateProjectAction;
use App\Models\User;

it('creates a project for a user', function () {
    $user = User::factory()->create();

    $expectedName = 'Test Project';
    $data = [
        'name' => $expectedName,
        'description' => 'Test description',
    ];

    $project = (new CreateProjectAction())->execute($data, $user);

    expect($project->name)->toBe($expectedName)
        ->and($project->user_id)->toBe($user->id);
});
