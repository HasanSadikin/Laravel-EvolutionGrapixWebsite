{{-- <div>
  <div class="py-3 py-md-5 bg-light">
    <div class="container">
      @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
      @endif
      <div class="row">
        <div class="col-md-5 mt-3">
          <div class="bg-white border" wire:ignore>
            @if ($product->productImages)
              <div class="exzoom" id="exzoom">
                <div class="exzoom_img_box">
                  <ul class='exzoom_img_ul'>
                    @foreach ($product->productImages as $itemImage)
                      <li><img src="{{ asset($itemImage->image) }}" /></li>
                    @endforeach
                    ...
                  </ul>
                </div>
                <div class="exzoom_nav"></div>
                <p class="exzoom_btn">
                  <a href="javascript:void(0);" class="exzoom_prev_btn">
                    < </a>
                      <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                </p>
              </div>
            @endif
          </div>
        </div>
        <div class="col-md-7 mt-3">
          <div class="product-view">
            <h4 class="product-name">
              {{ $product->name }}
              @if ($product->quantity > 0)
                <label class="label-stock bg-success">In Stock</label>
              @else
                <label class="label-stock bg-danger">Out of Stock</label>
              @endif
            </h4>
            <hr>
            <p class="product-path">
              Home / {{ $product->category->name }} / {{ $product->name }} </p>
            <div>
              <span class="selling-price">Rp. {{ $product->selling_price }}</span>
              <span class="original-price" {{ $product->selling_price <= $product->original_price ? 'hidden' : '' }}>Rp.
                {{ $product->original_price }}</span>
            </div>
            <div class="mt-2">
              <div class="input-group">
                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                <input type="text" readonly wire:model="quantityCount" value="{{ $this->quantityCount }}"
                  class="input-quantity" />
                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
              </div>
            </div>
            <div class="mt-2">
              <button href="" type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1"
                {{ $product->quantity <= 0 ? 'disabled' : '' }}> <i class="fa fa-shopping-cart"></i>
                {{ $product->quantity <= 0 ? 'Out of Stock' : 'Add To Cart' }}
              </button>
              <button type="button" wire:click="addToWishlist({{ $product->id }})" href=""
                {{ $product->quantity <= 0 ? 'disabled' : '' }} class="btn btn1">
                <span wire:loading.remove wire:target="addToWishlist">
                  <i class="fa fa-heart"></i> {{ $product->quantity <= 0 ? 'Out Of Stock' : 'Add To Wishlist' }}
                </span>
                <span wire:loading wire:target="addToWishlist">Adding...</span>
              </button>
            </div>
            <div class="mt-3">
              <h5 class="mb-0">Small Description</h5>
              <p>
                {!! $product->small_description !!}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <div class="card">
            <div class="card-header bg-white">
              <h4>Description</h4>
            </div>
            <div class="card-body">
              <p>
                {!! $product->description !!}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div>
  <div class="relative mx-auto max-w-screen-xl px-4 py-8">
    <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2">
      <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
        <img alt="Les Paul" src="{{ asset($product->productImages[0]->image) }}" alt=""
          class="aspect-square w-full rounded-xl object-cover" />

        @if ($product->productImages->count() > 1)
          <div class="grid grid-cols-2 gap-4 lg:mt-4">
            @for ($i = 1; $i < $product->productImages->count(); $i++)
              <img alt="Les Paul" src="{{ asset($product->productImages[$i]->image) }}"
                class="aspect-square w-full rounded-xl object-cover" />
            @endfor
          </div>
        @endif
      </div>

      <div class="sticky top-0">
        {{-- <strong
          class="rounded-full border border-blue-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-blue-600">
          Pre Order
        </strong> --}}

        <div class="mt-8 flex justify-between">
          <div class="max-w-[35ch] space-y-2">
            <h1 class="text-xl font-bold sm:text-2xl">
              {{ $product->name }}
            </h1>

            <p class="text-sm">Highest Rated Product</p>

            {{-- <div class="-ms-0.5 flex">
              <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>

              <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>

              <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>

              <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>

              <svg class="h-5 w-5 text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
            </div> --}}
          </div>

          <p class="text-lg font-bold">
            Rp. {{ $product->selling_price }}
            @if ($product->selling_price < $product->original_price)
              <span class="ml-5 line-through text-gray-400">Rp. {{ $product->original_price }}</span>
            @endif
          </p>
        </div>

        <div class="mt-4">
          <div class="prose max-w-none">
            <p>
              {!! nl2br(e($product->description)) !!}
            </p>
          </div>

          {{-- <button class="mt-2 text-sm font-medium underline">Read More</button> --}}
        </div>

        {{-- <fieldset>
            <legend class="mb-1 text-sm font-medium">Color</legend>

            <div class="flex flex-wrap gap-1">
              <label for="color_tt" class="cursor-pointer">
                <input type="radio" name="color" id="color_tt" class="peer sr-only" />

                <span
                  class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                  Texas Tea
                </span>
              </label>

              <label for="color_fr" class="cursor-pointer">
                <input type="radio" name="color" id="color_fr" class="peer sr-only" />

                <span
                  class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                  Fiesta Red
                </span>
              </label>

              <label for="color_cb" class="cursor-pointer">
                <input type="radio" name="color" id="color_cb" class="peer sr-only" />

                <span
                  class="group inline-block rounded-full border px-3 py-1 text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                  Cobalt Blue
                </span>
              </label>
            </div>
          </fieldset> --}}

        {{-- <fieldset class="mt-4">
            <legend class="mb-1 text-sm font-medium">Size</legend>

            <div class="flex flex-wrap gap-1">
              <label for="size_xs" class="cursor-pointer">
                <input type="radio" name="size" id="size_xs" class="peer sr-only" />

                <span
                  class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                  XS
                </span>
              </label>

              <label for="size_s" class="cursor-pointer">
                <input type="radio" name="size" id="size_s" class="peer sr-only" />

                <span
                  class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                  S
                </span>
              </label>

              <label for="size_m" class="cursor-pointer">
                <input type="radio" name="size" id="size_m" class="peer sr-only" />

                <span
                  class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                  M
                </span>
              </label>

              <label for="size_l" class="cursor-pointer">
                <input type="radio" name="size" id="size_l" class="peer sr-only" />

                <span
                  class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                  L
                </span>
              </label>

              <label for="size_xl" class="cursor-pointer">
                <input type="radio" name="size" id="size_xl" class="peer sr-only" />

                <span
                  class="group inline-flex h-8 w-8 items-center justify-center rounded-full border text-xs font-medium peer-checked:bg-black peer-checked:text-white">
                  XL
                </span>
              </label>
            </div>
          </fieldset> --}}

        {{-- <div class="mt-8 flex gap-4">
            <div>
              <label for="quantity" class="sr-only">Qty</label>

              <input type="number" id="quantity" min="1" value="1"
                class="w-12 rounded border-gray-200 py-3 text-center text-xs [-moz-appearance:_textfield] [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
            </div>

            <button type="submit"
              class="block rounded bg-green-600 px-5 py-3 text-xs font-medium text-white hover:bg-green-500">
              Add to Cart
            </button>
          </div> --}}


          <div class="mt-5">
            <label for="Quantity" class="sr-only"> Quantity </label>

            <div class="flex md:w-32 items-center border border-gray-200 rounded justify-center w-full">
              <button wire:click="decrementQuantity" type="button"
                class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75">
                &minus;
              </button>

              <input readonly type="number" id="Quantity" value="{{$quantityCount}}"
                class="h-10 w-16 border-transparent text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none" />

              <button wire:click="incrementQuantity" type="button"
                class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75">
                &plus;
              </button>
            </div>
          </div>
          <div class="flex gap-2 w-full mt-2">
            <button wire:click="addToCart({{ $product->id }})"
              class="flex-1 block rounded border-1 border-blue-600 text-blue-600 px-5 py-3 text-xs font-medium hover:border-white hover:bg-yellow-500 hover:border-0 hover:text-black">
              Add to Cart
            </button>
            <button wire:click="addToWishlist({{ $product->id }})"
              class="flex-1 block rounded border-1 border-blue-600 text-blue-600 px-5 py-3 text-xs font-medium hover:border-white hover:bg-red-500 hover:border-0 hover:text-white">
              Add to Wishlist
            </button>
          </div>
      </div>
    </div>
  </div>
</div>

{{-- @push('scripts')
  <script>
    $(function() {

      $("#exzoom").exzoom({

        // thumbnail nav options
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,

        // autoplay
        "autoPlay": false,

        // autoplay interval in milliseconds
        "autoPlayTimeout": 2000

      });

    });
  </script>
@endpush --}}
