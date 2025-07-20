<?php 

use App\Actions\TimeEntries\DeleteTimeEntryAction;
use App\Models\TimeEntry;

it('deletes a time entry', function () {
    $timeEntry = TimeEntry::factory()->create();

    (new DeleteTimeEntryAction())->execute($timeEntry);

    expect(TimeEntry::find($timeEntry->id))->toBeNull();
});
