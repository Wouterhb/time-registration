<?php

namespace App\Actions\TimeEntries;

use App\Models\TimeEntry;

class UpdateTimeEntryAction
{
    public function execute(array $data, TimeEntry $timeEntry): TimeEntry
    {
        $timeEntry->update($data);

        return $timeEntry;
    }
}
