<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project: {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-2xl">
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold mb-2">{{ $project->name }}</h3>
            <p class="mb-4 text-gray-700">{{ $project->description ?? 'No description' }}</p>

            <a href="{{ route('projects.time-entries.index', $project) }}"
                class="mt-4 inline-block text-indigo-600 hover:underline">
                Show all time entries
            </a>

            <div class="flex gap-4">
                <!-- Add Time Entry -->
                <a href="{{ route('projects.time-entries.create', $project) }}"
                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                    Add time entry
                </a>

                <!-- Edit -->
                <a href="{{ route('projects.edit', $project) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-blue-600 px-4 py-2 rounded">
                    Edit
                </a>

                <!-- Delete -->
                <form action="{{ route('projects.destroy', $project) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete dit project?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-600 text-white px-4 py-2 rounded">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
