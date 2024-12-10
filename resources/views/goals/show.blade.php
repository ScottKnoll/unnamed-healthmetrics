<!-- resources/views/goals/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ $goal->title }}
            </h2>
            <div class="inline-flex rounded-md shadow-sm">
                <x-button href="{{ route('goals.milestones.create', $goal->id) }}" styles="indigo">
                    Create Milestone
                </x-button>
            </div>
        </div>
    </x-slot>
    <x-container>
        @forelse ($goal->milestones as $milestone)
            <x-accordion :title="$milestone->title" :subtitle="$milestone->description">
                <div class="flex items-center justify-between px-6 mt-4 sm:mt-6">
                    <h2 class="text-base font-semibold leading-6 text-gray-900">
                        Tasks
                    </h2>
                    <div x-data="{ openTaskModal: false, selectedMilestoneId: null }" class="inline-flex rounded-md shadow-sm">
                        <x-button @click="openTaskModal = true; selectedMilestoneId = {{ $milestone->id }}"
                            styles="indigo">
                            Create Task
                        </x-button>
                    </div>
                </div>
                <ul role="list" class="mt-4 divide-y divide-gray-100">
                    @forelse ($milestone->tasks as $task)
                        <li class="relative flex justify-between px-4 py-5 gap-x-6 sm:px-6">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="flex-auto min-w-0">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">
                                        {{ $task->title }}
                                    </p>
                                    <p class="mt-1 text-xs leading-5 text-gray-500">
                                        {{ $task->description ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center shrink-0 gap-x-4">
                                <div class="hidden sm:flex sm:flex-col sm:items-end">
                                    @if ($task->is_completed)
                                        <x-badge color="green">Completed</x-badge>
                                    @else
                                        <x-badge color="blue">In Progress</x-badge>
                                    @endif
                                    <p class="mt-1 text-xs leading-5 text-gray-500">
                                        Target Date: {{ $task->target_date->format('M. d, Y') }}
                                    </p>
                                </div>
                                <div class="relative flex items-center">
                                    <x-dropdown :align="$loop->last ? 'bottom-right' : 'right'">
                                        <x-slot name="trigger">
                                            <button type="button"
                                                class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900">
                                                <x-svg.ellipsis-vertical class="w-5 h-5" />
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link
                                                href="{{ route('milestones.tasks.edit', ['milestone_id' => $milestone->id], ['task_id' => $task->id]) }}">
                                                Edit
                                            </x-dropdown-link>
                                            <form
                                                action="{{ route('milestones.tasks.delete', ['milestone' => $milestone->id, 'task' => $task->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 hover:bg-gray-50 focus:outline-none"
                                                    onclick="return confirm('Are you sure you want to delete {{ $task->title }}?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="flex items-center justify-center py-5">
                            <div class="text-center">
                                <x-svg.check-badge class="w-12 h-12 mx-auto" />
                                <h3 class="mt-2 text-sm font-semibold text-gray-900">No tasks for this milestone yet
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">Get started by creating a task.</p>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </x-accordion>
        @empty
            <div class="text-center">
                <x-svg.check-badge class="w-12 h-12 mx-auto" />
                <h3 class="mt-2 text-sm font-semibold text-gray-900">No milestones for this goal yet</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a milestone.</p>
            </div>
        @endforelse
    </x-container>
</x-app-layout>
