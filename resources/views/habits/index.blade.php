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
                <li class="relative flex items-center justify-between px-4 py-5 gap-x-6 hover:bg-gray-50 sm:px-6"
                    x-data="habitComponent({{ $habit->id }}, {{ $habit->current_streak }}, {{ $habit->max_streak }})">
                    <div class="flex items-center">
                        <div :class="streakClass"
                            class="flex items-center justify-center w-10 h-10 bg-gray-400 rounded-md">
                            <button @click="incrementStreak" class="text-xl font-bold text-white" :disabled="isLoading"
                                aria-label="Increment streak">
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
                            <p class="mt-1 text-xs leading-5 text-gray-500">Max Streak: <span x-text="maxStreak"></span>
                            </p>
                        </div>
                        <a href="/habits/{{ $habit->id }}/edit"
                            class="text-sm text-indigo-600 hover:text-indigo-800">Edit</a>
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
    <script>
        function habitComponent(id, initialCurrentStreak, initialMaxStreak) {
            return {
                currentStreak: initialCurrentStreak,
                maxStreak: initialMaxStreak,
                isLoading: false,
                incrementStreak() {
                    if (this.isLoading) return;
                    this.isLoading = true;

                    fetch(`/habits/${id}`, {
                            method: 'PATCH',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({
                                increment: true
                            }),
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            this.currentStreak = data.current_streak;
                            this.maxStreak = data.max_streak;
                        })
                        .catch(error => {
                            console.error('Increment Error:', error);
                            alert('Failed to increment streak. Please try again.');
                        })
                        .finally(() => {
                            this.isLoading = false;
                        });
                },
                get streakClass() {
                    if (this.currentStreak >= 10) {
                        return 'bg-green-700';
                    } else if (this.currentStreak >= 5) {
                        return 'bg-orange-400';
                    } else {
                        return 'bg-gray-400';
                    }
                }
            }
        }
    </script>
</x-app-layout>
