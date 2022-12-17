<?php

namespace App\Http\Livewire\Landing\Home;

use App\Models\Menu;
use Livewire\Component;

class PopularMenu extends Component
{
    public function render()
    {
        $menus = Menu::with(['menu_categories:id,name'])
            ->select(['menus.*'])
            ->withSum('menu_ratings as rating', 'value')
            ->latest('rating')
            ->limit(8)
            ->get();

        return view('landing.home.popular-menu', ['menus' => $menus]);
    }
}
