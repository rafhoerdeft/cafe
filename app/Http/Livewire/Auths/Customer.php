<?php

namespace App\Http\Livewire\Auths;

class Customer extends Base
{
    public function render()
    {
        return view('auths.customer')
            ->layout('layouts.app')
            ->layoutData(['theme_color' => $this->config->themes->css_file]);
    }
}
