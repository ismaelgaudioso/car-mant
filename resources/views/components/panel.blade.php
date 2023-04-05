@props(['span' => 0])

@php 
$class = ($span > 1) ? "col-span-".$span : ""
@endphp

<div {{ $attributes->merge(['class' => $class]) }}>
    <div class="h-full py-8 px-6 space-y-6 rounded-xl border border-gray-200 bg-white">
        {{ $slot }}
    </div>
</div>