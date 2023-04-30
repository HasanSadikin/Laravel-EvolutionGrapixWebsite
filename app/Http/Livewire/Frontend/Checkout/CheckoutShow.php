<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use App\Models\ServiceCart;
use App\Models\ServiceOrderItem;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $serviceCarts, $totalProductAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = null, $payment_id = null;

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:13|min:10',
            'pincode' => 'required|string|max:5|min:5',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'no'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone'=> $this->phone,
            'pincode'=> $this->pincode,
            'address'=> $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        foreach($this->carts as $item)
        {
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->selling_price
            ]);

            $item->product()->where('id', $item->product_id)->decrement('quantity', $item->quantity);
        }
        
        foreach($this->serviceCarts as $item)
        {
            $serviceItem = ServiceOrderItem::create([
                'order_id' => $order->id,
                'service_id' => $item->service_id,
                'meter' => $item->meter,
                'cost_per_meter' => $item->service->cost_per_meter,
                'reference_image' => $item->reference_image
            ]);
        }

        return $order; 
    }

    public function codOrder()
    {
        $this->payment_mode = 'Pay On The Spot';

        $codOrder = $this->placeOrder();

        if($codOrder)
        {
            Cart::where('user_id', auth()->user()->id)->delete();
            ServiceCart::where('user_id', auth()->user()->id)->delete();

            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('thank-you');
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        $this->serviceCarts = ServiceCart::where('user_id', auth()->user()->id)->get();
        
        foreach($this->carts as $item)
        {
            $this->totalProductAmount += $item->product->selling_price * $item->quantity;
        }

        foreach($this->serviceCarts as $item)
        {
            $this->totalProductAmount += $item->service->cost_per_meter * $item->meter;
        }

        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $userDetails = auth()->user()->userDetails;
        if($userDetails)
        {
            $this->phone = $userDetails->phone;
            $this->pincode = $userDetails->pin_code;
            $this->address = $userDetails->address;
        }
        
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show');
    }
}
