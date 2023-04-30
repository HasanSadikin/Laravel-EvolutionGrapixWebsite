<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CartShow extends Component
{
    public $cart, $totalPrice = 0, $serviceCart;
    
    public function mount($cart)
    {
        $this->cart = $cart;
        $this->serviceCart = ServiceCart::where('user_id', Auth::user()->id)->get(); 
    }

    public function decrementServiceQuantity(int $item_id)
    {
        $cartData = ServiceCart::where('id', $item_id)->where('user_id', auth()->user()->id)->first();

        if($cartData)
        {
            $cartData->decrement('meter');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Service Meter Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function incrementServiceQuantity(int $item_id)
    {
        $cartData = ServiceCart::where('user_id', auth()->user()->id)->where('id', $item_id)->first();
        
        if($cartData)
        {
            $cartData->increment('meter');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Service Meter Updated',
                    'type' => 'success',
                    'status' => 200,
                ]);
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function decrementQuantity(int $item_id)
    {
        $cartData = Cart::where('id', $item_id)->where('user_id', auth()->user()->id)->first();

        if($cartData)
        {
            if($cartData->quantity > 1){

                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            }else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity cannot be less than 1',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function incrementQuantity(int $item_id)
    {
        $cartData = Cart::where('user_id', auth()->user()->id)->where('id', $item_id)->first();
        if($cartData)
        {
            if($cartData->product->quantity > $cartData->quantity)
            {
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200,
                ]);
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Only '.$cartData->product->quantity.' Quantity Available',
                    'type' => 'success',
                    'status' => 200,
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        if($cartRemoveData)
        {
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart Item Removed Successfully',
                'type' => 'success',
                'status' => 200,
            ]);
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 500,
            ]);
        }
    }

    public function removeServiceCartItem(int $cartId)
    {
        $cartRemoveData = ServiceCart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();
        
        if($cartRemoveData)
        {        
            $imagePath = $cartRemoveData->reference_image;
    
            if(File::exists($imagePath))
            {
                File::delete($imagePath);
            }
        
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Service Cart Item Removed Successfully',
                'type' => 'success',
                'status' => 200,
            ]);
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 500,
            ]);
        }
        
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        $this->serviceCart = ServiceCart::where('user_id', Auth::user()->id)->get(); 

        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart,
            'serviceCart' => $this->serviceCart,
        ]);
    }
}
