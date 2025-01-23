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
                                    @if ($selectedCategory === 'Social')
                                        Social goals may include devoting time to friendships, participating in social
                                        activities, or building a social support network.
                                    @elseif($selectedCategory === 'Career & Finance')
                                        Career goals might focus on achieving professional milestones or enhancing
                                        job-related skills.
                                    @elseif($selectedCategory === 'Health & Fitness')
                                        Physical goals often involve fitness achievements, health improvements or other
                                        bodily goals.
                                    @elseif($selectedCategory === 'Family')
                                        Family goals could center on spending more time with family, planning family
                                        events,
                                        or enhancing home life.
                                    @elseif($selectedCategory === 'Hobbies')
                                        Leisure goals can relate to hobbies, travel, or other recreational activities.
                                    @elseif($selectedCategory === 'Personal Development')
                                        Personality goals may involve personal development, such as becoming more
                                        patient or
                                        organized.
                                    @elseif($selectedCategory === 'Other')
                                        Other goals that do not necessarily fit into any other category.
                                    @endif
                                </p>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3">
                                    <x-label class="mb-2" for="title">Goal:</x-label>
                                    <x-input id="title" name="title" :value="old('title', $goal->title)"></x-input>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1">
                            <x-label class="mb-2" for="notes">Notes</x-label>
                            <x-textarea type="text" id="notes" name="notes"
                                rows="4">{{ old('notes'), $goal->notes }}</x-textarea>
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
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
