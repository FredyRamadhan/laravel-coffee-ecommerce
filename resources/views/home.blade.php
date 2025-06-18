<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-coffee-50 to-coffee-100 dark:from-gray-900 dark:to-gray-800 overflow-hidden">
        <div class="absolute inset-0 bg-coffee-600 opacity-10 dark:opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                    Selamat Datang di
                    <span class="text-coffee-600 dark:text-coffee-400">SpillDaBeans</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                    Surga biji kopi pilihan dari seluruh Nusantara. Temukan cita rasa kopi terbaik untuk menemani harimu.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/products" class="inline-flex items-center px-8 py-4 bg-coffee-600 hover:bg-coffee-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Lihat Katalog Kami
                    </a>
                    <a href="/about" class="inline-flex items-center px-8 py-4 bg-white dark:bg-gray-800 text-coffee-600 dark:text-coffee-400 font-semibold rounded-xl shadow-lg hover:shadow-xl border border-coffee-200 dark:border-gray-700 transition-all duration-300 transform hover:scale-105">
                        Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-16">
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">

            <!-- Categories Section -->
            <section>
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Kategori Unggulan</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Pilihan terbaik dari berbagai jenis kopi Nusantara</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center border border-gray-100 dark:border-gray-700">
                        <div class="mb-6">
                            <div class="w-20 h-20 mx-auto bg-coffee-100 dark:bg-coffee-900 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-coffee-600 dark:text-coffee-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-12v4m-2-2h4m2 10h4m-4 2v4M19 5h4M17 7v4"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Biji Kopi Arabika</h3>
                        <p class="text-gray-600 dark:text-gray-300">Nikmati keharuman dan rasa kompleks dari biji Arabika pilihan dengan cita rasa yang lembut dan aromatik.</p>
                    </div>
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center border border-gray-100 dark:border-gray-700">
                        <div class="mb-6">
                            <div class="w-20 h-20 mx-auto bg-coffee-100 dark:bg-coffee-900 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-coffee-600 dark:text-coffee-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Biji Kopi Robusta</h3>
                        <p class="text-gray-600 dark:text-gray-300">Cita rasa kuat dan mantap dengan kandungan kafein tinggi untuk semangat pagi yang maksimal.</p>
                    </div>
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 text-center border border-gray-100 dark:border-gray-700">
                        <div class="mb-6">
                            <div class="w-20 h-20 mx-auto bg-coffee-100 dark:bg-coffee-900 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10 text-coffee-600 dark:text-coffee-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">Kopi Premium</h3>
                        <p class="text-gray-600 dark:text-gray-300">Koleksi eksklusif kopi specialty dengan proses khusus dan kualitas terbaik dari berbagai daerah.</p>
                    </div>
                </div>
            </section>

            <!-- Why Choose Us Section -->
            <section class="bg-gradient-to-r from-coffee-50 to-coffee-100 dark:from-gray-800 dark:to-gray-900 rounded-3xl p-12">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Mengapa Memilih SpillDaBeans?</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Komitmen kami untuk memberikan yang terbaik</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto bg-coffee-600 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Kualitas Terjamin</h3>
                        <p class="text-gray-600 dark:text-gray-300">Biji kopi segar pilihan langsung dari petani terbaik, diproses dengan standar tinggi untuk menjamin kualitas premium.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto bg-coffee-600 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Beragam Pilihan</h3>
                        <p class="text-gray-600 dark:text-gray-300">Koleksi lengkap dari berbagai daerah dengan karakteristik rasa yang unik, dari yang ringan hingga yang kuat.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto bg-coffee-600 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Pelayanan Terbaik</h3>
                        <p class="text-gray-600 dark:text-gray-300">Pengiriman cepat dan aman ke seluruh Indonesia, serta dukungan pelanggan yang siap membantu 24/7.</p>
                    </div>
                </div>
            </section>
        </section>
    </div>

    <x-footer></x-footer>
</x-app-layout>