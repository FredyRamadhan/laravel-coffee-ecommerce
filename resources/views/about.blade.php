<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-onyx dark:text-timber leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex-grow text-onyx dark:text-timber">
        <section class="py-12">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl font-bold mb-4">Tentang SpillDB</h1>
                <p class="text-lg text-myrtle dark:text-timber max-w-2xl mx-auto">
                    SpillDB (dari "SpillDBeans") adalah gairah kami terhadap kopi. Kami berdedikasi untuk menyediakan biji kopi berkualitas terbaik dari seluruh nusantara langsung ke depan pintu Anda.
                </p>
            </div>
        </section>

        <section class="py-12">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-8">Frequently Asked Questions (FAQ)</h2>
                <div class="max-w-2xl mx-auto space-y-4">
                    <div class="bg-white dark:bg-onyx p-6 rounded-lg shadow-sm">
                        <h3 class="font-semibold text-lg">Apa yang membuat kopi SpillDB spesial?</h3>
                        <p class="mt-2 text-myrtle dark:text-timber">
                            Kami bekerja sama langsung dengan para petani untuk memastikan kualitas terbaik dan praktik perdagangan yang adil. Setiap biji kopi dipilih dan dipanggang dengan cermat untuk menonjolkan cita rasa uniknya.
                        </p>
                    </div>
                    <div class="bg-white dark:bg-onyx p-6 rounded-lg shadow-sm">
                        <h3 class="font-semibold text-lg">Bagaimana cara memesan?</h3>
                        <p class="mt-2 text-myrtle dark:text-timber">
                            Anda dapat menjelajahi <a href="/products" class="text-gold hover:underline">katalog</a> kami, menambahkan produk ke keranjang, dan melanjutkan ke proses checkout.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-4">Lihat Katalog</h2>
                <x-main-button href="/products">Katalog</x-main-button>
            </div>
        </section>
    </div>
    <x-footer></x-footer>
</x-app-layout>