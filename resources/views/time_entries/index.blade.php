<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Time entries for project: {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <a href="{{ route('projects.time-entries.create', $project) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Add time entry') }}
                </a>

                @if ($timeEntries->isEmpty())
                    <p class="text-gray-500">
                        {{ __('There are no time entries yet') }}
                    </p>
                @else
                    <table class="min-w-full bg-white border mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2 text-left">
                                    {{ __('Date') }}
                                </th>
                                <th class="border px-4 py-2 text-left">
                                    {{ __('From') }}
                                </th>
                                <th class="border px-4 py-2 text-left">
                                    {{ __('Until') }}
                                </th>
                                <th class="border px-4 py-2 text-left">
                                    {{ __('Description') }}
                                </th>
                                <th class="border px-4 py-2 text-left">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeEntries as $timeEntry)
                                <tr>
                                    <td class="border px-4 py-2">{{ $timeEntry->date->format('Y-m-d') }}</td>
                                    <td class="border px-4 py-2">{{ $timeEntry->start_time->format('H:i') }}</td>
                                    <td class="border px-4 py-2">{{ $timeEntry->end_time->format('H:i') }}</td>
                                    <td class="border px-4 py-2">{{ $timeEntry->description }}</td>
                                    <td class="border px-4 py-2 flex gap-2">
                                        @can('update', $timeEntry)
                                            <a href="{{ route('projects.time-entries.edit', [$project, $timeEntry]) }}"
                                                class="text-blue-600 hover:underline">
                                                {{ __('Edit') }}
                                            </a>
                                        @endcan
                                        @can('delete', $timeEntry)
                                            <form method="POST"
                                                action="{{ route('projects.time-entries.destroy', [$project, $timeEntry]) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this time entry?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
