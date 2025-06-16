<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full max-w-[1200px] mx-auto mt-6 px-6 py-4">
        <div class="grid grid-cols-3 gap-2">

            <x-product-card></x-product-card>
            <x-product-card></x-product-card>
            <x-product-card></x-product-card>
        </div>
    </div>
    <x-footer></x-footer>
</x-app-layout>