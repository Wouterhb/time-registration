<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Project
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8 max-w-xl">
        <form method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                    value="{{ old('name', $project->name) }}" required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-gray-600 font-bold py-2 px-4 rounded">
                    Update
                </button>

                <!-- Cancel -->
                <a href="{{ route('projects.index') }}" class="ml-4 text-gray-600 underline">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
