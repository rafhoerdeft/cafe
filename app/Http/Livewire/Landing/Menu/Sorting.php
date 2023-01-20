<?php

namespace App\Http\Livewire\Landing\Menu;

use Livewire\Component;

class Sorting extends Component
{
    public
        $sorting_menu = 1,
        $sorting_option = [
            1 => 'Popular',
            2 => 'Favorite',
            3 => 'Latest'
        ];

    protected $listeners = ['changeSelect'];

    public function changeSelect($id)
    {
        $this->sorting_menu = $id;
        $this->emit('changeSorting', $id);
    }

    public function render()
    {
        return view('landing.menu.sorting');
    }
}
