<x-app-layout>
    <x-container>
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <aside class="px-2 py-6 sm:px-6 lg:col-span-3 lg:px-0 lg:py-0">
                <nav class="space-y-1">
                    <a href="/goals/create/social" @class([
                        'group flex items-center rounded-md px-3 py-2 text-sm font-medium',
                        'bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700' =>
                            $category === 'Social',
                        'text-gray-900 hover:bg-gray-50 hover:text-gray-900' =>
                            $category !== 'Social',
                    ])>
                        <x-svg.user-group
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Social</span>
                    </a>
                    <a href="/goals/create/career" @class([
                        'group flex items-center rounded-md px-3 py-2 text-sm font-medium',
                        'bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700' =>
                            $category === 'Career',
                        'text-gray-900 hover:bg-gray-50 hover:text-gray-900' =>
                            $category !== 'Career',
                    ])>
                        <x-svg.briefcase
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Career</span>
                    </a>
                    <a href="/goals/create/physical" @class([
                        'group flex items-center rounded-md px-3 py-2 text-sm font-medium',
                        'bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700' =>
                            $category === 'Physical',
                        'text-gray-900 hover:bg-gray-50 hover:text-gray-900' =>
                            $category !== 'Physical',
                    ])>
                        <x-svg.scale
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Physical</span>
                    </a>
                    <a href="/goals/create/family" @class([
                        'group flex items-center rounded-md px-3 py-2 text-sm font-medium',
                        'bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700' =>
                            $category === 'Family',
                        'text-gray-900 hover:bg-gray-50 hover:text-gray-900' =>
                            $category !== 'Family',
                    ])>
                        <x-svg.heart
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Family</span>
                    </a>
                    <a href="/goals/create/leisure" @class([
                        'group flex items-center rounded-md px-3 py-2 text-sm font-medium',
                        'bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700' =>
                            $category === 'Leisure',
                        'text-gray-900 hover:bg-gray-50 hover:text-gray-900' =>
                            $category !== 'Leisure',
                    ])>
                        <x-svg.music-note
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Leisure</span>
                    </a>
                    <a href="/goals/create/personality" @class([
                        'group flex items-center rounded-md px-3 py-2 text-sm font-medium',
                        'bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700' =>
                            $category === 'Personality',
                        'text-gray-900 hover:bg-gray-50 hover:text-gray-900' =>
                            $category !== 'Personality',
                    ])>
                        <x-svg.happy-face
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Personality</span>
                    </a>
                    <a href="/goals/create/other" @class([
                        'group flex items-center rounded-md px-3 py-2 text-sm font-medium',
                        'bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700' =>
                            $category === 'Other',
                        'text-gray-900 hover:bg-gray-50 hover:text-gray-900' =>
                            $category !== 'Other',
                    ])>
                        <x-svg.question-mark-circle
                            class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-indigo-500 group-hover:text-indigo-500" />
                        <span class="truncate">Other</span>
                    </a>
                </nav>
            </aside>
            <div class="space-y-6 sm:px-6 lg:col-span-9 lg:px-0">
                <form action="/goals" method="POST">
                    @csrf
                    <input type="hidden" name="category" value="{{ $category }}">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                            <div>
                                {{-- <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $category }}</h3> --}}
                                <p class="mt-1 text-sm text-gray-500">Social goals may include devoting time to
                                    friendships, participating in social activities, or building a social support
                                    network.</p>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3">
                                    <x-label class="mb-2" for="five_year">My 5-year Goal:</x-label>
                                    <x-textarea id="five_year" name="five_year" :value="old('five_year]')"
                                        rows="3"></x-textarea>
                                    <x-input-error :messages="$errors->get('five_year')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <x-label class="mb-2" for="one_year">My 1-year Goal:</x-label>
                                    <x-textarea id="one_year" name="one_year" :value="old('one_year')"
                                        rows="3"></x-textarea>
                                    <x-input-error :messages="$errors->get('one_year')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <x-label class="mb-2" for="one_month">My 1-month Goal:</x-label>
                                    <x-textarea id="one_month" name="one_month" :value="old('one_month')"
                                        rows="3"></x-textarea>
                                    <x-input-error :messages="$errors->get('one_month')" class="mt-2" />
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
                                    <x-label class="mb-2" for="smart_goals[specific]">Specific</x-label>
                                    <x-textarea id="smart_goals[specific]" name="smart_goals[specific]"
                                        :value="old('smart_goals[specific]')" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What do you want to accomplish? Who needs to
                                        be included? When do you want to do this? Why is this a goal?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.specific')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[measurable]">Measurable</x-label>
                                    <x-textarea id="smart_goals[measurable]" name="smart_goals[measurable]"
                                        :value="old('smart_goals[measureable]')" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">How can you measure progress and know if
                                        you’ve successfully met your goal?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.measurable')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[achievable]">Achievable</x-label>
                                    <x-textarea id="smart_goals[achievable]" name="smart_goals[achievable]"
                                        :value="old('smart_goals[achievable]')" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Do you have the skills required to achieve
                                        the goal? If not, can you obtain them? What is the motivation for this goal? Is
                                        the amount of effort required on par with what the goal will achieve?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.achievable')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[relevant]">Relevant</x-label>
                                    <x-textarea id="smart_goals[relevant]" name="smart_goals[relevant]"
                                        :value="old('smart_goals[relevant]')" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Why am I setting this goal now? Is it aligned
                                        with overall objectives?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.relevant')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[time-bound]">Time-bound</x-label>
                                    <x-textarea id="smart_goals[time-bound]" name="smart_goals[time-bound]"
                                        :value="old('smart_goals[time-bound]')" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What’s the deadline and is it realistic?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.time-bound')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                            <x-button type="submit" styles="indigo">Save</x-button>
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
