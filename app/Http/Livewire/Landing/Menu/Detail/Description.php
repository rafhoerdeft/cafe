<?php

namespace App\Http\Livewire\Landing\Menu\Detail;

use App\Models\MenuRating;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Description extends Component
{
    public $menu, $price, $menu_option_id, $amount = 1, $like = 0;

    public function mount($menu)
    {
        $extra_price = 0;
        foreach ($menu->menu_options as $item) {
            if ($item->type == 0) {
                $extra_price = $item->extra_price;
                $this->menu_option_id = $item->id;
            }
        }
        $this->price = $menu->price + $extra_price;

        $this->loadLikeMenu();
    }

    public function addToCart()
    {
        $this->emit('setListCart', $this->menu_option_id, $this->amount, true);
    }

    public function updateMenuOptionId($new_price = 0)
    {
        $this->price = $new_price;
    }

    public function updateAmount($action)
    {
        if ($action == 'plus') {
            $this->amount++;
        } else {
            if ($this->amount > 1) {
                $this->amount--;
            } else {
                $this->amount = 1;
            }
        }
    }

    public function updateLike()
    {
        $menu_id = $this->menu->id;
        $menu_rating = MenuRating::where('menu_id', $menu_id);
        if ($menu_rating->count() > 0) { // Check if data exist
            if ($this->like == 0) {
                $this->like = 1;
                $menu_rating->increment('value', 1);
            } else {
                $this->like = 0;
                $menu_rating->decrement('value', 1);
            }
        } else {
            $this->like = 1;
            MenuRating::create(['menu_id' => $menu_id, 'value' => 1]);
        }

        $this->emit('setCookieLikeMenu', $menu_id, $this->like); // run method in Base
    }

    public function loadLikeMenu()
    {
        $cookie_name = 'like-menu';
        if (Cookie::has($cookie_name)) {
            $cookies = json_decode(request()->cookie($cookie_name), true);
            if (in_array($this->menu->id, $cookies)) {
                $this->like = 1;
            } else {
                $this->like = 0;
            }
        }
    }

    public function render()
    {
        return view('landing.menu.detail.description');
    }
}
