<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Checkout
        </h2>
    </x-slot>
    <x-slot:title>Checkout</x-slot:title>
    
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Error Messages -->
            @if($errors->any())
                <div class="mb-6 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-xl p-4">
                    <div class="flex items-center mb-2">
                        <svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h4 class="text-red-800 dark:text-red-200 font-medium">Terjadi kesalahan:</h4>
                    </div>
                    <ul class="list-disc list-inside text-red-700 dark:text-red-300 text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('checkout.process') }}" method="POST" class="space-y-8">
                @csrf
                
                <!-- Order Summary -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Ringkasan Pesanan</h3>
                    
                    <div class="space-y-4">
                        @foreach($cartItems as $item)
                            <div class="flex items-center space-x-4 py-3 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                                <img class="w-16 h-16 object-cover rounded-lg" 
                                     src="/images/{{ $item->product->slug }}.jpg" 
                                     alt="{{ $item->product->name }}">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-900 dark:text-white">{{ $item->product->name }}</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $item->count }} x Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900 dark:text-white">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="mt-6 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Subtotal:</span>
                            <span class="text-gray-900 dark:text-white">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600 dark:text-gray-400">Ongkos Kirim:</span>
                            <span class="text-gray-900 dark:text-white">Rp {{ number_format($shipping, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-lg font-semibold border-t border-gray-200 dark:border-gray-700 pt-2">
                            <span class="text-gray-900 dark:text-white">Total:</span>
                            <span class="text-gray-900 dark:text-white">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Pengiriman</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="customer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nama Lengkap
                            </label>
                            <input type="text" id="customer_name" name="customer_name" 
                                   value="{{ auth()->user()->name }}" readonly
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white">
                        </div>
                        
                        <div>
                            <label for="customer_phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nomor Telepon *
                            </label>
                            <input type="tel" id="customer_phone" name="customer_phone" required
                                   value="{{ old('customer_phone') }}"
                                   class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-coffee-500 focus:border-transparent"
                                   placeholder="08xxxxxxxxxx">
                            @error('customer_phone')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="customer_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Alamat Lengkap *
                        </label>
                        <textarea id="customer_address" name="customer_address" rows="3" required
                                  class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-coffee-500 focus:border-transparent"
                                  placeholder="Masukkan alamat lengkap termasuk kode pos">{{ old('customer_address', auth()->user()->address?->address) }}</textarea>
                        @error('customer_address')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Metode Pembayaran</h3>
                    
                    <div class="space-y-3">
                        <label class="flex items-center p-3 border border-gray-200 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700">
                            <input type="radio" name="payment_method" value="cod" checked
                                   class="text-coffee-600 focus:ring-coffee-500">
                            <div class="ml-3">
                                <div class="font-medium text-gray-900 dark:text-white">Cash on Delivery (COD)</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Bayar saat barang diterima</div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-3 border border-gray-200 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 opacity-50">
                            <input type="radio" name="payment_method" value="transfer" disabled
                                   class="text-coffee-600 focus:ring-coffee-500">
                            <div class="ml-3">
                                <div class="font-medium text-gray-900 dark:text-white">Transfer Bank</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">Segera hadir</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('cart') }}" 
                       class="flex-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-3 px-6 rounded-lg text-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                        Kembali ke Keranjang
                    </a>
                    <button type="submit" 
                            class="flex-1 bg-coffee-600 hover:bg-coffee-700 text-white font-medium py-3 px-6 rounded-lg transition-colors">
                        Proses Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
