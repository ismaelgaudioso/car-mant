@props(['active'])

@php
$classes = ($active ?? false)
? 'relative px-4 py-3 flex items-center space-x-4 rounded-xl text-sea-buckthorn-400 bg-gradient-to-r from-dodger-blue-600 to-dodger-blue-300'
: 'px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>