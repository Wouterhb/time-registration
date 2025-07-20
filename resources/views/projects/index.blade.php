<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- Create -->
                <a href="{{ route('projects.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('New Project') }}
                </a>

                @if ($projects->isEmpty())
                    <p class="text-gray-500 mt-4">
                        {{ __('There are no projects yet.') }}
                    </p>
                @else
                    <table class="min-w-full bg-white border mt-4">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2 text-left">
                                    {{ __('Name') }}
                                </th>
                                <th class="border px-4 py-2 text-left">
                                    {{ __('Created By') }}
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
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('projects.show', $project) }}"
                                            class="text-indigo-600 hover:underline">
                                            {{ $project->name }}
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">{{ $project->user->name }}</td>
                                    <td class="border px-4 py-2">{{ $project->description }}</td>
                                    <td class="border px-4 py-2 flex gap-2">
                                        @can('update', $project)
                                            <a href="{{ route('projects.edit', $project) }}"
                                                class="text-blue-600 hover:underline">
                                                {{ __('Edit') }}
                                            </a>
                                        @endcan
                                        @can('delete', $project)
                                            <form method="POST" action="{{ route('projects.destroy', $project) }}"
                                                onsubmit="return confirm('Are you sure you want to delete this project?');">
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
