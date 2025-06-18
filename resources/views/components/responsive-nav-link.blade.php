@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-gold text-start text-base font-medium text-onyx dark:text-white bg-timber dark:bg-myrtle focus:outline-none focus:text-onyx dark:focus:text-white focus:bg-timber dark:focus:bg-myrtle focus:border-gold transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-myrtle dark:text-timber hover:text-onyx dark:hover:text-white hover:bg-timber dark:hover:bg-myrtle hover:border-timber dark:hover:border-myrtle focus:outline-none focus:text-onyx dark:focus:text-white focus:bg-timber dark:focus:bg-myrtle focus:border-timber dark:focus:border-myrtle transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>