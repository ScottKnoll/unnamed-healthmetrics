@props(['color' => null])

@php
    match ($color) {
        'blue' => ($badgeClasses = 'rounded-md bg-blue-50 px-1.5 py-0.5 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-600/20'),
        'green' => ($badgeClasses = 'rounded-md bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20'),
        'red' => ($badgeClasses = 'rounded-md bg-red-50 px-1.5 py-0.5 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20'),
        default => ($badgeClasses = 'rounded-md bg-gray-50 px-1.5 py-0.5 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/20'),
    };
@endphp

<span {{ $attributes->merge(['class' => $badgeClasses]) }}>
    {{ $slot }}
</span>
