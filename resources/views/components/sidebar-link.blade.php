@props(['active'])

@php
$classes = ($active ?? false)
? 'relative px-4 py-3 text-sea-buckthorn-700'
: 'px-4 py-3';
@endphp
<div class="mt-2">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</div>