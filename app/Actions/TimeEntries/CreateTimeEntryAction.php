<?php

namespace App\Actions\TimeEntries;

use App\Models\Project;
use App\Models\TimeEntry;

class CreateTimeEntryAction
{
    public function execute(array $data, Project $project): TimeEntry
    {
        return $project->timeEntries()->create($data);
    }
}
