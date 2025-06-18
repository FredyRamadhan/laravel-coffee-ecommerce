<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-onyx dark:text-timber leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="py-12">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-12">
            <section class="bg-white dark:bg-onyx overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-12 text-onyx dark:text-timber text-center">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di <span class="text-gold">SpillDaBeans</span>!</h1>
                    <p class="text-xl mb-6 text-myrtle dark:text-timber">Surga biji kopi pilihan dari seluruh Nusantara. Temukan cita rasa kopi terbaik untuk menemani harimu.</p>
                    <x-main-button href="/products" >Lihat Katalog Kami</x-main-button>
                </div>
            </section>

            <section>
                <h2 class="text-3xl font-semibold text-onyx dark:text-timber mb-6 text-center">Kategori Unggulan</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-onyx overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                        <div class="mb-4">
                            <svg class="w-16 h-16 mx-auto text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-12v4m-2-2h4m2 10h4m-4 2v4M19 5h4M17 7v4"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-onyx dark:text-white mb-2">Biji Kopi Arabika</h3>
                        <p class="text-myrtle dark:text-timber text-sm">Nikmati keharuman dan rasa kompleks dari biji Arabika pilihan.</p>
                    </div>
                    <div class="bg-white dark:bg-onyx overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                        <div class="mb-4">
                            <svg class="w-16 h-16 mx-auto text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.343A8 8 0 106.343 7.657L12 12l5.657 6.343z"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-onyx dark:text-white mb-2">Biji Kopi Robusta</h3>
                        <p class="text-myrtle dark:text-timber text-sm">Cita rasa kuat dan mantap untuk semangat pagi Anda.</p>
                    </div>
                    <div class="bg-white dark:bg-onyx overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                        <div class="mb-4">
                            <svg class="w-16 h-16 mx-auto text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-onyx dark:text-white mb-2">Excelso</h3>
                        <p class="text-myrtle dark:text-timber text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, optio nostrum rerum iusto tenetur odio dolorum nisi distinctio.</p>
                    </div>
                </div>
            </section>

            <section class="bg-white dark:bg-onyx overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-12 text-onyx dark:text-timber">
                    <h2 class="text-3xl font-semibold mb-6 text-center">Mengapa Memilih SpillDB?</h2>
                    <div class="grid md:grid-cols-3 gap-8 text-center">
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-onyx dark:text-white">Kualitas Terjamin</h3>
                            <p class="text-myrtle dark:text-timber text-sm">Biji kopi segar pilihan langsung dari petani terbaik, diproses dengan standar tinggi.</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-onyx dark:text-white">Beragam Pilihan</h3>
                            <p class="text-myrtle dark:text-timber text-sm">Koleksi lengkap dari berbagai daerah dengan karakteristik rasa yang unik.</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-onyx dark:text-white">Pelayanan Terbaik</h3>
                            <p class="text-myrtle dark:text-timber text-sm">Pengiriman cepat dan aman, serta dukungan pelanggan yang siap membantu.</p>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <br>
    <x-footer></x-footer>
</x-app-layout>