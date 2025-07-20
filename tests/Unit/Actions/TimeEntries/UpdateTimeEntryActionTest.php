<?php 

use App\Actions\TimeEntries\UpdateTimeEntryAction;
use App\Models\TimeEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('updates a time entry', function () {
    $timeEntry = TimeEntry::factory()->create([
        'description' => 'Test description',
    ]);

    $expectedDescription = 'Updated description';
    $data = ['description' => $expectedDescription];

    $updated = (new UpdateTimeEntryAction())->execute($data, $timeEntry);

    expect($updated->description)->toBe($expectedDescription);
});
