<?php

use App\Actions\Projects\UpdateProjectAction;
use App\Models\Project;

it('updates a project', function () { 
    $project = Project::factory()->create([
        'name' => 'Old name',
    ]);
    
    $expectedName = 'New name';
    $data = [
        'name' => $expectedName,
    ];

    $updated = (new UpdateProjectAction())->execute($data, $project);

    expect($updated->name)->toBe($expectedName);
});
