<?php

namespace App\Http\Livewire\Landing\Menu\Single;

use Livewire\Component;

class Picture extends Component
{
    public $photo;

    public function render()
    {
        return view('landing.menu.single.picture');
    }
}
