<div>
  <div class="relative mx-auto max-w-screen-xl px-4 py-8">
    <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2">
      <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
        <img alt="Les Paul" src="{{ asset($service->image) }}" alt=""
          class="aspect-square w-full rounded-xl object-cover" />

        {{-- @if ($product->productImages->count() > 1)
            <div class="grid grid-cols-2 gap-4 lg:mt-4">
              @for ($i = 1; $i < $product->productImages->count(); $i++)
                <img alt="Les Paul" src="{{ asset($product->productImages[$i]->image) }}"
                  class="aspect-square w-full rounded-xl object-cover" />
              @endfor
            </div>
          @endif --}}
      </div>

      <div class="sticky top-0">
        {{-- <strong
            class="rounded-full border border-blue-600 bg-gray-100 px-3 py-0.5 text-xs font-medium tracking-wide text-blue-600">
            Pre Order
          </strong> --}}

        <div class="mt-8 flex justify-between">
          <div class="max-w-[35ch] space-y-2">
            <h1 class="text-xl font-bold sm:text-2xl">
              {{ $service->name }}
            </h1>
          </div>
          <p class="text-lg font-bold">
            Rp. {{ $service->cost_per_meter }} <span class="">Per Meter</span>
          </p>
        </div>

        <div class="mt-4">
          <div class="prose max-w-none">
            <p>
              {!! nl2br(e($service->description)) !!}
            </p>
          </div>
        </div>
        <div class="flex gap-2 w-full pt-5">
          <a href="{{url('/services/'.$service->slug.'/request')}}"
            class="flex-1 text-decoration-none text-center block rounded border-1 border-blue-600 text-blue-600 px-5 py-3 text-xs font-medium hover:border-white hover:bg-yellow-500 hover:border-0 hover:text-black">
            Make Order
          </a>
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
