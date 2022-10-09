<?php

namespace App\Http\Livewire\Landing\Home;

use Livewire\Component;

class Carousel extends Component
{
    public $readyToLoad = false;

    public function loading()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        return view('landing.home.carousel');
    }
}
