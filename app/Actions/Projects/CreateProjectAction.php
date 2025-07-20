<?php

namespace App\Actions\Projects;

use App\Models\Project;
use App\Models\User;

class CreateProjectAction
{
    public function execute(array $data, User $user): Project
    {
        return $user->projects()->create($data);
    }
}
