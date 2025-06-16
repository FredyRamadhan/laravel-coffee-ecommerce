<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex-grow dark:text-white">
        <!-- Hero Section -->
        <section class=" py-12">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl font-bold dark:text-white text-gray-900 mb-4">Tentang SpillDB</h1>
                <p class="text-lg text-gray-600 dark:text-white max-w-2xl mx-auto">
                    SpillDB (dari "SpillDBeans") adalah gairah kami terhadap kopi. Kami berdedikasi untuk menyediakan biji kopi berkualitas terbaik dari seluruh nusantara langsung ke depan pintu Anda.
                </p>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-12">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center  mb-8">Frequently Asked Questions (FAQ)</h2>
                <div class="max-w-2xl mx-auto space-y-4">
                    <div class=" p-6 rounded-lg shadow-md">
                        <h3 class="font-semibold text-lg ">Apa yang membuat kopi SpillDB spesial?</h3>
                        <p class="mt-2">
                            Kami bekerja sama langsung dengan para petani untuk memastikan kualitas terbaik dan praktik perdagangan yang adil. Setiap biji kopi dipilih dan dipanggang dengan cermat untuk menonjolkan cita rasa uniknya.
                        </p>
                    </div>
                    <div class=" p-6 rounded-lg shadow-md">
                        <h3 class="font-semibold text-lg">Bagaimana cara memesan?</h3>
                        <p class=" mt-2">
                            Anda dapat menjelajahi <a href="katalog.html" class="text-blue-500 hover:underline">katalog</a> kami, menambahkan produk ke keranjang, dan melanjutkan ke proses checkout.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contacts Section -->
        <section class=" py-12">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-4">Hubungi Kami</h2>
                <a href="contacts.html" class="bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                    Halaman Kontak
                </a>
            </div>
        </section>
    </div>
    <x-footer></x-footer>
</x-app-layout>