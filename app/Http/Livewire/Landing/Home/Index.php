<?php

namespace App\Http\Livewire\Landing\Home;

use App\Http\Livewire\Landing\Base;

class Index extends Base
{
    public function mount()
    {
        # code...
    }

    public function render()
    {
        return view('landing.home.index', ['config' => session('config')]);
    }
}
