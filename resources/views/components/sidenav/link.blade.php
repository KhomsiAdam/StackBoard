@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex space-x-3 items-center px-2 pt-2 text-lg font-medium leading-5 text-green-400 focus:outline-none transition'
: 'inline-flex space-x-3 items-center px-2 pt-2 text-lg font-medium leading-5 text-gray-500 transition hover:text-green-400';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
