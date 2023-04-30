<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $product, $category, $quantityCount = 1;

    public function mount($product, $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.frontend.product.view');
    }

    public function addToCart(int $product_id)
    {
        if(Auth::check())
        {
            if(Cart::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists())
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Already Added',
                    'type' => 'warning',
                    'status' => 409
                ]);
            }
            else
            {
                if($this->product->where('id', $product_id)->where('status', '0')->exists())
                {
                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $product_id,
                        'quantity' => $this->quantityCount,
                    ]);

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

    public function addToWishlist($product_id)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists())
            {
                // session()->flash('message', 'Already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product_id
                ]);

                // session()->flash('message', 'Wishlist added successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist added successfully',
                    'type' => 'success',
                    'status' => 200
                ]);

                $this->emit('wishlistAddedUpdated');
            }
        }else
        {
            // session()->flash('message', 'Please Login To Continue');

            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Continue',
                'type' => 'info',
                'status' => 401
            ]);

            return false;
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount + 1 < 10)
        {
            $this->quantityCount++; 
        }
    }

    public function decrementQuantity()
    {
        if($this->quantityCount - 1 >= 1)
        {
            $this->quantityCount--;
        }
    }
}
