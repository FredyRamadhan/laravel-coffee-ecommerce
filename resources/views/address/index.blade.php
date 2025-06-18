<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-xl p-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-green-800 dark:text-green-200">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-xl p-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-red-800 dark:text-red-200">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Address Form -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $address ? 'Edit Alamat' : 'Tambah Alamat' }}
                    </h3>
                    @if($address)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                            Alamat Tersimpan
                        </span>
                    @endif
                </div>

                <form action="{{ route('address.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Alamat Lengkap *
                        </label>
                        <textarea id="address" name="address" rows="3" required
                                  class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-coffee-500 focus:border-transparent"
                                  placeholder="Masukkan alamat lengkap termasuk kode pos">{{ old('address', $address?->address) }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Kota *
                        </label>
                        <select id="city" name="city" required onchange="updateShippingPreview()"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:ring-2 focus:ring-coffee-500 focus:border-transparent">
                            <option value="">Pilih Kota</option>
                            @foreach($cities as $shippingCost)
                                <option value="{{ $shippingCost->kota }}" 
                                        data-cost="{{ $shippingCost->cost }}"
                                        {{ old('city', $address?->city) == $shippingCost->kota ? 'selected' : '' }}>
                                    {{ $shippingCost->kota }}
                                </option>
                            @endforeach
                        </select>
                        @error('city')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Shipping Cost Preview -->
                    <div id="shippingPreview" class="hidden p-4 bg-blue-50 dark:bg-blue-900 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-blue-800 dark:text-blue-200">Ongkos Kirim ke <span id="selectedCity"></span></p>
                                <p class="text-lg font-bold text-blue-900 dark:text-blue-100" id="shippingCost">Rp 0</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <a href="{{ route('cart') }}" 
                           class="flex-1 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-3 px-6 rounded-lg text-center hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                            Kembali
                        </a>
                        <button type="submit" 
                                class="flex-1 bg-coffee-600 hover:bg-coffee-700 text-white font-medium py-3 px-6 rounded-lg transition-colors">
                            {{ $address ? 'Update Alamat' : 'Simpan Alamat' }}
                        </button>
                    </div>
                </form>
            </div>

            @if($address)
                <!-- Current Address Display -->
                <div class="mt-6 bg-gray-50 dark:bg-gray-700 rounded-xl p-6">
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Alamat Saat Ini</h4>
                    <div class="text-gray-600 dark:text-gray-300 space-y-1">
                        <p><strong>Alamat:</strong> {{ $address->address }}</p>
                        <p><strong>Kota:</strong> {{ $address->city }}</p>
                        <p><strong>Ongkos Kirim:</strong> Rp {{ number_format($address->getShippingCost(), 0, ',', '.') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function updateShippingPreview() {
            const citySelect = document.getElementById('city');
            const selectedOption = citySelect.options[citySelect.selectedIndex];
            const shippingPreview = document.getElementById('shippingPreview');
            
            if (selectedOption.value) {
                const city = selectedOption.value;
                const cost = selectedOption.dataset.cost;
                
                document.getElementById('selectedCity').textContent = city;
                document.getElementById('shippingCost').textContent = 'Rp ' + parseInt(cost).toLocaleString('id-ID');
                shippingPreview.classList.remove('hidden');
            } else {
                shippingPreview.classList.add('hidden');
            }
        }

        // Initialize on page load if city is already selected
        document.addEventListener('DOMContentLoaded', function() {
            updateShippingPreview();
        });
    </script>
</x-app-layout>
