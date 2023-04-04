@props(['active'])

@php
$classes = ($active ?? false)
? 'relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-sky-600 to-cyan-400'
: 'px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>