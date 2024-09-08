<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Goals
            </h2>
            <div class="inline-flex rounded-md shadow-sm isolate">
                <x-button href="/goals/create" styles="indigo">
                    Create Goal
                </x-button>
            </div>
        </div>
    </x-slot>

    <x-container>
        {{-- <x-select x-data="{ typeId: '{{ request('type_id') }}' }"
            @change="window.location.href = $event.target.value ? '/workouts?type_id=' + $event.target.value : '/workouts'"
            class="mb-4">
            <option value="">All Types</option>
            @foreach ($types as $type)
                <option :selected="typeId == '{{ $type->id }}'" value="{{ $type->id }}">{{ $type->name }}
                </option>
            @endforeach
        </x-select> --}}

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
                            {{-- <p class="text-sm leading-6 text-gray-900">{{ $goal->created_at }}</p> --}}
                            <p class="mt-1 text-xs leading-5 text-gray-500">{{ $goal->updated_at->diffForHumans() }}
                            </p>
                        </div>
                        <x-svg.chevron-right class="flex-none w-5 h-5 text-gray-400" />
                    </div>
                </li>
            @empty
                <li class="flex items-center justify-center py-5">
                    <div class="text-center">
                        <x-svg.user-circle class="w-12 h-12 mx-auto bg-gray-400 rounded-full text-gray-50" />
                        <h3 class="mt-2 text-sm font-semibold text-gray-900">No goals</h3>
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
