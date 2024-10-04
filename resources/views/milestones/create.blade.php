<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Create Milestone
            </h2>
        </div>
    </x-slot>
    <x-container>
        <div>
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
                                <div class="col-span-1">
                                    <x-label class="mb-2" for="target_date">Target Date</x-label>
                                    <x-input type="date" id="target_date" name="target_date"
                                        :value="old('target_date')"></x-input>
                                    <x-input-error :messages="$errors->get('target_date')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                            <div class="col-span-full">
                                <x-label class="mb-2" for="description">Description</x-label>
                                <x-textarea type="text" id="description" name="description" :value="old('description')"
                                    rows="4"></x-textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <x-button type="submit" styles="indigo">Save</x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
</x-app-layout>
