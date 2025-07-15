<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Projects
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <!-- Create -->
        <a href="{{ route('projects.create') }}" class="bg-blue-500 text-gray-600 px-4 py-2 rounded">
            New Project
        </a>

        <ul class="mt-4">
            @foreach ($projects as $project)
                <li class="py-2 border-b flex justify-between">
                    <span>
                        <!-- Show -->
                        <a href="{{ route('projects.show', $project) }}" class="text-indigo-600 hover:underline">
                            {{ $project->name }}
                        </a>
                    </span>
                    <span>
                        <!-- Edit -->
                        <a href="{{ route('projects.edit', $project) }}" class="text-blue-600">
                            Edit
                        </a>

                        <!-- Delete -->
                        <form action="{{ route('projects.destroy', $project) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete dit project?');"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
