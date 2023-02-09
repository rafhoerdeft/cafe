<?php

namespace App\Http\Livewire\Landing\Menu\Detail;

use App\Models\Menu;
use Livewire\Component;

class Related extends Component
{
    public $category_id, $menu_id;

    public function render()
    {
        $menus = Menu::with(['menu_categories:id,name'])
            ->whereHas('menu_categories', function ($query) {
                $query->where('id', decode($this->category_id));
            })
            ->select(['menus.*'])
            ->selectRaw('COALESCE(SUM(order_details.amount),0) as total_order') // Return the first non-null value in a list
            ->leftJoin('menu_options', 'menus.id', '=', 'menu_options.menu_id')
            ->leftJoin('order_details', function ($join) {
                $join->on('menu_options.id', '=', 'order_details.menu_option_id');
                $join->where('order_details.status', '=', 3);  // status finish order
            })
            ->whereNotIn('menus.id', [decode($this->menu_id)])
            ->groupBy('menus.id')
            ->orderBy('total_order', 'DESC')
            ->limit(4)
            ->get();

        return view('landing.menu.detail.related', compact('menus'));
    }
}
