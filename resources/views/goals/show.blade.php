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
    <div class="flex items-center justify-between mt-8 sm:mt-12">
        <h2 class="text-base font-semibold leading-6 text-gray-900">
            Milestones
        </h2>
    </div>
    <x-container>
        <ul role="list"
            class="overflow-hidden bg-white divide-y divide-gray-100 shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
            @forelse ($goal->milestones as $milestone)
                <li class="relative flex justify-between px-4 py-5 gap-x-6 hover:bg-gray-50 sm:px-6">
                    <div class="flex min-w-0 gap-x-4">
                        <div class="flex-auto min-w-0">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                {{ $milestone->title }}
                            </p>
                            <p class="flex mt-1 text-xs leading-5 text-gray-500">
                                <a href="mailto:leslie.alexander@example.com"
                                    class="relative truncate hover:underline">{{ $milestone->description ?? 'N/A' }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center shrink-0 gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{ $milestone->created_at->format('M. d, Y') }}
                            </p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">Target Date:
                                {{ $milestone->target_date->format('M. d, Y') }}
                            </p>
                        </div>
                        <x-svg.chevron-right class="flex-none w-5 h-5 text-gray-400" />
                    </div>
                    <div class="relative flex items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button type="button" class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900">
                                    <x-svg.ellipsis-vertical class="w-5 h-5" />
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link href="/people/{{ $member->id }}/edit">
                                    Edit
                                </x-dropdown-link>
                                <form action="/teams/{{ $team->id }}/members/{{ $member->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:bg-gray-100"
                                        onclick="return confirm('Are you sure you want to remove {{ $milestone->title }}?');">Remove</button>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </li>
            @empty
                <li class="flex items-center justify-center py-5">
                    <div class="text-center">
                        <x-svg.check-badge class="w-12 h-12 mx-auto" />
                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No milestones for this goal yet</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a milestone.</p>
                    </div>
                </li>
            @endforelse
        </ul>
    </x-container>
</x-app-layout>
