<?php

namespace App\Http\Livewire\Landing;

use App\Models\Menu;
use App\Models\MenuOption;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class CartIcon extends Component
{
    protected $listeners = ['setListCart', 'removeListCart'];
    private $cookie_cart_name = 'list-cart';
    public $list_cart = [];
    public $count_list_cart = 0;
    private $limit = 5;

    public function mount()
    {
        $cookie_name = $this->cookie_cart_name;
        if (Cookie::has($cookie_name)) {
            $cookies = json_decode(request()->cookie($cookie_name), true);
            $this->count_list_cart = count($cookies);
            $this->list_cart = array_slice($cookies, 0, $this->limit);
        }
    }

    public function setListCart($menu_option_id, int $amount, bool $add = true)
    {
        $cookie_name = $this->cookie_cart_name;

        $menu_option = MenuOption::with(['menus'])->find($menu_option_id);
        $data = [
            'id' => $menu_option->id,
            'name' => $menu_option->menus->name,
            'photo' => $menu_option->menus->photo,
            'price' => ($menu_option->extra_price + $menu_option->menus->price),
            'amount' => $amount,
            'option_name' => $menu_option->name
        ];

        if (!Cookie::has($cookie_name)) {
            $list_menu[] = $data;
        } else {
            $list_menu = json_decode(request()->cookie($cookie_name), true);
            $collect_menu = collect($list_menu); // change array list_menu to collection data

            if ($collect_menu->where('id', $menu_option_id)->all()) { // check if menu_option_id is available in cookies
                $key = $collect_menu->where('id', $menu_option_id)->keys()->first(); // get Key/Index from array list_menu
                if ($add) {
                    $list_menu[$key]['amount'] += $amount; // add amount
                } else {
                    $list_menu[$key]['amount'] = $amount; // update/replace amount
                }
            } else {
                $list_menu[] = $data;
            }
        }

        $this->count_list_cart = count($list_menu);
        $this->list_cart = array_slice($list_menu, 0, $this->limit);
        Cookie::queue(cookie()->forever($cookie_name, json_encode($list_menu))); // Set cookie config
    }

    public function removeListCart($key)
    {
        $cookie_name = $this->cookie_cart_name;
        $list_menu = json_decode(request()->cookie($cookie_name), true);
        unset($list_menu[$key]); // Is available remove from array
        $this->count_list_cart = count($list_menu);
        $this->list_cart = array_slice($list_menu, 0, $this->limit);
        Cookie::queue(cookie()->forever($cookie_name, json_encode($list_menu))); // Set cookie config
    }

    public function render()
    {
        return view('landing.layouts.cart-icon');
    }
}
