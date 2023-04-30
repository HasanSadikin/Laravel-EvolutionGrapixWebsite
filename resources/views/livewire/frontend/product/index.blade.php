<section>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <header>
            <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                {{ $category->name }}s Products
            </h2>

            <p class="mt-4 max-w-md text-gray-500">
                Our products are carefully crafted with the highest quality materials and attention to detail
            </p>
        </header>

        <div class="mt-8 block lg:hidden">
            <button
                class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
                <span class="text-sm font-medium"> Filters & Sorting </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-4 w-4 rtl:rotate-180">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>

        <div class="mt-4 lg:mt-8 lg:grid lg:grid-cols-4 lg:items-start lg:gap-8">
            <div class="hidden space-y-4 lg:block">
                <div>
                    <p class="block text-xs font-medium text-gray-700">Filters</p>

                    <div class="mt-1 space-y-2">
                        <details
                            class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 transition">
                                <span class="text-sm font-medium"> Availability </span>

                                <span class="transition group-open:-rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </summary>

                            <div class="border-t border-gray-200 bg-white">
                                <header class="flex items-center justify-between p-4">
                                    <span class="text-sm text-gray-700"> {{ $products->count() }} Selected </span>
                                </header>

                                <ul class="space-y-1 border-t border-gray-200 p-4">
                                    <li>
                                        <label for="FilterInStock" class="inline-flex items-center gap-2">
                                            <input type="radio" name="availability" wire:model="availability"
                                                value="in-stock" id="FilterInStock"
                                                class="h-5 w-5 rounded border-gray-300" />

                                            <span class="text-sm font-medium text-gray-700">
                                                In Stock ({{ $products->where('quantity', '>', '0')->count() }})
                                            </span>
                                        </label>
                                    </li>

                                    <li>
                                        <label for="FilterOutOfStock" class="inline-flex items-center gap-2">
                                            <input type="radio" name="availability" wire:model="availability"
                                                value="out-of-stock" id="FilterOutOfStock"
                                                class="h-5 w-5 rounded border-gray-300" />

                                            <span class="text-sm font-medium text-gray-700">
                                                Out of Stock ({{ $products->where('quantity', '=', '0')->count() }})
                                            </span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </details>

                        <details
                            class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                            <summary
                                class="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 transition">
                                <span class="text-sm font-medium"> Price </span>

                                <span class="transition group-open:-rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </summary>

                            <div class="border-t border-gray-200 bg-white">
                                <div class="border-t border-gray-200 p-4">
                                    <div class="gap-4">
                                        <label for="FilterPriceFrom" class="flex items-center gap-2">

                                            <input type="radio" name="priceSort" id="FilterPriceFrom"
                                                value="low-to-high" wire:model="priceInput" class="" />
                                            <span class="text-sm text-gray-600">Low To High</span>
                                        </label>

                                        <label for="FilterPriceTo" class="flex items-center gap-2">

                                            <input type="radio" name="priceSort" id="FilterPriceTo"
                                                value="high-to-low" wire:model="priceInput" class="" />
                                            <span class="text-sm text-gray-600">High To low</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </details>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3">
                <ul class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse ($products as $product)
                        <li>
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
                                        <h3 class="mt-4 text-lg font-medium text-gray-900 truncate">
                                            {{ $product->name }}
                                        </h3>
                                    </a>
                                    <p class="mt-1.5 text-sm text-gray-700">Rp. {{ $product->selling_price }}
                                        @if ($product->selling_price < $product->original_price)
                                            <span class="ml-5 line-through text-gray-400">Rp.
                                                {{ $product->original_price }}</span>
                                        @endif
                                    </p>

                                    <button
                                        wire:click="addToCart({{ $product->id }})"
                                        class="block w-full rounded bg-yellow-400 p-4 text-sm font-medium transition hover:scale-105">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li>
                            <h4>No {{ $category->name }} Available</h4>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>
