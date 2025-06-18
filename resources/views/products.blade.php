<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Katalog
        </h2>
    </x-slot>
    <x-slot:title>Katalog</x-slot:title>
    <div class="w-full max-w-[1200px] mx-auto mt-6 px-6 py-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($products as $product)
            <x-product-card>
                <x-slot:name>{{ $product->name }}</x-slot:name>
                <x-slot:description>{{ Str::limit($product->description, 50) }}</x-slot:description>
                @if ($product->stock>=1)
                <x-slot:stock>{{ $product->stock }}</x-slot:stock>
                @endif
                <x-slot:price>Rp {{ number_format($product->price, 0, ',', '.') }}</x-slot:price>
            </x-product-card>    
            @endforeach
            
        </div>
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    </div>
    <x-footer></x-footer>
</x-app-layout>
