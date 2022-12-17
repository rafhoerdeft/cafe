<?php

namespace App\Http\Livewire\Landing;

use Illuminate\Http\Request;
use Livewire\Component;

class Header extends Component
{
    public $show_logo;

    public function render()
    {
        return view('landing.layouts.header');
    }
}
