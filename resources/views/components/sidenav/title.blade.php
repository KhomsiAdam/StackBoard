@php
$classes = 'text-green-500 mt-4 uppercase font-semibold text-xl';
@endphp

<div>
    <h2 {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </h2>
</div>
