<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Keranjang Belanja</h1>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $cartItems->count() }} item</span>
                    </div>

                    @if($cartItems->count() > 0)
                        <div class="space-y-4">
                            @foreach($cartItems as $item)
                                <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0">
                                        <img class="w-16 h-16 object-cover rounded-lg"
                                             src="/images/{{ $item->product->slug }}.jpg"
                                             alt="{{ $item->product->name }}">
                                    </div>

                                    <!-- Product Info -->
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white truncate">
                                            {{ $item->product->name }}
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Rp {{ number_format($item->product->price, 0, ',', '.') }} / unit
                                        </p>
                                    </div>

                                    <!-- Quantity Controls -->
                                    <div class="flex items-center space-x-2">
                                        <button class="cart-decrease-btn flex items-center justify-center w-8 h-8 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 transition-colors"
                                                data-item-id="{{ $item->id }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                            </svg>
                                        </button>
                                        <span class="cart-quantity w-12 text-center font-medium text-gray-900 dark:text-white"
                                              data-item-id="{{ $item->id }}">{{ $item->count }}</span>
                                        <button class="cart-increase-btn flex items-center justify-center w-8 h-8 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 transition-colors"
                                                data-item-id="{{ $item->id }}"
                                                data-max-stock="{{ $item->product->stock }}">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Subtotal -->
                                    <div class="text-right">
                                        <p class="cart-subtotal text-lg font-semibold text-gray-900 dark:text-white"
                                           data-item-id="{{ $item->id }}">
                                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                        </p>
                                    </div>

                                    <!-- Remove Button -->
                                    <button class="cart-remove-btn text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition-colors"
                                            data-item-id="{{ $item->id }}">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <!-- Address Section -->
                        @if($needsAddress)
                            <div class="mt-8 p-4 bg-yellow-50 dark:bg-yellow-900 border border-yellow-200 dark:border-yellow-700 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Alamat pengiriman belum diatur</p>
                                        <p class="text-sm text-yellow-700 dark:text-yellow-300">Silakan atur alamat untuk mendapatkan ongkos kirim yang akurat</p>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{ route('address.index') }}"
                                       class="inline-flex items-center px-3 py-2 bg-yellow-600 hover:bg-yellow-700 text-white text-sm font-medium rounded-lg transition-colors">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Atur Alamat
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="mt-8 p-4 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <div>
                                            <p class="text-sm font-medium text-green-800 dark:text-green-200">Kirim ke: {{ auth()->user()->address->city }}</p>
                                            <p class="text-xs text-green-700 dark:text-green-300">{{ Str::limit(auth()->user()->address->address, 50) }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('address.index') }}"
                                       class="text-sm text-green-600 dark:text-green-400 hover:text-green-700 dark:hover:text-green-300 font-medium">
                                        Ubah
                                    </a>
                                </div>
                            </div>
                        @endif

                        <!-- Cart Summary -->
                        <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                            <div class="space-y-2 mb-6">
                                <div class="flex justify-between text-gray-600 dark:text-gray-300">
                                    <span>Subtotal:</span>
                                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600 dark:text-gray-300">
                                    <span>Ongkos Kirim:</span>
                                    <span id="shipping-cost">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-lg font-semibold text-gray-900 dark:text-white border-t border-gray-200 dark:border-gray-700 pt-2">
                                    <span>Total:</span>
                                    <span id="cart-total">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('products') }}"
                                   class="flex-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-3 px-6 rounded-lg text-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                                    Lanjut Belanja
                                </a>
                                <a href="{{ route('checkout') }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg text-center transition-colors">
                                    Checkout
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- Empty Cart -->
                        <div class="text-center py-12">
                            <svg class="mx-auto h-24 w-24 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 11-4 0v-6m4 0V9a2 2 0 10-4 0v4.01"/>
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Keranjang Kosong</h3>
                            <p class="mt-2 text-gray-500 dark:text-gray-400">Belum ada produk yang ditambahkan ke keranjang.</p>
                            <div class="mt-6">
                                <a href="{{ route('products') }}"
                                   class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Mulai Belanja
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>