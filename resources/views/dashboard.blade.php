<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-8">
                    <h1 class="text-3xl">Halo, {{ Auth::user()->name }}</h1>
                    <h1 class="text-2xl">Ini riwayat transaksi kamu:</h1>
                    <div class="bg-gray-900 p-4 min-h-60 rounded-lg">
                        asdf
                    </div>
                    <div class="flex gap-3">
                        <x-main-button href="/cart" >cek keranjang</x-main-button>
                        <x-main-button href="/profile">edit profil</x-main-button>
                        <form action="/logout" method="POST">
                            @csrf
                            <x-primary-button>Keluar</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
