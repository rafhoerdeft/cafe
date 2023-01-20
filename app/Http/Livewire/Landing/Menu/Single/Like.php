<?php

namespace App\Http\Livewire\Landing\Menu\Single;

use App\Models\MenuRating;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Like extends Component
{
    public $menu_id, $like = 0;

    protected $listeners = ['checkRefreshLike'];

    public function mount()
    {
        $this->loadLikeMenu();
    }

    public function checkRefreshLike($id, $like)
    {
        if ($id == decode($this->menu_id)) {
            $this->like = $like;
        }
    }

    public function loadLikeMenu()
    {
        $cookie_name = 'like-menu';
        if (Cookie::has($cookie_name)) {
            $cookies = json_decode(request()->cookie($cookie_name), true);
            if (in_array(decode($this->menu_id), $cookies)) {
                $this->like = 1;
            } else {
                $this->like = 0;
            }
        }
    }

    public function updateLike()
    {
        $menu_id = decode($this->menu_id);
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
        $this->emit('checkRefreshLike', $menu_id, $this->like);
    }

    public function render()
    {
        return view('landing.menu.single.like');
    }
}
