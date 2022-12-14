<?php

namespace App\Http\Livewire\Landing\Home;

use App\Models\Carousel as ModelsCarousel;
use Livewire\Component;

class Carousel extends Component
{
    public $readyToLoad = true; //false
    public $show_popular_menu;
    public $show_blog;

    public function loading()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        return view('landing.home.carousel', ['carousel' => $this->readyToLoad ? ModelsCarousel::latest()->get() : []]);
    }
}
