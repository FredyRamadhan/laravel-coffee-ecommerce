@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-gold text-sm font-medium leading-5 text-onyx dark:text-white focus:outline-none focus:border-gold transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-myrtle dark:text-timber hover:text-onyx dark:hover:text-white hover:border-timber dark:hover:border-myrtle focus:outline-none focus:text-onyx dark:focus:text-white focus:border-timber dark:focus:border-myrtle transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>