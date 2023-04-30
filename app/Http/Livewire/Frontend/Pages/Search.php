<?php

namespace App\Http\Livewire\Frontend\Pages;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $searchString = '';
    public string $priceInput = '';
    public string $availability = '';

    protected $queryString = [
        'priceInput' => ['except' => '', 'as' => 'price'],
        'availability' => ['except' => '']
    ];

    public function mount($search)
    {
       $this->searchString = $search;
    }

    public function render()
    {
        $inStock = Product::where('name', 'LIKE', '%'.$this->searchString.'%')->where('quantity', '>=', 1)->count();
        $outOfStock = Product::where('name', 'LIKE', '%'.$this->searchString.'%')->where('quantity', '=', 0)->count();

        $products = Product::where('name', 'LIKE', '%'.$this->searchString.'%')
        ->when($this->priceInput != '', function($q){
            $q->when($this->priceInput == 'high-to-low', function($q2){
                $q2->orderBy('selling_price', 'DESC');
            })->when($this->priceInput == 'low-to-high', function($q3){
                $q3->orderBy('selling_price', 'ASC');
            });
        })
        ->where('status','0')
        ->get();

        return view('livewire.frontend.pages.search', [
            'products' => $products,
            'outOfStock' => $outOfStock,
            'inStock' => $inStock,
        ]);
    }
}
