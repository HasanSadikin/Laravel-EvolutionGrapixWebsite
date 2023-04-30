<div>
  <div class="py-3 py-md-5">
    <div class="container">
      <h4>My Wishlist</h4>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="shopping-cart">

            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
              <div class="row">
                <div class="col-md-6">
                  <h4>Products</h4>
                </div>
                <div class="col-md-3">
                  <h4>Price</h4>
                </div>
                <div class="col-md-3">
                  <h4>Action</h4>
                </div>
              </div>
            </div>
            @forelse ($wishlist as $item)
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
                  <div class="col-md-3 my-auto">
                    <label class="price">Rp. {{ $item->product->selling_price }} </label>
                  </div>
                  <div class="col-md-3 col-5 my-auto flex gap-2">
                    <div class="remove">
                      <button type="button" wire:loading.attribute="disabled"
                        wire:click="addToCartItem({{ $item->id }})" href="" class="btn btn-success btn-sm">
                        <span wire:loading.remove wire:target="addToCartItem({{ $item->id }})">
                          <i class="fa fa-shopping-cart"></i> Add To Cart
                        </span>
                        <span wire:loading wire:target="addToCartItem({{ $item->id }})">
                          <i class="fa fa-shopping-cart"></i> Adding...
                        </span>
                    </div>
                    <div class="remove">
                      <button type="button" wire:loading.attribute="disabled"
                        wire:click="removeWishlistItem({{ $item->id }})" href="" class="btn btn-danger btn-sm">
                        <span wire:loading.remove wire:target="removeWishlistItem({{ $item->id }})">
                          <i class="fa fa-trash"></i> Remove
                        </span>
                        <span wire:loading wire:target="removeWishlistItem({{ $item->id }})">
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
    </div>
  </div>
</div>
