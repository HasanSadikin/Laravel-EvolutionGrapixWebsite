<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }

    public function removeWishlistItem(int $wishlist_id)
    {
        $wish = Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlist_id)->delete();
        $this->emit('wishlistAddedUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Wishlist Item Removed Successfully',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function addToCartItem(int $wishlisht_id)
    {
        if(Auth::check())
        {
            $wish = Wishlist::findOrFail($wishlisht_id);

            if(Cart::where('user_id', auth()->user()->id)->where('product_id', $wish->product->id)->exists())
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Already Added',
                    'type' => 'warning',
                    'status' => 409
                ]);
            }
            else
            {
                if(Product::where('id', $wish->product->id)->where('status', '0')->exists())
                {
                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $wish->product->id,
                        'quantity' => 1,
                    ]);

                    $wish->delete();

                    $this->emit('CartAddedUpdated');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product Added To Cart',
                        'type' => 'success',
                        'status' => 200
                    ]);
                }
                else
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product does not exist',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            }
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Add To Cart',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
}
