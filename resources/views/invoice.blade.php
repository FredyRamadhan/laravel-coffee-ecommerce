<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Invoice - {{ $orderNumber }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            <div class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-xl p-6 mb-8">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-green-800 dark:text-green-200">Pesanan Berhasil!</h3>
                        <p class="text-green-700 dark:text-green-300">Terima kasih atas pesanan Anda. Berikut adalah detail invoice Anda.</p>
                    </div>
                </div>
            </div>

            <!-- Invoice -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                <!-- Invoice Header -->
                <div class="bg-coffee-600 text-white p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-2xl font-bold">INVOICE</h1>
                            <p class="text-coffee-100 mt-1">SpillDaBeans</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-semibold">{{ $orderNumber }}</p>
                            <p class="text-coffee-100">{{ $orders->first()->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Invoice Body -->
                <div class="p-6">
                    <!-- Customer Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-3">Informasi Pelanggan</h3>
                            <div class="text-gray-600 dark:text-gray-300 space-y-1">
                                <p><strong>Nama:</strong> {{ $orders->first()->user->name }}</p>
                                <p><strong>Email:</strong> {{ $orders->first()->user->email }}</p>
                                <p><strong>Telepon:</strong> {{ $orders->first()->customer_phone }}</p>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-3">Alamat Pengiriman</h3>
                            <div class="text-gray-600 dark:text-gray-300">
                                <p>{{ $orders->first()->customer_address }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-8">
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Detail Pesanan</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th class="text-left py-3 text-gray-900 dark:text-white font-medium">Produk</th>
                                        <th class="text-center py-3 text-gray-900 dark:text-white font-medium">Qty</th>
                                        <th class="text-right py-3 text-gray-900 dark:text-white font-medium">Harga</th>
                                        <th class="text-right py-3 text-gray-900 dark:text-white font-medium">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr class="border-b border-gray-100 dark:border-gray-700">
                                        <td class="py-4">
                                            <div class="flex items-center space-x-3">
                                                <img class="w-12 h-12 object-cover rounded-lg" 
                                                     src="/images/{{ $order->product->slug }}.jpg" 
                                                     alt="{{ $order->product->name }}">
                                                <div>
                                                    <p class="font-medium text-gray-900 dark:text-white">{{ $order->product->name }}</p>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $order->product->slug }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 text-center text-gray-900 dark:text-white">{{ $order->count }}</td>
                                        <td class="py-4 text-right text-gray-900 dark:text-white">
                                            Rp {{ number_format($order->product->price, 0, ',', '.') }}
                                        </td>
                                        <td class="py-4 text-right text-gray-900 dark:text-white">
                                            Rp {{ number_format($order->subtotal, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                        <div class="flex justify-end">
                            <div class="w-full max-w-sm space-y-2">
                                <div class="flex justify-between text-gray-600 dark:text-gray-300">
                                    <span>Subtotal:</span>
                                    <span>Rp {{ number_format($orders->sum('subtotal'), 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600 dark:text-gray-300">
                                    <span>Ongkos Kirim:</span>
                                    <span>Rp {{ number_format($orders->first()->shipping, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-lg font-semibold text-gray-900 dark:text-white border-t border-gray-200 dark:border-gray-700 pt-2">
                                    <span>Total:</span>
                                    <span>Rp {{ number_format($orders->sum('subtotal') + $orders->first()->shipping, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Info -->
                    <div class="mt-8 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Informasi Pembayaran</h4>
                        <p class="text-gray-600 dark:text-gray-300">
                            <strong>Metode:</strong> Cash on Delivery (COD)<br>
                            <strong>Status:</strong> <span class="text-green-600 dark:text-green-400">Menunggu Pembayaran</span>
                        </p>
                    </div>
                </div>

                <!-- Invoice Footer -->
                <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            Terima kasih telah berbelanja di SpillDaBeans!
                        </p>
                        <div class="flex gap-3">
                            <button onclick="window.print()" 
                                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                </svg>
                                Print
                            </button>
                            <a href="{{ route('order.history') }}" 
                               class="bg-coffee-600 hover:bg-coffee-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                Lihat Riwayat Pesanan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
