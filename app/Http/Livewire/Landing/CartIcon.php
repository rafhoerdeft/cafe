<?php

namespace App\Http\Livewire\Landing;

use App\Models\Menu;
use App\Models\MenuOption;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CartIcon extends Component
{
    protected $listeners = ['setListCart'];
    public $cookie_cart_name = 'list-cart';
    public $menu_id = [];

    public function setListCart($menu_option_id, int $amount, bool $add)
    {
        $cookie_name = $this->cookie_cart_name;
        $list_cart = [];

        if (!Cookie::has($cookie_name)) {
            $menu_option = MenuOption::with(['menus'])->find($menu_option_id);

            $list_cart[] = [
                'id' => encode($menu_option->id),
                'name' => $menu_option->menus->name,
                'price' => ($menu_option->extra_price + $menu_option->menus->price),
                'amount' => $amount,
                'option_name' => $menu_option->name
            ];

            Cookie::queue(cookie()->forever($cookie_name, json_encode($list_cart))); // Set cookie config
        } else {
            $cookies = json_decode(request()->cookie($cookie_name), true);
            // if ($add) {
            //     if (!in_array($menu_id, $cookies)) {
            //         $cookies[] = $menu_id;
            //     }
            // } else {
            //     if (($key = array_search($menu_id, $cookies)) !== false) { // Search menu_id from array cookies
            //         unset($cookies[$key]); // Is available remove from array
            //     }
            // }

            Cookie::queue(cookie()->forever($cookie_name, json_encode($cookies))); // Set cookie config
        }
    }

    public function render()
    {
        if ($this->menu_id != null) {
            $menu = Menu::with(['menu_categories:id,name'])->whereIn('id', $this->menu_id);
        } else {
            $menu = null;
        }

        return view('landing.layouts.cart-icon', compact('menu'));
    }
}
