<?php

namespace App\Http\Controllers;

use App\Actions\TimeEntries\CreateTimeEntryAction;
use App\Actions\TimeEntries\UpdateTimeEntryAction;
use App\Http\Requests\StoreTimeEntryRequest;
use App\Http\Requests\UpdateTimeEntryRequest;
use App\Models\Project;
use App\Models\TimeEntry;
use Illuminate\Support\Facades\Gate;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        Gate::authorize('view', $project);

        $timeEntries = $project->timeEntries()->latest()->get();

        return view('time_entries.index', compact('project', 'timeEntries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        Gate::authorize('create', [TimeEntry::class, $project]);

        return view('time_entries.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimeEntryRequest $request, Project $project, CreateTimeEntryAction $action)
    {
        Gate::authorize('create', [TimeEntry::class, $project]);

        $action->execute($request->validated(), $project);

        return redirect()->route('projects.time-entries.index', $project)
            ->with('success', 'Time entry created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeEntry $timeEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, TimeEntry $timeEntry)
    {
        Gate::authorize('update', $timeEntry);

        return view('time_entries.edit', compact('project', 'timeEntry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimeEntryRequest $request, Project $project, TimeEntry $timeEntry, UpdateTimeEntryAction $action)
    {
        Gate::authorize('update', $timeEntry);

        $action->execute($request->validated(), $timeEntry);

        return redirect()->route('projects.time-entries.index', $project)
            ->with('success', 'Time entry updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, TimeEntry $timeEntry)
    {
        Gate::authorize('delete', $timeEntry);

        $timeEntry->delete();

        return redirect()
            ->route('projects.time-entries.index', $project)
            ->with('success', 'Time Entry deleted.');
    }
}
