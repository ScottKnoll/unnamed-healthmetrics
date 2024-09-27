<x-app-layout>
    <x-slot name="header">
        <div class="relative pb-5 sm:pb-0">
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
    <x-container>
        <ul role="list"
            class="overflow-hidden bg-white divide-y divide-gray-100 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            @forelse ($goals as $goal)
                <li class="relative flex justify-between px-4 py-5 gap-x-6 hover:bg-gray-50 sm:px-6">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="flex-auto min-w-0">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="/goals/{{ $goal->id }}">
                                    <span class="absolute inset-x-0 bottom-0 -top-px"></span>
                                    {{ $goal->title }}
                                </a>
                            </p>
                            <p class="flex mt-1 text-xs leading-5 text-gray-500">
                                <a href="mailto:leslie.alexander@example.com"
                                    class="relative truncate hover:underline">{{ $goal->category ?? 'N/A' }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center shrink-0 gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{ $goal->created_at->format('M. d, Y') }}</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">{{ $goal->updated_at->diffForHumans() }}
                            </p>
                        </div>
                        <x-svg.chevron-right class="flex-none w-5 h-5 text-gray-400" />
                    </div>
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
    {{-- <div class="mt-4">
        {{ $goals->links() }}
    </div> --}}
</x-app-layout>
