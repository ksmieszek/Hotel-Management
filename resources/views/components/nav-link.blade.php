@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-blue-500 hover:text-blue-500 focus:outline-none transition duration-150 ease-in-out border-blue-500 border-b-2'
            : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-blue-500 focus:outline-none focus:text-blue-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
