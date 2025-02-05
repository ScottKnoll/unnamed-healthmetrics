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
    <div class="w-full mx-auto mt-2 max-w-7xl">
        <div class="bg-white dark:bg-zinc-950">
            <div class="flow-root">
                <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full p-2 align-middle sm:px-6 lg:px-8">
                        <x-data-table class="divide-gray-300 dark:bg-zinc-900 ring-black/5">
                            <x-data-table.action-bar class="bg-gray-50">
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
                                                <x-dropdown-link
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'active']) }}">
                                                    Active ({{ $activeCount }})
                                                </x-dropdown-link>
                                                <x-dropdown-link
                                                    href="{{ request()->fullUrlWithQuery(['status' => 'completed']) }}">
                                                    Completed ({{ $completedCount }})
                                                </x-dropdown-link>
                                            </div>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </x-data-table.action-bar>
                            @if ($status == 'completed')
                                <x-data-table.filter-bar class="text-sm dark:bg-zinc-850 bg-zinc-50 dark:text-zinc-300 text-zinc-600">
                                    <x-badge color="green">Completed</x-badge>
                                    <a href="/goals"
                                        class="dark:text-zinc-500 text-zinc-600 dark:hover:text-zinc-400 hover:text-zinc-500">
                                        <x-svg.x-circle class="size-5" />
                                    </a>
                                </x-data-table.filter-bar>
                            @endif
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
                                        <x-svg.check-badge class="mx-auto size-12" />
                                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No goals for this category
                                        </h3>
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
