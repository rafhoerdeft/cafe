<?php

namespace App\Http\Livewire\Landing\Menu\Detail;

use App\Http\Livewire\Landing\Base;
use App\Models\Menu;

class Index extends Base
{
    public $menu;

    public function mount($id)
    {
        $this->menu = Menu::with(['menu_categories:id,name', 'menu_options'])
            ->find(decode($id));
    }

    public function render()
    {
        return view('landing.menu.detail.index')->layoutData([
            'theme_color' => $this->config->themes->css_file,
            'show_logo' => $this->config->logo,
        ]);
    }
}
