<?php

namespace App\Http\Livewire\Frontend\Button;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistHeartButton extends Component
{
    public $product, $wishlisted = false;

    protected $listeners = ['toggleWishlistForProduct'];

    public function toggleWishlistForProduct(int $id, $boolValue)
    {
        if($this->product->id == $id)
        {
            $this->wishlisted = $boolValue;
        }
    }
    
    public function mount($product)
    {
        $this->product = $product;

        if(Auth::check())
        {
            $this->wishlisted = Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product->id)->exists();
        }
    }

    public function tryAddToWishlist($product_id)
    {
        if(Auth::check())
        {  
            $product = Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->first();
            if($product)
            {
                // $this->dispatchBrowserEvent('message', [
                //     'text' => 'Item Removed From Wishlist',
                //     'type' => 'success',
                //     'status' => 200
                // ]);
            
                $product->delete();
                $this->wishlisted = false;
                $this->emit('wishlistAddedUpdated');
                $this->emit('toggleWishlistForProduct', $product_id, false);
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product_id
                ]);

                // $this->dispatchBrowserEvent('message', [
                //     'text' => 'Wishlist added successfully',
                //     'type' => 'success',
                //     'status' => 200
                // ]);

                $this->emit('toggleWishlistForProduct', $product_id, true);
                $this->emit('wishlistAddedUpdated');
                $this->wishlisted = true;
            }
        }else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Continue',
                'type' => 'info',
                'status' => 401
            ]);

            return false;
        }
    }

    public function render()
    {
        return view('livewire.frontend.button.wishlist-heart-button', 
        [
            'product' => $this->product,
            'wishlisted' => $this->wishlisted,
        ]
    );
    }
}
