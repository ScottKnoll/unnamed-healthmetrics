<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Habits
            </h2>
            <div class="inline-flex rounded-md shadow-sm isolate">
                <x-button href="/habits/create" styles="indigo">
                    Create Habit
                </x-button>
            </div>
        </div>
    </x-slot>
    <x-container>
        <ul role="list"
            class="overflow-hidden bg-white divide-y divide-gray-100 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            @forelse ($habits as $habit)
                <li class="relative flex justify-between px-4 py-5 gap-x-6 hover:bg-gray-50 sm:px-6">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="flex-auto min-w-0">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="/habits/{{ $habit->id }}/edit">
                                    <span class="absolute inset-x-0 bottom-0 -top-px"></span>
                                    {{ $habit->title }}
                                </a>
                            </p>
                            <p class="flex mt-1 text-xs leading-5 text-gray-500">
                                <a href="mailto:leslie.alexander@example.com"
                                    class="relative truncate hover:underline">{{ $habit->notes ?? 'N/A' }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center shrink-0 gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">Current Streak: {{ $habit->current_streak }}</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">Max Streak: {{ $habit->max_streak }}
                            </p>
                        </div>
                        <x-svg.chevron-right class="flex-none w-5 h-5 text-gray-400" />
                    </div>
                </li>
            @empty
                <li class="flex items-center justify-center py-5">
                    <div class="text-center">
                        <x-svg.clipboard-document-list class="w-12 h-12 mx-auto text-gray-400" />
                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No habits</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a habit.</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </x-container>
</x-app-layout>
