<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Katalog
        </h2>
    </x-slot>
    <x-slot:title>Katalog</x-slot:title>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Katalog Kopi</h1>
                <p class="text-lg text-gray-600 dark:text-gray-300">Temukan kopi pilihan terbaik dari seluruh Nusantara</p>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($products as $product)
                <x-product-card>
                    <x-slot:slug>{{ $product->slug }}</x-slot:slug>
                    <x-slot:name>{{ $product->name }}</x-slot:name>
                    <x-slot:description>{{ Str::limit($product->description, 80) }}</x-slot:description>
                    @if ($product->stock >= 1)
                    <x-slot:stock>{{ $product->stock }}</x-slot:stock>
                    @endif
                    <x-slot:price>Rp {{ number_format($product->price, 0, ',', '.') }}</x-slot:price>
                    <x-slot:averageRating>{{ $product->average_rating }}</x-slot:averageRating>
                    <x-slot:ratingCount>{{ $product->rating_count }}</x-slot:ratingCount>
                </x-product-card>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
            <div class="mt-12 flex justify-center">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4">
                    {{ $products->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
    <x-footer></x-footer>
</x-app-layout>
