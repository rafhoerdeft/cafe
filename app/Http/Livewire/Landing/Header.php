<?php

namespace App\Http\Livewire\Landing;

use App\Models\MenuCategory;
use Livewire\Component;

class Header extends Component
{
    public $show_logo;
    public $active_nav;
    public $menu_category;

    public function mount()
    {
        $this->menu_category = MenuCategory::where('active', 1)->get();
    }

    public function render()
    {
        return view('landing.layouts.header');
    }
}
