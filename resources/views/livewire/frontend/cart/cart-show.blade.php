<div>
  <div class="py-3 py-md-5">
    <div class="container">
      <h4>My Product Cart</h4>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="shopping-cart">

            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
              <div class="row">
                <div class="col-md-6">
                  <h4>Products</h4>
                </div>
                <div class="col-md-1">
                  <h4>Price</h4>
                </div>
                <div class="col-md-2">
                  <h4>Quantity</h4>
                </div>
                <div class="col-md-1">
                  <h4>Total</h4>
                </div>
                <div class="col-md-2">
                  <h4>Remove</h4>
                </div>
              </div>
            </div>
            @forelse ($cart as $item)
              <div class="cart-item">
                <div class="row">
                  <div class="col-md-6 my-auto">
                    <a href="{{ url('/collections/' . $item->product->category->slug . '/' . $item->product->slug) }}">
                      <label class="product-name">
                        @if ($item->product->productImages)
                          <img src="{{ asset($item->product->productImages[0]->image) }}"
                            style="width: 50px; height: 50px" alt=" {{ $item->product->name }}">
                        @else
                          <img src="" style="width: 50px; height: 50px" alt="">
                        @endif
                        {{ $item->product->name }}
                      </label>
                    </a>
                  </div>
                  <div class="col-md-1 my-auto">
                    <label class="price">Rp. {{ $item->product->selling_price }} </label>
                  </div>
                  <div class="col-md-2 col-7 my-auto">
                    <div class="quantity">
                      <div class="input-group">
                        <button type="button" class="btn btn1" wire:loading.attribute="disabled"
                          wire:click="decrementQuantity({{ $item->id }})"><i class="fa fa-minus"></i></button>
                        <input type="text" value="{{ $item->quantity }}" class="input-quantity" />
                        <button type="button" class="btn btn1" wire:loading.attribute="disabled"
                          wire:click="incrementQuantity({{ $item->id }})"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1 my-auto">
                    <label class="price">Rp. {{ $item->product->selling_price * $item->quantity }} </label>
                    @php
                      $totalPrice += $item->product->selling_price * $item->quantity;
                    @endphp
                  </div>
                  <div class="col-md-2 col-5 my-auto">
                    <div class="remove">
                      <button type="button" wire:loading.attribute="disabled"
                        wire:click="removeCartItem({{ $item->id }})" href="" class="btn btn-danger btn-sm">
                        <span wire:loading.remove wire:target="removeCartItem({{ $item->id }})">
                          <i class="fa fa-trash"></i> Remove
                        </span>
                        <span wire:loading wire:target="removeCartItem({{ $item->id }})">
                          <i class="fa fa-trash"></i> Removing...
                        </span>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <div class="py-5">
                <h4>No Cart Items Available</h4>
              </div>
            @endforelse
          </div>
        </div>
      </div>
      <h4 class="pt-5">My Service Cart</h4>
      <div class="row">
        <div class="col-md-12">
          <div class="shopping-cart">

            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
              <div class="row">
                <div class="col-md-3">
                  <h4>Service</h4>
                </div>
                <div class="col-md-3">
                  <h4>Reference</h4>
                </div>
                <div class="col-md-1">
                  <h4>Price</h4>
                </div>
                <div class="col-md-2">
                  <h4>Meter</h4>
                </div>
                <div class="col-md-1">
                  <h4>Total</h4>
                </div>
                <div class="col-md-2">
                  <h4>Remove</h4>
                </div>
              </div>
            </div>
            @forelse ($serviceCart as $item)
              <div class="cart-item">
                <div class="row">
                  <div class="col-md-3 my-auto">
                    <a href="{{ url('/services/' . $item->service->slug) }}">
                      <label class="product-name">
                        @if ($item->service->image)
                          <img src="{{ asset($item->service->image) }}" style="width: 50px; height: 50px"
                            alt=" {{ $item->service->name }}">
                        @else
                          <img src="" style="width: 50px; height: 50px" alt="">
                        @endif
                        {{ $item->service->name }}
                      </label>
                    </a>
                  </div>
                  <div class="col-md-3 my-auto">
                    <a href="{{ url('/services/' . $item->service->slug) }}">
                      @if ($item->service->image)
                          <img src="{{ asset($item->reference_image) }}" style="width: 50px; height: 50px"
                            alt=" {{ $item->service->name }}">
                        @else
                          <img src="" style="width: 50px; height: 50px" alt="">
                        @endif
                    </a>
                  </div>
                  <div class="col-md-1 my-auto">
                    <label class="price">Rp. {{ $item->service->cost_per_meter }} </label>
                  </div>
                  <div class="col-md-2 col-7 my-auto">
                    <div class="quantity">
                      <div class="input-group">
                        <button type="button" class="btn btn1" wire:loading.attribute="disabled"
                          wire:click="decrementServiceQuantity({{ $item->id }})"><i class="fa fa-minus"></i></button>
                        <input type="text" value="{{ $item->meter }}" class="input-quantity" />
                        <button type="button" class="btn btn1" wire:loading.attribute="disabled"
                          wire:click="incrementServiceQuantity({{ $item->id }})"><i class="fa fa-plus"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1 my-auto">
                    <label class="price">Rp. {{ $item->service->cost_per_meter * $item->meter }} </label>
                    @php
                      $totalPrice += $item->service->cost_per_meter * $item->meter;
                    @endphp
                  </div>
                  <div class="col-md-2 col-5 my-auto">
                    <div class="remove">
                      <button type="button" wire:loading.attribute="disabled"
                        wire:click="removeServiceCartItem({{ $item->id }})" href=""
                        class="btn btn-danger btn-sm">
                        <span wire:loading.remove wire:target="removeServiceCartItem({{ $item->id }})">
                          <i class="fa fa-trash"></i> Remove
                        </span>
                        <span wire:loading wire:target="removeServiceCartItem({{ $item->id }})">
                          <i class="fa fa-trash"></i> Removing...
                        </span>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <div class="py-5">
                <h4>No Service Items Available</h4>
              </div>
            @endforelse
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 my-md-auto mt-3">
          <h4>
            Get the best deals & offers <a href="{{ url('/collections') }}">Show Now</a>
          </h4>
        </div>
        <div class="col-md-4 mt-3">
          <div class="shadow-sm bg-white p-3">
            <h4>Total:
              <span class="float-end">Rp. {{ $totalPrice }}</span>
            </h4>
            <hr>
            <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
