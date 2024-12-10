<div x-data="{ open: false }" class="my-2 bg-white rounded-lg shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl">
    <h2>
        <button @click="open = !open" :aria-expanded="open"
            class="flex items-center justify-between w-full px-4 py-5 sm:px-6 focus:outline-none"
            :class="{ 'bg-indigo-100 text-indigo-600 rounded-t-xl': open }">
            <div class="flex flex-col text-left">
                <p class="text-base font-semibold leading-6 text-gray-900" :class="{ 'text-indigo-600': open }">
                    {{ $title }}
                </p>
                @if (isset($subtitle))
                    <p class="mt-1 text-sm text-gray-500" :class="{ 'text-indigo-600': open }">
                        {{ $subtitle }}
                    </p>
                @endif
            </div>
            <div class="flex items-center">
                <x-svg.chevron-down x-show="!open" x-cloak class="size-5" />
                <x-svg.chevron-up x-show="open" x-cloak class="size-5" />
            </div>
        </button>
    </h2>
    <div x-show="open" x-collapse.duration.300ms class="px-4 py-5 sm:px-6">
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
