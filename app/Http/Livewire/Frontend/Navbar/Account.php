<?php

namespace App\Http\Livewire\Frontend\Navbar;

use Livewire\Component;

class Account extends Component
{
    public $toggle = false;

    public function toggleMenu()
    {
        $this->toggle = !$this->toggle; 
    }

    public function render()
    {
        return view('livewire.frontend.navbar.account', [
            'toggle' => $this->toggle
        ]);
    }
}
