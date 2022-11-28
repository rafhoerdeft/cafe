<?php

namespace App\Http\Livewire\Landing;

use App\Models\Config;
use Livewire\Component;

class Base extends Component
{
    // protected $config;
    public function __construct()
    {
        parent::__construct();

        session()->put('config', Config::select([
            'profile_id',
            'image_category_menu',
            'logo',
            'carousel',
            'carousel_popular_menu',
            'carousel_blog',
            'blog'
        ])->latest()->first()->toArray());

        // $this->config = Config::latest()->first();
    }
}
