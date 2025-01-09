<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Milestone
            </h2>
        </div>
    </x-slot>
    <x-container class="max-w-4xl">
        <div class="space-y-6 sm:px-6 lg:col-span-9 lg:px-0">
            <form action="/goals/{{ $goal->id }}/milestones" method="POST">
                @csrf
                <div class="hidden" value="{{ $goal->id }}"></div>
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                    <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-full">
                                <x-label class="mb-2" for="title">Title</x-label>
                                <x-input type="text" id="title" name="title" :value="old('title')"></x-input>
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <div class="col-span-full">
                                <x-label class="mb-2" for="target_date">Target Date</x-label>
                                <x-input type="date" id="target_date" name="target_date" :value="old('target_date')"></x-input>
                                <x-input-error :messages="$errors->get('target_date')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-span-full">
                            <x-label class="mb-2" for="notes">Notes</x-label>
                            <x-textarea type="text" id="notes" name="notes" :value="old('notes')"
                                rows="4"></x-textarea>
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex items-center justify-between bg-white border-t border-gray-200">
                        <div class="px-4 py-3 text-right sm:px-6">
                            <x-button href="" styles="white">+ Add Task</x-button>
                        </div>
                        <div class="px-4 py-3 text-right sm:px-6">
                            <x-button type="submit" styles="indigo">Save</x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-container>
</x-app-layout>
