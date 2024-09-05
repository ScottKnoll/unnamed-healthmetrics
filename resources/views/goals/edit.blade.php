<x-app-layout>
    <x-container>
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <div class="space-y-6 sm:px-6 lg:col-span-12 lg:px-0">
                <form action="/goals/{{ $goal->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="category" value="{{ $category }}">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                            <div>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">{{ ucfirst($category) }}
                                    Goals</h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    @switch($category)
                                        @case('social')
                                            Social goals may include devoting time to friendships, participating in social
                                            activities, or building a social support network.
                                        @break

                                        @case('career')
                                            Career goals might focus on achieving professional milestones or enhancing
                                            job-related skills.
                                        @break

                                        @case('physical')
                                            Physical goals often involve fitness achievements, health improvements or other
                                            bodily goals.
                                        @break

                                        @case('family')
                                            Family goals could center on spending more time with family, planning family events,
                                            or enhancing home life.
                                        @break

                                        @case('leisure')
                                            Leisure goals can relate to hobbies, travel, or other recreational activities.
                                        @break

                                        @case('personality')
                                            Personality goals may involve personal development, such as becoming more patient or
                                            organized.
                                        @break

                                        @case('other')
                                            Other goals that do not necessarily fit into any other category.
                                        @break
                                    @endswitch
                                </p>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3">
                                    <x-label class="mb-2" for="five_year_goal">My 5-year Goal:</x-label>
                                    <x-textarea id="five_year_goal" name="five_year_goal" :value="old('five_year_goal', $goal->five_year_goal)"
                                        rows="3"></x-textarea>
                                    <x-input-error :messages="$errors->get('five_year_goal')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <x-label class="mb-2" for="one_year_goal">My 1-year Goal:</x-label>
                                    <x-textarea id="one_year_goal" name="one_year_goal" :value="old('one_year_goal', $goal->one_year_goal)"
                                        rows="3"></x-textarea>
                                    <x-input-error :messages="$errors->get('one_year_goal')" class="mt-2" />
                                </div>
                                <div class="col-span-3">
                                    <x-label class="mb-2" for="one_month_goal">My 1-month Goal:</x-label>
                                    <x-textarea id="one_month_goal" name="one_month_goal" :value="old('one_month_goal', $goal->one_month_goal)"
                                        rows="3"></x-textarea>
                                    <x-input-error :messages="$errors->get('one_month_goal')" class="mt-2" />
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
                                        :value="old('smart_goals[specific]', $goal->smart_goals['specific'])" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What do you want to accomplish? Who needs to
                                        be included? When do you want to do this? Why is this a goal?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.specific')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[measurable]">Measurable</x-label>
                                    <x-textarea id="smart_goals[measurable]" name="smart_goals[measurable]"
                                        :value="old('smart_goals[measurable]', $goal->smart_goals['measurable'])" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">How can you measure progress and know if
                                        you’ve successfully met your goal?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.measurable')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[achievable]">Achievable</x-label>
                                    <x-textarea id="smart_goals[achievable]" name="smart_goals[achievable]"
                                        :value="old('smart_goals[achievable]', $goal->smart_goals['achievable'])" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Do you have the skills required to achieve the
                                        goal? If not, can you obtain them? What is the motivation for this goal? Is the
                                        amount of effort required on par with what the goal will achieve?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.achievable')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[relevant]">Relevant</x-label>
                                    <x-textarea id="smart_goals[relevant]" name="smart_goals[relevant]"
                                        :value="old('smart_goals[relevant]', $goal->smart_goals['relevant'])" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Why am I setting this goal now? Is it aligned
                                        with overall objectives?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.relevant')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[time-based]">Time-based</x-label>
                                    <x-textarea id="smart_goals[time-based]" name="smart_goals[time-based]"
                                        :value="old('smart_goals[time-based]', $goal->smart_goals['time-based'])" rows="3"></x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What’s the deadline and is it realistic?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.time-based')" class="mt-2" />
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
</x-app-layout>
