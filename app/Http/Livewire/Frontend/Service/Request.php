<?php

namespace App\Http\Livewire\Frontend\Service;

use Livewire\Component;

class Request extends Component
{
    public $service, $meter = 1;

    public function mount($service)
    {
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.frontend.service.request', [
            'meter' => $this->meter
        ]);
    }

    public function incrementMeter()
    {
        $this->meter++;
    }

    public function decrementMeter()
    {
        $this->meter--;
    }
}
