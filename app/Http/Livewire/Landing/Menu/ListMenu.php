<?php

namespace App\Http\Livewire\Landing\Menu;

use App\Models\Menu;
use Livewire\Component;

class ListMenu extends Component
{
    public $category_name, $sorting_menu = 1;

    protected $listeners = ['changeSorting'];

    public function changeSorting($id)
    {
        $this->sorting_menu = $id;
        $this->dispatchBrowserEvent('menuChanged');
    }

    public function render()
    {
        $menu = Menu::whereHas('menu_categories', function ($query) {
            $query->where('name', $this->category_name);
            $query->where('active', 1);
        });
        $menu->with('menu_categories:id,name');
        $menu->select(['menus.*']);
        if ($this->sorting_menu == 1) {
            $menu->selectRaw('COALESCE(SUM(order_details.amount),0) as total_order'); // Return the first non-null value in a list
            $menu->leftJoin('menu_options', 'menus.id', '=', 'menu_options.menu_id');
            $menu->leftJoin('order_details', function ($join) {
                $join->on('menu_options.id', '=', 'order_details.menu_option_id');
                $join->where('order_details.status', '=', 3); // status finish order
            });
            $menu->groupBy('menus.id');
            $menu->latest('total_order');
        } elseif ($this->sorting_menu == 2) {
            $menu->withSum('menu_ratings as rating', 'value');
            $menu->latest('rating');
        } elseif ($this->sorting_menu == 3) {
            $menu->latest('menus.id');
        }
        $menus = $menu->get();
        return view('landing.menu.list-menu', compact('menus'));
    }
}
