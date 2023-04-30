<div class="container">
    <div class="py-5">
        <h2>Search</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="space-y-2">
                <p class="block text-xs font-medium text-gray-700">Filters</p>
                <details
                    class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                    <summary
                        class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition">
                        <span class="text-sm font-medium"> Availability </span>

                        <span class="transition group-open:-rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </summary>

                    <div class="border-t border-gray-200 bg-white">
                        <ul class="space-y-1 border-t border-gray-200 p-4">
                            <li>
                                <label for="FilterInStock" class="inline-flex items-center gap-2">
                                    <input type="checkbox" id="FilterInStock" class="h-5 w-5 rounded border-gray-300" />

                                    <span class="text-sm font-medium text-gray-700">
                                        In Stock ({{$inStock}})
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label for="FilterOutOfStock" class="inline-flex items-center gap-2">
                                    <input type="checkbox" id="FilterOutOfStock"
                                        class="h-5 w-5 rounded border-gray-300" />

                                    <span class="text-sm font-medium text-gray-700">
                                        Out of Stock ({{$outOfStock}})
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </details>

                <details
                    class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                    <summary
                        class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition">
                        <span class="text-sm font-medium"> Price </span>

                        <span class="transition group-open:-rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </summary>

                    <div class="border-t border-gray-200 bg-white">
                        <div class="border-t border-gray-200 p-4">
                            <div class="gap-4">
                                <label for="FilterPriceFrom" class="flex items-center gap-2">
                                    
                                    <input type="radio" name="priceSort" id="FilterPriceFrom" value="low-to-high" wire:model="priceInput"
                                    class="" />
                                    <span class="text-sm text-gray-600">Low To High</span>
                                </label>

                                <label for="FilterPriceTo" class="flex items-center gap-2">
                                    
                                    <input type="radio" name="priceSort" id="FilterPriceTo" value="high-to-low" wire:model="priceInput"
                                    class="" />
                                    <span class="text-sm text-gray-600">High To low</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </details>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-4">
                        <div
                            class="group relative block overflow-hidden text-decoration-none text-dark drop-shadow-lg py-2">
                            <a href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">
                                <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}"
                                    class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" />
                            </a>
                            <div class="relative bg-white p-6">
                                <span
                                    class="whitespace-nowrap px-3 py-1.5 text-xs font-medium {{ $product->quantity > 0 ? 'bg-yellow-400' : 'bg-red-500 text-white' }}">
                                    {{ $product->quantity > 0 ? 'Available' : 'Out Of Stock' }}
                                </span>
                                <a href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}"
                                    class="text-decoration-none">
                                    <h3 class="mt-4 text-lg font-medium text-gray-900 truncate">{{ $product->name }}
                                    </h3>
                                </a>
                                <p class="mt-1.5 text-sm text-gray-700">Rp. {{ $product->selling_price }}
                                    @if ($product->selling_price < $product->original_price)
                                        <span class="ml-5 line-through text-gray-400">Rp.
                                            {{ $product->original_price }}</span>
                                    @endif
                                </p>

                                <form class="mt-4">
                                    <button
                                        class="block w-full rounded bg-yellow-400 p-4 text-sm font-medium transition hover:scale-105">
                                        Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>No Products Available</h5>
                    </div>
                @endforelse
            </div>
            <div class="flex justify-center">
                {{-- {{ $products->links() }} --}}
            </div>
        </div>
    </div>
</div>
