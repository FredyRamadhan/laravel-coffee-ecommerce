<a href="/products/{{ $slug }}"></a>
<div class="max-w-sm mx-auto bg-white dark:bg-onyx border border-timber dark:border-myrtle rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
  <div class="h-48 bg-timber dark:bg-myrtle flex items-center justify-center">
    <span class="text-myrtle dark:text-timber text-sm">Image Placeholder</span>
  </div>

  <div class="p-5">
    <h2 class="text-xl font-semibold text-onyx dark:text-white">{{ $name }}</h2>
    <p class="text-myrtle dark:text-timber text-sm mt-1">{{ $description }}</p>

    <div class="flex items-center justify-between mt-4 text-sm">
      @if ($stock)
        <span class="bg-myrtle text-white px-2 py-0.5 rounded-full text-xs">
          In Stock: {{ $stock }}
        </span>
      @else
        <span class="bg-red-500 text-white px-2 py-0.5 rounded-full text-xs">
          Out of stock
        </span>
      @endif
      <span class="font-semibold text-onyx dark:text-white">{{ $price }}</span>
    </div>

    <div class="mt-4 flex items-center">
      <div class="flex items-center space-x-1 text-gold">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
        <svg class="w-5 h-5 text-timber fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.955L10 0l2.95 5.955 6.562.955-4.756 4.635 1.122 6.545z"/></svg>
      </div>
      <span class="ml-2 text-myrtle dark:text-timber text-sm">(4.0)</span>
    </div>
  </div>
</div>