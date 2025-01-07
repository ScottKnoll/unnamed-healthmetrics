<x-app-layout>
    <div class="bg-white shadow dark:bg-gray-800">
        <div class="px-4 pt-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative pb-5 sm:pb-0">
                <div class="md:flex md:items-center md:justify-between">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Goals</h3>
                    <div class="flex mt-3 md:absolute md:right-0 md:top-3 md:mt-0 gap-x-4">
                        <x-button href="{{ route('goals.create') }}" type="button" styles="indigo">Create</x-button>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="sm:hidden">
                        <select id="current-tab" name="current-tab"
                            onchange="window.location.href='?category='+this.value"
                            class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                            <option value="all" {{ $currentCategory === 'all' ? 'selected' : '' }}>All Goals</option>
                            @foreach ($categories as $slug => $name)
                                <option value="{{ $slug }}" {{ $currentCategory === $slug ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="hidden sm:block">
                        <nav class="flex -mb-px space-x-8">
                            <a href="?category=all"
                                class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium
                            {{ $currentCategory === 'all' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                                All
                            </a>
                            @foreach ($categories as $slug => $name)
                                <a href="?category={{ $slug }}"
                                    class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium
                                {{ $currentCategory === $slug ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}">
                                    {{ $name }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-container>
        <ul role="list" class="mt-8">
            @forelse ($goals as $goal)
                <li>
                    <x-accordion :title="$goal->title" :subtitle="$goal->category">
                        <div class="mt-4">
                            <div>
                                <div class="px-4 sm:px-0">
                                    <h3 class="font-semibold text-gray-900 text-base/7">SMART List</h3>
                                    <p class="max-w-2xl mt-1 text-gray-500 text-sm/6">What makes this goal smart
                                    </p>
                                </div>
                                <div class="mt-6">
                                    <dl class="grid grid-cols-1 sm:grid-cols-2">
                                        @foreach ($goal->smart_goals as $key => $value)
                                            <div
                                                class="px-4 py-6 border-t border-gray-100 sm:col-span-2 sm:px-0 {{ $loop->last ? 'border-b border-gray-100' : '' }}">
                                                <dt class="font-medium text-gray-900 text-sm/6">
                                                    {{ ucfirst($key) }}
                                                </dt>
                                                <dd class="mt-1 text-gray-700 text-sm/6 sm:mt-2">
                                                    {{ $value }}
                                                </dd>
                                            </div>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                            {{-- <div class="flex justify-end mb-4">
                                <x-button href="{{ route('goals.milestones.create', $goal->id) }}" type="button"
                                    styles="green">
                                    Add Milestone
                                </x-button>
                            </div> --}}
                            <div class="mt-6">
                                <div class="px-4 sm:px-0">
                                    <h3 class="font-semibold text-gray-900 text-base/7">Habits</h3>
                                    <p class="max-w-2xl mt-1 text-gray-500 text-sm/6">Keep this here for now
                                    </p>
                                </div>
                                <div class="mt-6">
                                    <div class="px-4 py-6 border-t border-gray-100 sm:col-span-2 sm:px-0">
                                        @if ($goal->milestones->isNotEmpty())
                                            <ul role="list" class="space-y-4">
                                                @foreach ($goal->milestones as $milestone)
                                                    <li class="p-4 rounded-lg shadow bg-gray-50">
                                                        <div class="flex items-center justify-between">
                                                            <div class="flex items-center gap-x-3">
                                                                <div x-data>
                                                                    <form method="POST"
                                                                        action="{{ route('goals.milestones.update', [$goal->id, $milestone->id]) }}">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="is_completed"
                                                                            value="0">
                                                                        <input type="hidden" name="redirect_to"
                                                                            value="{{ url()->current() }}">
                                                                        <input type="checkbox" name="is_completed"
                                                                            value="1"
                                                                            class="w-5 h-5 text-blue-600 form-checkbox"
                                                                            {{ $milestone->is_completed ? 'checked' : '' }}
                                                                            x-on:change="$el.form.submit()">
                                                                    </form>
                                                                </div>
                                                                <div>
                                                                    <h4 class="font-semibold text-gray-800 text-md">
                                                                        {{ $milestone->title }}
                                                                    </h4>
                                                                    @if ($milestone->description)
                                                                        <p class="mt-1 text-sm text-gray-500">
                                                                            {{ $milestone->description }}</p>
                                                                    @endif
                                                                    @if ($milestone->target_date)
                                                                        <p class="mt-1 text-xs text-gray-400">Target
                                                                            Date:
                                                                            {{ $milestone->target_date->format('M d, Y') }}
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center space-x-2">
                                                                <x-button
                                                                    href="{{ route('goals.milestones.edit', [$goal->id, $milestone->id]) }}"
                                                                    type="button" styles="blue" size="small">
                                                                    Edit
                                                                </x-button>
                                                                <form
                                                                    action="{{ route('goals.milestones.destroy', [$goal->id, $milestone->id]) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this milestone?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <x-button type="submit" styles="red"
                                                                        size="small">
                                                                        Delete
                                                                    </x-button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <div class="text-center text-gray-500">
                                                <p>No milestones for this goal yet.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-accordion>
                </li>
            @empty
                <li class="flex items-center justify-center py-5">
                    <div class="text-center">
                        <x-svg.check-badge class="w-12 h-12 mx-auto" />
                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No goals for this category</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a goal.</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </x-container>
</x-app-layout>
