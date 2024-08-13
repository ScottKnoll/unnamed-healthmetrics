@props([
    'renderAs' => 'button',
    'size' => 'md',
    'styles' => 'default',
])

@php
    switch ($styles) {
        case 'none':
            $btnClasses = '';
            break;
        case 'indigo':
            $btnClasses = 'bg-indigo-600 rounded-md text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600';
            break;
        default:
            $btnClasses = 'rounded-md font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 bg-white text-sm';
            break;
    }

    switch ($size) {
        case 'sm':
            $btnClasses .= ' rounded px-2 py-1 text-sm';
            break;
        case 'md':
            $btnClasses .= ' px-3 py-2 text-sm';
            break;
        case 'lg':
            $btnClasses .= ' rounded-lg px-6 py-4 text-lg';
            break;
        default:
            $btnClasses .= ' px-3 py-2';
            break;
    }
@endphp

@if ($attributes->has('href'))
    <a {{ $attributes->merge(['class' => $btnClasses]) }}>
        {{ $slot }}
    </a>
@elseif ($renderAs === 'input')
    <input {{ $attributes->merge(['type' => 'submit', 'value' => 'Submit', 'class' => $btnClasses]) }}>
@else
    <button {{ $attributes->merge(['class' => $btnClasses]) }}>
        {{ $slot }}
    </button>
@endif
