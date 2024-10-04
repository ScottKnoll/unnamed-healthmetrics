<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $goal->title }}
            </h2>
            <div class="inline-flex rounded-md shadow-sm isolate">
                <x-button href="/goals/{{ $goal->id }}/milestones/create" styles="indigo">
                    Create Milestone
                </x-button>
            </div>
        </div>
    </x-slot>
</x-app-layout>
