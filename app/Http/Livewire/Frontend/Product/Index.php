<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $products, $category, $priceInput;
    public $brandInputs = [];
    public string $availability = ''; 

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '']
    ];

    public function mount( $category)
    {
        $this->category = $category;
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
        $this->products = Product::where('category_id', $this->category->id)
        ->when($this->priceInput, function($q){
            $q->when($this->priceInput == 'high-to-low', function($q2){
                $q2->orderBy('selling_price', 'DESC');
            })->when($this->priceInput == 'low-to-high', function($q2){
                $q2->orderBy('selling_price', 'ASC');
            });
        })
        ->when($this->availability, function($q){
            $q->when($this->availability == 'in-stock', function($q2){
                $q2->where('quantity', '>', '0');
            })->when($this->availability == 'out-of-stock', function($q2){
                $q2->where('quantity', '=', '0');
            });
        })
        ->where('status','0')
        ->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
