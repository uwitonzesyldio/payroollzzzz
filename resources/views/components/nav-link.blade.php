@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 py-2 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50 text-sm font-medium leading-5 text-emerald-700 shadow-sm focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-3 py-2 rounded-xl text-sm font-medium leading-5 text-gray-500 hover:text-emerald-700 hover:bg-emerald-50/50 focus:outline-none focus:text-emerald-700 focus:bg-emerald-50/50 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
