<x-app-layout>
    <x-container>
        <div class="grid grid-cols-2 gap-5">
            <section>
                <div class="col-span-1 px-5 py-6 bg-white rounded-lg shadow sm:px-6">
                    <h5 class="mb-8 text-xl font-bold">Habits</h5>
                    <div class="space-y-4">
                        <div class="w-full gap-4">
                            <div
                                class="relative flex items-center px-6 py-5 space-x-3 border border-gray-300 rounded-lg shadow-sm bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                                <div class="flex-shrink-0">
                                    checkbox
                                </div>
                                <div class="flex-1 min-w-0">
                                    <a href="#" class="focus:outline-none">
                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                        @foreach ($habits as $habit)
                                            <p class="text-sm font-medium text-gray-900">{{ $habit->title }}</p>
                                            {{-- <p class="text-sm text-gray-500 truncate">{{ $habit->name }}</p> --}}
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                        </div>
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
                    <h5 class="mb-8 text-xl font-bold">Goals</h5>
                    <div class="space-y-4">
                        <div>
                            <p>Goals here</p>
                        </div>
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
