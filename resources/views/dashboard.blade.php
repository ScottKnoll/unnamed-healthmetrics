<x-app-layout>
    <x-container>
        <div class="grid grid-cols-2 gap-5">
            <section>
                <div class="col-span-1 px-5 py-6 bg-white rounded-lg shadow sm:px-6">
                    <div class="flex items-start justify-between">
                        <h5 class="mb-8 text-xl font-bold">Habits</h5>
                        <x-button href="{{ route('habits.create') }}" styles="indigo" size="md">
                            Create Habit
                        </x-button>
                    </div>
                    <div class="space-y-4">
                        <ul role="list"
                            class="overflow-hidden bg-white divide-y divide-gray-100 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
                            @forelse ($habits as $habit)
                                <li class="relative flex items-center justify-between px-4 py-5 gap-x-6 hover:bg-gray-50 sm:px-6"
                                    x-data="habitComponent({{ $habit->id }}, {{ $habit->current_streak }}, {{ $habit->max_streak }})">
                                    <div class="flex items-center">
                                        <div :class="streakClass"
                                            class="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-md">
                                            <button @click="incrementStreak" class="text-xl font-bold text-white"
                                                :disabled="isLoading" aria-label="Increment streak">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-1 min-w-0 gap-x-4">
                                        <div class="flex-auto min-w-0">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                                {{ $habit->title }}
                                            </p>
                                            <p class="flex mt-1 text-xs leading-5 text-gray-500">
                                                {{ $habit->notes ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center shrink-0 gap-x-4">
                                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                                            <p class="text-sm leading-6 text-gray-900">Current Streak: <span
                                                    x-text="currentStreak"></span>
                                            </p>
                                            <p class="mt-1 text-xs leading-5 text-gray-500">Max Streak: <span
                                                    x-text="maxStreak"></span>
                                            </p>
                                        </div>
                                        <a href="{{ route('habits.edit', $habit->id) }}"
                                            class="text-sm text-indigo-600 hover:text-indigo-800">Edit
                                        </a>
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
                    </div>
                </div>
            </section>
            <section>
                <div class="col-span-1 px-5 py-6 bg-white rounded-lg shadow sm:px-6">
                    <h5 class="mb-8 text-xl font-bold">Tasks</h5>
                    <div class="space-y-4">
                        <div>
                            <p>Tasks here</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="col-span-1 px-5 py-6 bg-white rounded-lg shadow sm:px-6">
                    <div class="flex items-start justify-between">
                        <h5 class="mb-8 text-xl font-bold">Goals</h5>
                        <x-button href="{{ route('goals.create') }}" styles="indigo" size="md">
                            Create Goal
                        </x-button>
                    </div>
                    <div class="space-y-4">
                        <ul role="list"
                            class="overflow-hidden bg-white divide-y divide-gray-100 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
                            @forelse ($goals as $goal)
                                <li class="relative flex justify-between px-4 py-5 gap-x-6 hover:bg-gray-50 sm:px-6">
                                    <div class="flex min-w-0 gap-x-4">
                                        <div class="flex-auto min-w-0">
                                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                                <a href="{{ route('goals.show', $goal->id) }}">
                                                    <span class="absolute inset-x-0 bottom-0 -top-px"></span>
                                                    {{ $goal->title }}
                                                </a>
                                            </p>
                                            <p class="flex mt-1 text-xs leading-5 text-gray-500">
                                                {{ $goal->category ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center shrink-0 gap-x-4">
                                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                                            <p class="text-sm leading-6 text-gray-900">
                                                {{ $goal->created_at->format('M. d, Y') }}</p>
                                            <p class="mt-1 text-xs leading-5 text-gray-500">
                                                {{ $goal->updated_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <x-svg.chevron-right class="flex-none w-5 h-5 text-gray-400" />
                                    </div>
                                </li>
                            @empty
                                <li class="flex items-center justify-center py-5">
                                    <div class="text-center">
                                        <x-svg.check-badge class="w-12 h-12 mx-auto" />
                                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No goals for this category
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">Get started by creating a goal.</p>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </section>
            <section>
                <div class="col-span-1 px-5 py-6 bg-white rounded-lg shadow sm:px-6">
                    <h5 class="mb-8 text-xl font-bold">Unknown</h5>
                    <div class="space-y-4">
                        <div>
                            <p>Other options</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </x-container>
</x-app-layout>
