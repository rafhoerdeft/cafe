<?php

namespace App\Http\Livewire\Landing\Menu\Detail;

use Livewire\Component;

class Picture extends Component
{
    public $photo;

    public function render()
    {
        return view('landing.menu.detail.picture');
    }
}
