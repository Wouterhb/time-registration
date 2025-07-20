<?php

namespace App\Actions\TimeEntries;

use App\Models\TimeEntry;

class DeleteTimeEntryAction
{
    public function execute(TimeEntry $entry): void
    {
        $entry->delete();
    }
}
