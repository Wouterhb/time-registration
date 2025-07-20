<?php

namespace App\Actions\Projects;

use App\Models\Project;

class UpdateProjectAction
{
    public function execute(array $data, Project $project): Project
    {
        $project->update($data);

        return $project;
    }
}
