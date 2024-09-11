<x-app-layout>
    <x-container>
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">
            <div class="space-y-6 sm:px-6 lg:col-span-12 lg:px-0">
                <form action="/tasks" method="POST">
                    @csrf
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3">
                                    <x-label class="mb-2" for="goal">Task:</x-label>
                                    <x-input id="goal" name="goal" :value="old('goal', $goal->goal)"></x-input>
                                    <x-input-error :messages="$errors->get('goal')" class="mt-2" />
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
                                        rows="3">{{ old('smart_goals[specific]', $goal->smart_goals['specific']) }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">What do you want to accomplish? Who needs to
                                        be included? When do you want to do this? Why is this a goal?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.specific')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[measurable]">Measurable</x-label>
                                    <x-textarea id="smart_goals[measurable]" name="smart_goals[measurable]"
                                        rows="3">{{ old('smart_goals[measurable]', $goal->smart_goals['measurable']) }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">How can you measure progress and know if
                                        you’ve successfully met your goal?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.measurable')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[achievable]">Achievable</x-label>
                                    <x-textarea id="smart_goals[achievable]" name="smart_goals[achievable]"
                                        rows="3">{{ old('smart_goals[achievable]', $goal->smart_goals['achievable']) }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Do you have the skills required to achieve the
                                        goal? If not, can you obtain them? What is the motivation for this goal? Is the
                                        amount of effort required on par with what the goal will achieve?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.achievable')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[relevant]">Relevant</x-label>
                                    <x-textarea id="smart_goals[relevant]" name="smart_goals[relevant]"
                                        rows="3">{{ old('smart_goals[relevant]', $goal->smart_goals['relevant']) }}</x-textarea>
                                    <p class="mt-2 text-sm text-gray-500">Why am I setting this goal now? Is it aligned
                                        with overall objectives?</p>
                                    <x-input-error :messages="$errors->get('smart_goals.relevant')" class="mt-2" />
                                </div>
                                <div>
                                    <x-label class="mb-2" for="smart_goals[time-based]">Time-based</x-label>
                                    <x-textarea id="smart_goals[time-based]" name="smart_goals[time-based]"
                                        rows="3">{{ old('smart_goals[time-based]', $goal->smart_goals['time-based']) }}</x-textarea>
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
