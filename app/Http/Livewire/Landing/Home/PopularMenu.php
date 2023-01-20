<?php

namespace App\Http\Livewire\Landing\Home;

use App\Models\Menu;
use Livewire\Component;

class PopularMenu extends Component
{
    public function render()
    {
        $menus = Menu::with(['menu_categories:id,name'])
            ->whereHas('menu_categories', function ($query) {
                $query->where('active', 1);
            })
            ->select(['menus.*'])
            ->withSum('menu_ratings as rating', 'value')
            ->latest('rating')
            ->limit(8)
            ->get();

        return view('landing.home.popular-menu', compact('menus'));
    }
}
