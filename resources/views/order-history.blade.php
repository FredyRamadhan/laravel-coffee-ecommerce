<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($orders->count() > 0)
                <div class="space-y-6">
                    @foreach($orders as $orderNumber => $orderItems)
                        @php
                            $firstOrder = $orderItems->first();
                            $totalItems = $orderItems->sum('count');
                            $totalAmount = $orderItems->sum('subtotal') + $firstOrder->shipping;
                        @endphp
                        
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <!-- Order Header -->
                            <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $orderNumber }}</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $firstOrder->created_at->format('d M Y, H:i') }} • {{ $totalItems }} item(s)
                                        </p>
                                    </div>
                                    <div class="mt-2 sm:mt-0 flex items-center space-x-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            {{ ucfirst($firstOrder->status) }}
                                        </span>
                                        <span class="text-lg font-bold text-gray-900 dark:text-white">
                                            Rp {{ number_format($totalAmount, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Items -->
                            <div class="p-6">
                                <div class="space-y-4">
                                    @foreach($orderItems as $order)
                                        <div class="flex items-center space-x-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                            <img class="w-16 h-16 object-cover rounded-lg" 
                                                 src="/images/{{ $order->product->slug }}.jpg" 
                                                 alt="{{ $order->product->name }}">
                                            <div class="flex-1">
                                                <h4 class="font-medium text-gray-900 dark:text-white">{{ $order->product->name }}</h4>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $order->count }} x Rp {{ number_format($order->product->price, 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-semibold text-gray-900 dark:text-white">
                                                    Rp {{ number_format($order->subtotal, 0, ',', '.') }}
                                                </p>
                                                @if($order->canBeRated())
                                                    <button onclick="openRatingModal('{{ $order->id }}', '{{ $order->product->name }}')" 
                                                            class="mt-2 text-sm text-coffee-600 dark:text-coffee-400 hover:text-coffee-700 dark:hover:text-coffee-300 font-medium">
                                                        Beri Rating
                                                    </button>
                                                @elseif($order->hasRating())
                                                    @php $rating = $order->getRating(); @endphp
                                                    <div class="mt-2">
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                                            ⭐ {{ $rating->rating }}/5
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Order Actions -->
                                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('invoice', $orderNumber) }}" 
                                       class="flex-1 bg-gray-100 dark:bg-gray-600 text-gray-800 dark:text-gray-200 font-medium py-2 px-4 rounded-lg text-center hover:bg-gray-200 dark:hover:bg-gray-500 transition-colors">
                                        Lihat Invoice
                                    </a>
                                    <button class="flex-1 bg-coffee-600 hover:bg-coffee-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                                        Pesan Lagi
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <svg class="mx-auto h-24 w-24 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">Belum Ada Pesanan</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Anda belum memiliki riwayat pesanan.</p>
                    <div class="mt-6">
                        <a href="{{ route('products') }}" 
                           class="inline-flex items-center px-6 py-3 bg-coffee-600 hover:bg-coffee-700 text-white font-medium rounded-lg transition-colors">
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

    <!-- Rating Modal -->
    <div id="ratingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Beri Rating Produk</h3>
            <p id="productName" class="text-gray-600 dark:text-gray-300 mb-4"></p>
            
            <form id="ratingForm" method="POST">
                @csrf
                <input type="hidden" id="orderHistoryId" name="order_history_id">
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Rating</label>
                    <div class="flex items-center space-x-2">
                        @for($i = 1; $i <= 5; $i++)
                            <button type="button" onclick="setRating({{ $i }})"
                                    class="rating-btn px-3 py-2 text-lg border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-yellow-100 dark:hover:bg-yellow-900 hover:border-yellow-400 transition-colors"
                                    data-rating="{{ $i }}">
                                {{ $i }}⭐
                            </button>
                        @endfor
                    </div>
                    <input type="hidden" id="ratingValue" name="rating" required>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Klik angka untuk memberikan rating</p>
                </div>
                
                <div class="flex gap-3">
                    <button type="button" onclick="closeRatingModal()" 
                            class="flex-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-200 font-medium py-2 px-4 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-500 transition-colors">
                        Batal
                    </button>
                    <button type="submit" 
                            class="flex-1 bg-coffee-600 hover:bg-coffee-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                        Kirim Rating
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentRating = 0;

        function openRatingModal(orderHistoryId, productName) {
            document.getElementById('orderHistoryId').value = orderHistoryId;
            document.getElementById('productName').textContent = productName;
            document.getElementById('ratingForm').action = `/order-history/${orderHistoryId}/rate`;
            document.getElementById('ratingModal').classList.remove('hidden');
            document.getElementById('ratingModal').classList.add('flex');
            currentRating = 0;
            updateStars();
        }

        function closeRatingModal() {
            document.getElementById('ratingModal').classList.add('hidden');
            document.getElementById('ratingModal').classList.remove('flex');
        }

        function setRating(rating) {
            currentRating = rating;
            document.getElementById('ratingValue').value = rating;
            updateStars();
        }

        function updateStars() {
            const buttons = document.querySelectorAll('.rating-btn');
            buttons.forEach((button, index) => {
                const rating = parseInt(button.dataset.rating);
                if (rating <= currentRating) {
                    button.classList.remove('border-gray-300', 'dark:border-gray-600');
                    button.classList.add('bg-yellow-100', 'dark:bg-yellow-900', 'border-yellow-400', 'text-yellow-800', 'dark:text-yellow-200');
                } else {
                    button.classList.remove('bg-yellow-100', 'dark:bg-yellow-900', 'border-yellow-400', 'text-yellow-800', 'dark:text-yellow-200');
                    button.classList.add('border-gray-300', 'dark:border-gray-600');
                }
            });
        }

        document.getElementById('ratingForm').addEventListener('submit', function(e) {
            if (currentRating === 0) {
                e.preventDefault();
                alert('Silakan pilih rating terlebih dahulu');
            }
        });
    </script>
</x-app-layout>
