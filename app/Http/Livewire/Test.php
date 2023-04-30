<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Test extends Component
{
    public string $searchString = '';

    protected $queryString = [
        'searchString',
    ];

    public function render()
    {
        $products = Product::all();
        return view('livewire.test', [
            'products' => $products
        ]);
    }
}
