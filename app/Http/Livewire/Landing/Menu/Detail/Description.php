<?php

namespace App\Http\Livewire\Landing\Menu\Detail;

use App\Models\MenuRating;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Description extends Component
{
    public $menu, $price, $menu_option_id, $amount = 1, $like = 0, $loading_button = false;

    protected $listeners = ['close_loading' => 'closeLoadingButton'];

    public function mount()
    {
        $extra_price = 0;
        foreach ($this->menu->menu_options as $item) {
            if ($item->type == 0) {
                $extra_price = $item->extra_price;
                $this->menu_option_id = $item->id;
            }
        }
        $this->price = $this->menu->price + $extra_price;

        $this->loadLikeMenu();
    }

    public function addToCart()
    {
        $this->loading_button = true;
        $this->emit('setListCart', $this->menu_option_id, $this->amount);

        $this->emit('close_loading');

        $menu_option_name = $this->menu->menu_options->where('id', $this->menu_option_id)->first()->name;
        $this->dispatchBrowserEvent('show-modal', [
            'name' => $this->menu->name . ' - ' . $menu_option_name,
            'amount' => $this->amount
        ]);
    }

    public function closeLoadingButton()
    {
        $this->loading_button = false;
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
