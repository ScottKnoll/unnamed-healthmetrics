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
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <aside class="px-2 py-6 sm:px-6 lg:col-span-3 lg:px-0 lg:py-0">
                <nav class="space-y-1">
                    <!-- Current: "bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700", Default: "text-gray-900 hover:bg-gray-50 hover:text-gray-900" -->
                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-indigo-700 rounded-md group bg-gray-50 hover:bg-white hover:text-indigo-700"
                        aria-current="page">
                        <!-- Current: "text-indigo-500 group-hover:text-indigo-500", Default: "text-gray-400 group-hover:text-gray-500" -->
                        <x-svg.user-group
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Social</span>
                    </a>
                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                        <x-svg.briefcase
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Career</span>
                    </a>
                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                        <x-svg.scale
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Physical</span>
                    </a>
                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                        <x-svg.heart
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Family</span>
                    </a>
                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                        <x-svg.music-note
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Leisure</span>
                    </a>
                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                        <x-svg.happy-face
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Personality</span>
                    </a>
                    <a href="#"
                        class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                        <x-svg.question-mark-circle
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Other</span>
                    </a>
                </nav>
            </aside>

            <div class="space-y-6 sm:px-6 lg:col-span-9 lg:px-0">
                <form action="#" method="POST">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                            <div>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Social</h3>
                                <p class="mt-1 text-sm text-gray-500">Social goals may include devoting time to
                                    friendships, participating in social activities, or building a social support
                                    network.</p>
                            </div>

                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3">
                                    <label for="five_year" class="block text-sm font-medium leading-6 text-gray-900">My
                                        5-year Goal:</label>
                                    <div class="mt-2">
                                        <x-textarea id="five_year" name="five_year" rows="3"></x-textarea>
                                    </div>
                                </div>

                                <div class="col-span-3">
                                    <label for="one_year" class="block text-sm font-medium leading-6 text-gray-900">My
                                        1-year Goal:</label>
                                    <div class="mt-2">
                                        <x-textarea id="one_year" name="one_year" rows="3"></x-textarea>
                                    </div>
                                </div>

                                <div class="col-span-3">
                                    <label for="one_month" class="block text-sm font-medium leading-6 text-gray-900">My
                                        1-month Goal:</label>
                                    <div class="mt-2">
                                        <x-textarea id="one_month" name="one_month" rows="3"></x-textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                            <div>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">S.M.A.R.T. Goals</h3>
                                <p class="mt-1 text-sm text-gray-500">Write goals that are measurable.</p>
                            </div>

                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="specific"
                                        class="block text-sm font-medium leading-6 text-gray-900">Specific</label>
                                    <x-textarea id="specific" name="specific" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What do you want to accomplish? Who needs to
                                        be included? When do you want to do this? Why is this a goal?</p>
                                </div>

                                <div>
                                    <label for="measurable"
                                        class="block text-sm font-medium leading-6 text-gray-900">Measurable</label>
                                    <x-textarea id="measurable" name="measurable" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">How can you measure progress and know if
                                        you’ve successfully met your goal?</p>
                                </div>

                                <div>
                                    <label for="achievable"
                                        class="block text-sm font-medium leading-6 text-gray-900">Achievable</label>
                                    <x-textarea id="achievable" name="achievable" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Do you have the skills required to achieve
                                        the goal? If not, can you obtain them? What is the motivation for this goal? Is
                                        the amount of effort required on par with what the goal will achieve?</p>
                                </div>

                                <div>
                                    <label for="relevant"
                                        class="block text-sm font-medium leading-6 text-gray-900">Relevant</label>
                                    <x-textarea id="relevant" name="relevant" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Why am I setting this goal now? Is it aligned
                                        with overall objectives?</p>
                                </div>

                                <div>
                                    <label for="time_bound"
                                        class="block text-sm font-medium leading-6 text-gray-900">Time-bound</label>
                                    <x-textarea id="time-bound" name="time-bound" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What’s the deadline and is it realistic?</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
    {{-- <div class="mt-4">
        {{ $goals->links() }}
    </div> --}}
</x-app-layout>
