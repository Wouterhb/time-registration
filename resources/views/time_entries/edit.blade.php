<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit Time Entry ({{ $project->name }})
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Time entry Information') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Update the time entry information') }}
                            </p>
                        </header>

                        <form method="POST" action="{{ route('projects.time-entries.update', [$project, $timeEntry]) }}"
                            class="mt-6 space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Date -->
                            <div class="mb-4">
                                <x-input-label for="date" :value="__('Date')" />
                                <input type="date" name="date" id="date"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    value="{{ old('date', $timeEntry->date->format('Y-m-d')) }}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('date')" />
                            </div>

                            <!-- Start time -->
                            <div class="mb-4">
                                <x-input-label for="start_time" :value="__('Start time')" />
                                <input type="time" name="start_time" id="start_time"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    value="{{ old('start_time', $timeEntry->start_time->format('H:i')) }}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('start_time')" />
                            </div>

                            <!-- End time -->
                            <div class="mb-4">
                                <x-input-label for="end_time" :value="__('End time')" />
                                <input type="time" name="end_time" id="end_time"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    value="{{ old('end_time', $timeEntry->end_time)->format('H:i') }}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('end_time')" />
                            </div>

                            <!-- Description -->
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" name="description" type="text"
                                    class="mt-1 block w-full" :value="old('description', $timeEntry->description)" required autofocus
                                    autocomplete="description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            <!-- Submit -->
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                <a href="{{ route('projects.time-entries.index', $project) }}"
                                    class="ml-4 text-gray-600 underline">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
