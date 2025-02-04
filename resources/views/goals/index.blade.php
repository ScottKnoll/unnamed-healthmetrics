<x-app-layout>
    <x-slot name="header">
        <div class="relative pb-5 -mb-6 sm:pb-0">
            <div class="md:flex md:items-center md:justify-between">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Goals</h3>
                <div class="flex mt-3 md:absolute md:right-0 md:top-3 md:mt-0 gap-x-4">
                    <x-button href="{{ route('goals.create') }}" type="button" styles="indigo">Create</x-button>
                </div>
            </div>
            <div class="mt-4">
                <div class="sm:hidden">
                    <select id="current-tab" name="current-tab" onchange="window.location.href='?category='+this.value"
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
    </x-slot>
    {{-- <x-container>
        <ul role="list" class="mt-8">
            @forelse ($goals as $goal)
                <li class="mt-4">
                    <x-accordion :title="$goal->title" :subtitle="$goal->category">
                        <div class="px-4 mt-2 sm:px-0">
                            <h3 class="font-semibold text-gray-900 text-base/7">Details</h3>
                            <p class="max-w-2xl mt-1 text-gray-500 text-sm/6">What makes this goal smart
                                    </p>
                        </div>
                        <div class="mt-6">
                            <dl class="grid grid-cols-1 sm:grid-cols-2">
                                <div
                                    class="px-4 py-6 border-t border-gray-100 sm:col-span-2 sm:px-0 {{ $loop->last ? 'border-b border-gray-100' : '' }}">
                                    <dt class="font-medium text-gray-900 text-sm/6">
                                        <div class="flex items-center">
                                            <x-svg.calendar-date-range class="block w-auto mr-2 text-gray-800 size-4" />
                                            {{ $goal->start_date ? $goal->start_date->format('M d, Y') : 'N/A' }}
                                            - {{ $goal->end_date ? $goal->end_date->format('M d, Y') : 'N/A' }}
                                        </div>
                                    </dt>
                                    <dd class="mt-1 text-gray-700 text-sm/6 sm:mt-2">
                                        {{ $goal->notes }}
                                    </dd>
                                    <dd class="mt-1 text-gray-700 text-sm/6 sm:mt-2">
                                        Hardcoded 0/0 tasks done
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div class="flex justify-end mb-4">
                                <x-button href="{{ route('goals.milestones.create', $goal->id) }}" type="button"
                                    styles="green">
                                    Add Milestone
                                </x-button>
                            </div>
                        <div class="mt-6">
                            <div class="px-4 sm:px-0">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-semibold text-gray-900 text-base/7">Milestones</h3>
                                        <p class="max-w-2xl mt-1 text-gray-500 text-sm/6">Keep this here for now
                                        </p>
                                    </div>
                                    <div>
                                        <x-button href="{{ route('goals.milestones.create', ['goal' => $goal->id]) }}"
                                            type="button" styles="indigo">Add</x-button>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-6 sm:col-span-2 sm:px-0">
                                @if ($goal->milestones->isNotEmpty())
                                    <ul role="list" class="space-y-4">
                                        @foreach ($goal->milestones as $milestone)
                                            <li class="p-4 bg-white border border-gray-200 rounded-md">
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
                                                            <x-button type="submit" styles="red" size="small">
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
    </x-container> --}}
    <div class="w-full mx-auto mt-2 max-w-7xl">
        <div class="bg-white dark:bg-zinc-950">
            <div class="flow-root">
                <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full p-2 align-middle sm:px-6 lg:px-8">
                        <x-data-table>
                            <x-data-table.action-bar>
                                <div class="ml-auto">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <div class="flex justify-end">
                                                <button type="button" aria-haspopup="true">
                                                    <x-svg.funnel
                                                        class="mr-2 size-7 dark:fill-zinc-500 fill-zinc-600 dark:hover:fill-zinc-400 hover:fill-zinc-500" />
                                                </button>
                                            </div>
                                        </x-slot>
                                        <x-slot name="content">
                                            <div role="menu" aria-orientation="vertical">
                                                {{-- @php
                                $isAdmin = auth()->user()->hasRole('admin');
                            @endphp
                            @if ($isAdmin || auth()->user()->hasRole('audio'))
                                <x-dropdown-link href="/shows?status=active&type=audio">
                                    Active{{ $isAdmin ? ' Audio' : '' }} ({{ $activeAudioCount }})
                                </x-dropdown-link>
                                <x-dropdown-link href="/shows?status=inactive&type=audio">
                                    Inactive{{ $isAdmin ? ' Audio' : '' }} ({{ $inactiveAudioCount }})
                                </x-dropdown-link>
                            @endif
                            @if ($isAdmin || auth()->user()->hasRole('tv'))
                                <x-dropdown-link href="/shows?status=active&type=tv">
                                    Active{{ $isAdmin ? ' TV' : '' }} ({{ $activeTvCount }})
                                </x-dropdown-link>
                                <x-dropdown-link href="/shows?status=inactive&type=tv">
                                    Inactive{{ $isAdmin ? ' TV' : '' }} ({{ $inactiveTvCount }})
                                </x-dropdown-link>
                            @endif --}}
                                            </div>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </x-data-table.action-bar>
                            {{-- @if ($status == 'inactive') --}}
                            <x-data-table.filter-bar>
                                <x-badge color="evergreen">Inactive</x-badge>
                                <a href="/topics"
                                    class="dark:text-zinc-500 text-zinc-600 dark:hover:text-zinc-400 hover:text-zinc-500">
                                    <x-svg.x-circle class="size-5" />
                                </a>
                            </x-data-table.filter-bar>
                            {{-- @endif --}}
                            <ul role="list"
                                class="divide-y dark:divide-white/10 divide-zinc-950/10 bg-zinc-850 dark:border-white/10 border-zinc-950/10">
                                @forelse ($goals as $goal)
                                    <a href="/goals/{{ $goal->id }}" class="block group">
                                        <li class="px-6">
                                            <div class="flex items-center py-5 sm:py-6">
                                                <div class="flex items-center flex-1 min-w-0">
                                                    <div class="flex-1 min-w-0 md:grid md:grid-cols-2">
                                                        <div>
                                                            <p
                                                                class="text-sm font-medium truncate text-zinc-950 dark:text-white">
                                                                {{ $goal->title }}
                                                            </p>
                                                            <div
                                                                class="flex flex-wrap items-center gap-1 mt-2 text-sm dark:text-evergreen-400 text-evergreen-700">
                                                                {{-- @foreach ($show->people as $index => $person)
                                                <x-badge>
                                                    <x-svg.mic
                                                        class="size-4 fill-evergreen-600 dark:fill-evergreen-500" />
                                                    {{ $person->name_full }}
                                                </x-badge>
                                            @endforeach --}}
                                                                {{ $goal->category }}
                                                            </div>
                                                        </div>
                                                        <div class="hidden md:block">
                                                            <div
                                                                class="flex items-center text-sm text-zinc-950 dark:text-white">
                                                                <div
                                                                    class="flex-none p-1 text-green-400 bg-green-100 rounded-full dark:bg-green-400/10 dark:text-green-400">
                                                                    <div class="bg-current rounded-full size-2"></div>
                                                                </div>
                                                                <span class="ml-2">
                                                                    Data point 3
                                                                </span>
                                                            </div>
                                                            <p
                                                                class="flex items-center mt-2 text-sm dark:text-zinc-400 text-zinc-500">
                                                                Data point 4
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <x-svg.chevron-right
                                                        class="text-zinc-400 dark:text-zinc-300 size-5 group-hover:text-zinc-700 dark:group-hover:text-zinc-600" />
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @empty
                                    <div class="py-3 text-center">
                                        <x-svg.check-badge class="w-12 h-12 mx-auto" />
                                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No goals for this category
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">Get started by creating a goal.</p>
                                    </div>
                                @endforelse
                            </ul>
                        </x-data-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
