<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class WishlishCount extends Component
{
    public $wishlistCount;

    protected $listeners = ['wishlistAddedUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if(Auth::check())
        {
            return $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        }
        else
        {
            return $this->wishlistCount = 0; 
        }
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.frontend.wishlish-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}