<?php

namespace App\Http\Livewire\Landing\Home;

use App\Models\MenuCategory as ModelsMenuCategory;
use Livewire\Component;

class MenuCategory extends Component
{
    public $background;

    public function render()
    {
        $menu_categories = ModelsMenuCategory::with('menus')->get();
        return view('landing.home.menu-category', compact('menu_categories'));
    }
}
