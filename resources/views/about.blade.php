<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="relative bg-gradient-to-br from-coffee-50 to-coffee-100 dark:from-gray-900 dark:to-gray-800 overflow-hidden">
        <div class="absolute inset-0 bg-coffee-600 opacity-10 dark:opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                    Tentang <span class="text-coffee-600 dark:text-coffee-400">SpillDaBeans</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-8 max-w-4xl mx-auto">
                    Perjalanan kami dimulai dari kecintaan mendalam terhadap kopi Indonesia. Kami berdedikasi untuk menyediakan biji kopi berkualitas terbaik dari seluruh nusantara langsung ke depan pintu Anda.
                </p>
            </div>
        </div>
    </div>

    <div class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">

            <section>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">Cerita Kami</h2>
                        <div class="space-y-4 text-gray-600 dark:text-gray-300">
                            <p>
                                SpillDaBeans lahir dari passion mendalam terhadap kopi Indonesia yang kaya akan cita rasa dan tradisi. Kami percaya bahwa setiap cangkir kopi memiliki cerita - dari petani yang merawat tanaman dengan penuh kasih, hingga proses pengolahan yang mempertahankan karakter unik setiap biji.
                            </p>
                            <p>
                                Dengan bekerja sama langsung dengan para petani lokal, kami memastikan tidak hanya kualitas terbaik, tetapi juga praktik jual beli yang adil dan berkelanjutan. Setiap pembelian Anda berkontribusi langsung kepada kesejahteraan komunitas petani kopi di seluruh Indonesia.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Nilai-Nilai Kami</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Prinsip yang memandu setiap langkah perjalanan kami</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto bg-coffee-100 dark:bg-coffee-900 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-10 h-10 text-coffee-600 dark:text-coffee-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Kualitas Premium</h3>
                        <p class="text-gray-600 dark:text-gray-300">Setiap biji kopi dipilih dan diproses dengan standar tertinggi untuk memastikan cita rasa yang konsisten dan memuaskan.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto bg-coffee-100 dark:bg-coffee-900 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-10 h-10 text-coffee-600 dark:text-coffee-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Jual Beli yang Adil</h3>
                        <p class="text-gray-600 dark:text-gray-300">Kami berkomitmen untuk memberikan harga yang adil kepada petani dan mendukung keberlanjutan komunitas lokal.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-20 h-20 mx-auto bg-coffee-100 dark:bg-coffee-900 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-10 h-10 text-coffee-600 dark:text-coffee-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Berkelanjutan</h3>
                        <p class="text-gray-600 dark:text-gray-300">Praktik ramah lingkungan dalam setiap aspek bisnis kami untuk menjaga kelestarian alam Indonesia.</p>
                    </div>
                </div>
            </section>

            <section class="bg-gray-50 dark:bg-gray-800 rounded-3xl p-12">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Frequently Asked Questions</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Jawaban untuk pertanyaan yang sering diajukan</p>
                </div>
                <div class="max-w-4xl mx-auto space-y-6">
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white mb-3">Apa yang membuat kopi SpillDaBeans spesial?</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Kami bekerja sama langsung dengan para petani untuk memastikan kualitas terbaik dan praktik jual beli yang adil. Setiap biji kopi dipilih dan dipanggang dengan cermat untuk menonjolkan cita rasa uniknya. Proses dari kebun hingga cangkir diawasi ketat untuk menjamin kesegaran dan kualitas premium.
                        </p>
                    </div>
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white mb-3">Bagaimana cara memesan?</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Anda dapat menjelajahi <a href="/products" class="text-coffee-600 dark:text-coffee-400 hover:underline font-medium">katalog</a> kami, menambahkan produk ke keranjang, dan melanjutkan ke proses checkout. Kami menerima berbagai metode pembayaran dan menyediakan pengiriman ke seluruh Indonesia.
                        </p>
                    </div>
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white mb-3">Berapa lama pengiriman?</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Pengiriman biasanya memakan waktu 2-5 hari kerja tergantung lokasi Anda. Untuk area Jabodetabek, kami menyediakan layanan same-day delivery untuk pesanan yang masuk sebelum pukul 12 siang.
                        </p>
                    </div>
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow-sm">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-white mb-3">Apakah ada garansi kesegaran?</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Ya! Kami menjamin kesegaran kopi dengan roasting date yang tertera pada setiap kemasan. Jika Anda tidak puas dengan kualitas produk, kami menyediakan kebijakan pengembalian 100% dalam 7 hari.
                        </p>
                    </div>
                </div>
            </section>

            <section class="text-center">
                <div class="bg-gradient-to-r from-coffee-600 to-coffee-700 rounded-3xl p-12 text-white">
                    <h2 class="text-4xl font-bold mb-4">Siap Merasakan Kopi Terbaik?</h2>
                    <p class="text-xl mb-8 opacity-90">Jelajahi koleksi kopi premium kami dan temukan favorit baru Anda</p>
                    <a href="/products" class="inline-flex items-center px-8 py-4 bg-white text-coffee-600 font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Lihat Katalog
                    </a>
                </div>
            </section>

        </div>
    </div>

    <x-footer></x-footer>
</x-app-layout>