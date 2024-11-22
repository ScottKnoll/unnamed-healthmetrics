<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Habit
            </h2>
        </div>
    </x-slot>
    <x-container>
        <div class="space-y-6 sm:px-6 lg:col-span-9 lg:px-0">
            <form action="/habits" method="POST">
                @csrf
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                    <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                        <div class="col-span-full">
                            <x-label for="title" class="mb-2">Title</x-label>
                            <x-input type="text" name="title" id="title" :value="old('title')" required
                                class="w-full" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="col-span-full">
                            <x-label for="notes" class="mb-2">Notes</x-label>
                            <x-textarea name="notes" id="notes" rows="4" :value="old('notes')"
                                class="w-full"></x-textarea>
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                        </div>
                        <div class="col-span-full">
                            <x-label for="frequency" class="mb-2">Frequency</x-label>
                            <x-select name="frequency" id="frequency">
                                <option value="daily" {{ old('frequency') == 'daily' ? 'selected' : '' }}>Daily
                                </option>
                                <option value="weekly" {{ old('frequency') == 'weekly' ? 'selected' : '' }}>Weekly
                                </option>
                                <option value="monthly" {{ old('frequency') == 'monthly' ? 'selected' : '' }}>Monthly
                                </option>
                            </x-select>
                            <x-input-error :messages="$errors->get('frequency')" class="mt-2" />
                        </div>
                        <div class="col-span-full">
                            <x-label for="difficulty" class="mb-2">Difficulty</x-label>
                            <x-select name="difficulty" id="difficulty">
                                <option value="trivial" {{ old('difficulty') == 'trivial' ? 'selected' : '' }}>Trivial
                                </option>
                                <option value="easy" {{ old('difficulty') == 'easy' ? 'selected' : '' }}>Easy</option>
                                <option value="medium" {{ old('difficulty') == 'medium' ? 'selected' : '' }}>Medium
                                </option>
                                <option value="hard" {{ old('difficulty') == 'hard' ? 'selected' : '' }}>Hard</option>
                            </x-select>
                            <x-input-error :messages="$errors->get('difficulty')" class="mt-2" />
                        </div>
                        {{-- <div class="col-span-full">
                            <x-label for="goal_ids" class="mb-2">Associate with Goals</x-label>
                            <select id="goal_ids" name="goal_ids[]" multiple
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($goals as $goal)
                                    <option value="{{ $goal->id }}"
                                        {{ collect(old('goal_ids', $habitGoalIds))->contains($goal->id) ? 'selected' : '' }}>
                                        {{ $goal->title }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('goal_ids')" class="mt-2" />
                        </div> --}}
                    </div>
                    <div class="px-4 py-3 text-right sm:px-6">
                        <x-button type="submit" styles="indigo">Save</x-button>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
