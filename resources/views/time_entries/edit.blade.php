<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Time Entry ({{ $project->name }})
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-xl">
        <form method="POST" action="{{ route('projects.time-entries.update', [$project, $timeEntry]) }}">
            @csrf
            @method('PUT')

            <!-- Date -->
            <div class="mb-4">
                <label for="date" class="block font-medium text-sm text-gray-700">Date</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full"
                    value="{{ old('date', $timeEntry->date) }}" required>
                @error('date')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Start time -->
            <div class="mb-4">
                <label for="start_time" class="block font-medium text-sm text-gray-700">Start time</label>
                <input type="time" name="start_time" id="start_time" class="mt-1 block w-full"
                    value="{{ old('start_time', $timeEntry->start_time) }}" required>
                @error('start_time')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- End time -->
            <div class="mb-4">
                <label for="end_time" class="block font-medium text-sm text-gray-700">End time</label>
                <input type="time" name="end_time" id="end_time" class="mt-1 block w-full"
                    value="{{ old('end_time', $timeEntry->end_time) }}" required>
                @error('end_time')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full">{{ old('description', $timeEntry->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Update
                </button>
                <a href="{{ route('projects.time-entries.index', $project) }}" class="ml-4 text-gray-600 underline">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
