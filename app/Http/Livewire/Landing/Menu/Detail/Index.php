<?php

namespace App\Http\Livewire\Landing\Menu\Detail;

use App\Http\Livewire\Landing\Base;
use App\Models\Menu;

class Index extends Base
{
    public $menu_id;

    public function mount($id)
    {
        $this->menu_id = $id;
    }

    public function render()
    {
        $menu = Menu::with(['menu_categories:id,name', 'menu_options'])
            ->find(decode($this->menu_id));
        return view('landing.menu.detail.index', compact('menu'))->layoutData([
            'theme_color' => $this->config->themes->css_file,
            'show_logo' => $this->config->logo,
        ]);
    }
}
