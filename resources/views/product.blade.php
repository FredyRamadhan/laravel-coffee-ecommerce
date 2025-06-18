<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $product->name }}</x-slot:title>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Kolom Kiri: Info Produk -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Gambar Produk -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden border border-gray-200 dark:border-gray-700 p-6">
                        <div class="aspect-square max-w-lg mx-auto bg-gray-50 dark:bg-gray-700 rounded-lg overflow-hidden">
                            <img class="w-full h-full object-cover" src="/images/{{ $product->slug }}.jpg" alt="Gambar {{ $product->name }}">
                        </div>
                    </div>

                    <!-- Detail Produk -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden border border-gray-200 dark:border-gray-700 p-6">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $product->name }}</h1>

                        <div class="flex items-center space-x-3 mb-6">
                            @if($product->rating_count > 0)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                    ⭐ {{ number_format($product->average_rating, 1) }}/5
                                </span>
                                <span class="text-gray-600 dark:text-gray-400">({{ $product->rating_count }} ulasan)</span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
                                    Belum ada ulasan
                                </span>
                            @endif
                        </div>

                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3">Deskripsi Produk</h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6">
                                {{ $product->description }}
                            </p>

                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Harga</h3>
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                    <span class="text-base font-normal text-gray-500 dark:text-gray-400">/ 1 kg</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Opsi Pembelian -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 sticky top-24">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">Atur Pembelian</h2>

                        <form id="add-to-cart-form" action="{{ route('addToCart', $product->slug) }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Quantity Control -->
                            <div>
                                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kuantitas</label>
                                <div class="flex items-center">
                                    <button type="button" id="decrease-qty" class="flex items-center justify-center w-10 h-10 border border-gray-300 dark:border-gray-600 rounded-l-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                        </svg>
                                    </button>
                                    <input type="number" id="quantity" name="count" value="1" min="1" max="{{ $product->stock }}"
                                           data-price="{{ $product->price }}"
                                           class="w-16 h-10 text-center border-t border-b border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <button type="button" id="increase-qty" class="flex items-center justify-center w-10 h-10 border border-gray-300 dark:border-gray-600 rounded-r-lg bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Stock Info -->
                            <div class="flex justify-between items-center py-3 px-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <span class="text-sm text-gray-600 dark:text-gray-300">Stok Tersedia:</span>
                                <span class="text-sm font-semibold {{ $product->stock > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                    {{ $product->stock }} unit
                                </span>
                            </div>

                            <!-- Total Price -->
                            <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-sm text-gray-600 dark:text-gray-300">Total Harga:</span>
                                    <span id="total-price" class="text-lg font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                @if($product->stock > 0)
                                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 11-4 0v-6m4 0V9a2 2 0 10-4 0v4.01"/>
                                        </svg>
                                        Tambah ke Keranjang
                                    </button>
                                    <button type="button" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                        Beli Sekarang
                                    </button>
                                @else
                                    <button disabled class="w-full bg-gray-400 text-white font-medium py-3 px-6 rounded-lg cursor-not-allowed">
                                        Stok Habis
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>