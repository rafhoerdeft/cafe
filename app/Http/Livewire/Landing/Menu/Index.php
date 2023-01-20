<?php

namespace App\Http\Livewire\Landing\Menu;

use App\Http\Livewire\Landing\Base;

class Index extends Base
{
    public $category_name;

    public function mount($category)
    {
        $this->category_name = $category;
    }

    public function render()
    {
        $category_name = $this->category_name;
        return view('landing.menu.index', compact('category_name'))->layoutData([
            'theme_color' => $this->config->themes->css_file,
            'show_logo' => $this->config->logo,
            'active_nav' => 'menu_' . $category_name,
        ]);
    }
}
