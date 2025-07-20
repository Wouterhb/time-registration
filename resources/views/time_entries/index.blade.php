<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Time entries for project: {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('projects.time-entries.create', $project) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
            Add time entry
        </a>

        @if ($timeEntries->isEmpty())
            <p class="text-gray-500">There are no time entries yet.</p>
        @else
            <table class="min-w-full bg-white border mt-4">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-left">Date</th>
                        <th class="border px-4 py-2 text-left">From</th>
                        <th class="border px-4 py-2 text-left">Until</th>
                        <th class="border px-4 py-2 text-left">Description</th>
                        <th class="border px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeEntries as $timeEntry)
                        <tr>
                            <td class="border px-4 py-2">{{ $timeEntry->date }}</td>
                            <td class="border px-4 py-2">{{ $timeEntry->start_time }}</td>
                            <td class="border px-4 py-2">{{ $timeEntry->end_time }}</td>
                            <td class="border px-4 py-2">{{ $timeEntry->description }}</td>
                            <td class="border px-4 py-2 flex gap-2">
                                @can('update', $timeEntry)
                                    <a href="{{ route('projects.time-entries.edit', [$project, $timeEntry]) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                @endcan
                                @can('delete', $timeEntry)
                                    <form method="POST"
                                        action="{{ route('projects.time-entries.destroy', [$project, $timeEntry]) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this time entry?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
