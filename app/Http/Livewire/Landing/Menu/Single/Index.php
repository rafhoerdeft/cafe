<?php

namespace App\Http\Livewire\Landing\Menu\Single;

use App\Models\Menu;
use Livewire\Component;

class Index extends Component
{
    public $menu_id, $category_name, $label;

    public function addToCart()
    {
        $this->emit('setListCart', $this->menu_id, 1, true);
    }

    public function render()
    {
        $menu = Menu::with(['menu_categories:id,name'])->find(decode($this->menu_id));
        return view('landing.menu.single.index', compact('menu'));
    }
}
