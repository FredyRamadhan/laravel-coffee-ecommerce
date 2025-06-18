<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-onyx dark:text-timber leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-onyx overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-onyx dark:text-timber flex flex-col gap-8">
                    <h1 class="text-3xl">Keranjang {{ Auth::user()->name }}</h1>
                    <div class="bg-eerie p-4 min-h-60 rounded-lg">
                        {{-- Cart items will be listed here --}}
                    </div>
                    <div class="flex gap-3">
                        <x-main-button href="#" >Checkout</x-main-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>