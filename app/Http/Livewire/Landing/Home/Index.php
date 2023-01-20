<?php

namespace App\Http\Livewire\Landing\Home;

use App\Http\Livewire\Landing\Base;

class Index extends Base
{
    public function render()
    {
        return view('landing.home.index', ['config' => $this->config])
            ->layoutData([
                'theme_color' => $this->config->themes->css_file,
                'show_logo' => $this->config->logo,
                'active_nav' => 'home',
            ]);
    }
}
