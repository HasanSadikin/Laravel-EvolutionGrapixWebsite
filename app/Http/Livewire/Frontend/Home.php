<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Cart;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Service;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $sliders, $trendingProducts, $newArrivalProducts, $services;
    
    public function mount()
    {
        $this->sliders = Slider::where('status', '0')->get();
        $this->trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        $this->newArrivalProducts = Product::latest()->take(16)->get();
        $this->services = Service::all();

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
                if(Product::where('id', $product_id)->where('status', '0')->exists())
                {
                    Cart::create([
                        'user_id' => auth()->user()->id,
                        'product_id' => $product_id,
                        'quantity' => 1,
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

    public function render()
    {
        return view('livewire.frontend.home', [
            'sliders' => $this->sliders,
            'trendingProducts' => $this->trendingProducts,
            'newArrivalProducts' => $this->newArrivalProducts,
            'services' => $this->services,
        ]);
    }
}
