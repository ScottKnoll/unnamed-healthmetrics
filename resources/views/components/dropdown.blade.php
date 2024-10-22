@props([
    'classes' => 'relative',
    'align' => 'right',
    'contentClasses' => '',
    'width' => 'w-48',
    'dropdownClasses' => 'py-1 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none',
    'triggerClasses' =>
        'cursor-pointer text-sm font-semibold transition duration-150 ease-in-out text-gray-500 hover:text-gray-700',
])

@php
    switch ($align) {
        case 'none':
            $alignmentClasses = '';
            break;
        case 'left':
        case 'top-left':
            $alignmentClasses = 'origin-top-left top-full left-0';
            break;
        case 'right':
        case 'top-right':
            $alignmentClasses = 'origin-top-right top-full right-0';
            break;
        case 'bottom-left':
            $alignmentClasses = 'origin-bottom-left bottom-full left-0';
            break;
        case 'bottom-right':
            $alignmentClasses = 'origin-top-left -bottom-4 right-0';
            break;
        default:
            $alignmentClasses = 'origin-top-left top-full left-0';
            break;
    }
@endphp

<div class="{{ $classes }}" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div @click="open = !open" class="{{ $triggerClasses }}">
        {{ $trigger }}
    </div>
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute z-50 mt-2 {{ $alignmentClasses }} {{ $dropdownClasses }} {{ $width }}"
        style="display: none;">
        <div class="{{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
