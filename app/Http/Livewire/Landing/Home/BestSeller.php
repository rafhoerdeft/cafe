<?php

namespace App\Http\Livewire\Landing\Home;

use App\Models\Menu;
use Livewire\Component;

class BestSeller extends Component
{
    public $readyToLoad = true; //false

    public function loading()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $menus = Menu::with(['menu_categories:id,name'])
            ->whereHas('menu_categories', function ($query) {
                $query->where('active', 1);
            })
            ->select(['menus.*'])
            ->selectRaw('COALESCE(SUM(order_details.amount),0) as total_order') // Return the first non-null value in a list
            ->leftJoin('menu_options', 'menus.id', '=', 'menu_options.menu_id')
            ->leftJoin('order_details', function ($join) {
                $join->on('menu_options.id', '=', 'order_details.menu_option_id');
                $join->where('order_details.status', '=', 3);  // status finish order
            })
            ->groupBy('menus.id')
            ->orderBy('total_order', 'DESC')
            ->limit(8)
            ->get();

        return view('landing.home.best-seller', ['menus' => $this->readyToLoad ? $menus : []]);
    }
}
