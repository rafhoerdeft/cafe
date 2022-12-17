<?php

namespace App\Http\Livewire\Landing\Blog\Detail;

use App\Http\Livewire\Landing\Base;

class Index extends Base
{
    public function render()
    {
        return view('landing.blog.detail.index')->layoutData([
            'theme_color' => $this->config->themes->css_file,
            'show_logo' => $this->config->logo,
        ]);
    }
}
