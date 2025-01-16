<x-app-layout>
    <x-container>
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <aside class="px-2 py-6 sm:px-6 lg:col-span-3 lg:px-0 lg:py-0">
                <nav class="space-y-1">
                    @foreach ($categories as $slug => $name)
                        <a href="{{ route('goals.create', ['category' => $slug]) }}" @class([
                            'group flex items-center rounded-md px-3 py-2 text-sm font-medium',
                            'bg-gray-50 text-indigo-700 hover:bg-white hover:text-indigo-700' =>
                                $selectedCategorySlug === $slug,
                            'text-gray-900 hover:bg-gray-50 hover:text-gray-900' =>
                                $selectedCategorySlug !== $slug,
                        ])>
                            <span class="truncate">{{ $name }}</span>
                        </a>
                    @endforeach
                </nav>
            </aside>
            <div class="space-y-6 sm:px-6 lg:col-span-9 lg:px-0">
                <form action="/goals" method="POST">
                    @csrf
                    <input type="hidden" name="category" value="{{ $selectedCategory }}">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                            <div>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">
                                    {{ ucfirst($selectedCategory) }}
                                    Goal
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    @switch($selectedCategory)
                                        @case('social')
                                            Social goals may include devoting time to friendships, participating in social
                                            activities, or building a social support network.
                                        @break

                                        @case('career-finance')
                                            Career goals might focus on achieving professional milestones or enhancing
                                            job-related skills.
                                        @break

                                        @case('health-fitness')
                                            Physical goals often involve fitness achievements, health improvements or other
                                            bodily goals.
                                        @break

                                        @case('family')
                                            Family goals could center on spending more time with family, planning family events,
                                            or enhancing home life.
                                        @break

                                        @case('hobbies')
                                            Leisure goals can relate to hobbies, travel, or other recreational activities.
                                        @break

                                        @case('personal-development')
                                            Personality goals may involve personal development, such as becoming more patient or
                                            organized.
                                        @break

                                        @case('other')
                                            Other goals that do not necessarily fit into any other category.
                                        @break
                                    @endswitch
                                </p>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-full">
                                    <x-label class="mb-2" for="title">Goal</x-label>
                                    <x-input type="text" id="title" name="title" :value="old('title')"></x-input>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="col-span-1">
                                    <x-label class="mb-2" for="start_date">Start Date</x-label>
                                    <x-input type="date" id="start_date" name="start_date"
                                        :value="old('start_date')"></x-input>
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                                </div>
                                <div class="col-span-1">
                                    <x-label class="mb-2" for="end_date">End Date</x-label>
                                    <x-input type="date" id="end_date" name="end_date" :value="old('end_date')"></x-input>
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                            <div>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">S.M.A.R.T.</h3>
                                <p class="mt-1 text-sm text-gray-500">Write goals that are measurable.</p>
                            </div>
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <x-label class="mb-2" for="smart_goals[specific]">Specific</x-label>
                                    <x-textarea type="text" id="smart_goals[specific]" name="smart_goals[specific]"
                                        rows="4">{{ old('smart_goals[specific]') }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What do you want to accomplish? Who needs to
                                        be included? When do you want to do this? Why is this a goal?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.specific')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[measurable]">Measurable</x-label>
                                    <x-textarea type="text" id="smart_goals[measurable]"
                                        name="smart_goals[measurable]"
                                        rows="4">{{ old('smart_goals[measureable]') }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">How can you measure progress and know if
                                        you’ve successfully met your goal?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.measurable')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[achievable]">Achievable</x-label>
                                    <x-textarea type="text" id="smart_goals[achievable]"
                                        name="smart_goals[achievable]"
                                        rows="4">{{ old('smart_goals[achievable]') }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Do you have the skills required to achieve
                                        the goal? If not, can you obtain them? What is the motivation for this goal? Is
                                        the amount of effort required on par with what the goal will achieve?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.achievable')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[relevant]">Relevant</x-label>
                                    <x-textarea type="text" id="smart_goals[relevant]" name="smart_goals[relevant]"
                                        rows="4">{{ old('smart_goals[relevant]') }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Why am I setting this goal now? Is it aligned
                                        with overall objectives?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.relevant')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[time-based]">Time-based</x-label>
                                    <x-textarea type="text" id="smart_goals[time-based]"
                                        name="smart_goals[time-based]"
                                        rows="4">{{ old('smart_goals[time-based]') }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What’s the deadline and is it realistic?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.time-based')" class="mt-2" />
                                </div>
                            </div>
                            {{-- <div>
                                <h3 class="text-base font-semibold leading-6 text-gray-900">Notes</h3>
                                <p class="mt-1 text-sm text-gray-500">Write goals that are measurable.</p>
                            </div> --}}
                            <div class="grid grid-cols-1">
                                <x-label class="mb-2" for="notes">Notes</x-label>
                                <x-textarea type="text" id="notes" name="notes"
                                    rows="4">{{ old('notes') }}</x-textarea>
                                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                            </div>
                        </div>
                        <div class="px-4 py-3 text-right bg-white border-t border-gray-200 sm:px-6">
                            <x-button type="submit" styles="indigo">Save</x-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
</x-app-layout>
