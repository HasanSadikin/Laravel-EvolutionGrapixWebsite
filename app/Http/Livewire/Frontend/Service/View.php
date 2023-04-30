<?php

namespace App\Http\Livewire\Frontend\Service;

use Livewire\Component;

class View extends Component
{
    public $service;

    public function mount($service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.frontend.service.view');
    }
}
