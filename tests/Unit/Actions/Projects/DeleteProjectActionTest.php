<?php

use App\Actions\Projects\DeleteProjectAction;
use App\Models\Project;

it('deletes a project', function () {
    $project = Project::factory()->create();

    (new DeleteProjectAction())->execute($project);

    expect(Project::find($project->id))->toBeNull();
});
