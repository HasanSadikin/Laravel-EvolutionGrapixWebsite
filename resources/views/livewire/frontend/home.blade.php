<div class="">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    {{-- <img src="{{ asset('uploads/sliders/' . $slider->image) }}" class="d-block w-100" alt="..."> --}}
                    <img src="{{ asset('uploads/sliders/' . $slider->image) }}" alt=""
                        class="object-cover w-full h-60 md:h-96 transition duration-500 aspect-square group-hover:opacity-90 carousel-image" />
                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>{!! $slider->title !!}</h1>
                            <p>{!! $slider->description !!}</p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class=" py-10 md:py-24 bg-yellow-400">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h3 class="mb-4">Welcome to {{ $appSettings->website_name }}</h3>
                    <div class="underline"></div>
                    <h6>
                        Kami adalah perusahaan percetakan yang menawarkan berbagai jenis layanan cetak berkualitas
                        tinggi, seperti
                        brosur, kartu nama, stiker, katalog, dan banyak lagi. Kami percaya bahwa desain grafis yang
                        menarik dan
                        kualitas cetakan yang baik dapat membantu Anda menarik perhatian pelanggan dan mempromosikan
                        bisnis Anda
                        dengan lebih efektif
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
            <header class="text-center">
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                    Trending
                </h2>
            </header>
            <div class="mt-5">
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product">
                            @foreach ($trendingProducts as $product)
                                <div
                                    class="group relative block overflow-hidden text-decoration-none text-dark drop-shadow-lg py-2">
                                    {{-- <livewire:frontend.button.wishlist-heart-button :product="$product" /> --}}
                                    <a
                                        href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" />
                                    </a>
                                    <div class="relative bg-white p-6">
                                        <span
                                            class="whitespace-nowrap bg-red-500 rounded-sm text-white px-3 py-1.5 text-xs font-medium">
                                            Trending
                                        </span>
                                        <a href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}"
                                            class="text-decoration-none">
                                            <h3 class="mt-4 text-lg font-medium text-gray-900 truncate">
                                                {{ $product->name }}</h3>
                                        </a>

                                        <p class="mt-1.5 text-sm text-gray-700">Rp. {{ $product->selling_price }}
                                            @if ($product->selling_price < $product->original_price)
                                                <span class="ml-5 line-through text-gray-400">Rp.
                                                    {{ $product->original_price }}</span>
                                            @endif
                                        </p>
                                        <button wire:click="addToCart({{ $product->id }})"
                                            class="block w-full rounded bg-yellow-400 p-4 text-sm font-medium transition hover:scale-105">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h5>No Products Available</h5>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="bg-yellow-400">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
            <header class="text-center">
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                    New Arrival
                </h2>
            </header>
            <div class="mt-5">
                @if ($newArrivalProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product">
                            @foreach ($newArrivalProducts as $product)
                                <div
                                    class="group relative block overflow-hidden text-decoration-none text-dark drop-shadow-lg py-2">
                                    {{-- <livewire:frontend.button.wishlist-heart-button :product="$product" /> --}}
                                    <a
                                        href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}"
                                            alt="{{ $product->name }}"
                                            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" />
                                    </a>
                                    <div class="relative bg-white p-6">
                                        <span class="whitespace-nowrap bg-yellow-400 px-3 py-1.5 text-xs font-medium">
                                            New
                                        </span>
                                        <a href="{{ url('collections/' . $product->category->slug . '/' . $product->slug) }}"
                                            class="text-decoration-none">
                                            <h3 class="mt-4 text-lg font-medium text-gray-900 truncate">
                                                {{ $product->name }}</h3>
                                        </a>
                                        <p class="mt-1.5 text-sm text-gray-700">Rp. {{ $product->selling_price }}
                                            @if ($product->selling_price < $product->original_price)
                                                <span class="ml-5 line-through text-gray-400">Rp.
                                                    {{ $product->original_price }}</span>
                                            @endif
                                        </p>
                                        <button wire:click="addToCart({{ $product->id }})"
                                            class="block w-full rounded bg-yellow-400 p-4 text-sm font-medium transition hover:scale-105">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h5>No Products Available</h5>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section>
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
            <header class="text-center">
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                    Our Services
                </h2>

                <p class="max-w-md mx-auto mt-4 text-gray-500">
                    Our services are designed to meet your unique needs with personalized attention and care.
                </p>
            </header>


            <ul class="grid grid-cols-1 gap-4 mt-8 lg:grid-cols-2">

                @foreach ($services as $service)
                    <li>
                        <a href="{{ url('services/' . $service->slug) }}" class="relative block group">
                            <img src="{{ asset($service->image) }}" alt=""
                                class="object-cover w-full transition duration-500 aspect-square group-hover:opacity-90" />

                            <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
                                <span
                                    class="w-full mt-1.5 inline-block bg-black px-5 py-3 text-center text-xs font-medium uppercase tracking-wide text-white">
                                    {{ $service->name }}
                                </span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
</div>
