<a href="/products/{{ $slug }}" class="block group">
  <div class="max-w-sm mx-auto h-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition-all duration-300 group-hover:scale-[1.02]">
      <div class="relative h-48 bg-gray-50 dark:bg-gray-700 overflow-hidden">
        <img src="/images/{{ $slug }}.jpg" alt="Gambar {{ $slug }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
      </div>

    <div class="p-6">
      <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">{{ $name }}</h2>
      <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-2">{{ $description }}</p>

      <div class="flex items-center justify-between mb-3">
        @if ($stock)
          <span class="bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 px-2 py-1 rounded-full text-xs font-medium">
            Stok: {{ $stock }}
          </span>
        @else
          <span class="bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 px-2 py-1 rounded-full text-xs font-medium">
            Habis
          </span>
        @endif
        <span class="text-lg font-bold text-gray-900 dark:text-white">{{ $price }}</span>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
              ⭐ {{ $averageRating }}/5
            </span>
            <span class="text-xs text-gray-500 dark:text-gray-400">({{ $ratingCount }} ulasan)</span>

        </div>
      </div>
    </div>
  </div>
</a>