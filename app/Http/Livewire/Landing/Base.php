<?php

namespace App\Http\Livewire\Landing;

use App\Models\Config;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Base extends Component
{
    protected
        $config,
        // $like_menu = [],
        $cookie_like_menu_name = 'like-menu',
        $cookie_config_name = 'configs-web';

    protected $listeners = ['setCookieLikeMenu'];

    public function __construct()
    {
        parent::__construct();

        $this->loadCookieConfigWeb();
        // $this->loadCookieLikeMenu();
    }

    public function loadCookieConfigWeb()
    {
        $cookie_name = $this->cookie_config_name;
        if (!Cookie::has($cookie_name)) {
            $config_web = Config::select([
                'profile_id',
                'theme_id',
                'image_category_menu',
                'logo',
                'carousel',
                'carousel_popular_menu',
                'carousel_blog',
                'blog'
            ])->where('profile_id', 1)->with('themes')->first();

            $this->config = json_decode($config_web);

            Cookie::queue($cookie_name, $config_web, 180); // Set cookie config
        } else {
            $this->config = json_decode(request()->cookie($cookie_name)); // get cookie config
        }
    }

    public function setCookieLikeMenu($menu_id, $like)
    {
        $cookie_name = $this->cookie_like_menu_name;
        $like_menu = [];
        if (!Cookie::has($cookie_name)) {
            $like_menu[] = $menu_id;

            // $this->like_menu = $like_menu;

            Cookie::queue(cookie()->forever($cookie_name, json_encode($like_menu))); // Set cookie config
        } else {
            $cookies = json_decode(request()->cookie($cookie_name), true);
            if ($like == 1) {
                if (!in_array($menu_id, $cookies)) {
                    $cookies[] = $menu_id;
                }
            } else {
                if (($key = array_search($menu_id, $cookies)) !== false) { // Search menu_id from array cookies
                    unset($cookies[$key]); // Is available remove from array
                }
            }

            // $this->like_menu = $cookies;

            Cookie::queue(cookie()->forever($cookie_name, json_encode($cookies))); // Set cookie config
        }
    }

    public function loadCookieLikeMenu()
    {
        $cookie_name = $this->cookie_like_menu_name;
        if (Cookie::has($cookie_name)) {
            $cookies = json_decode(request()->cookie($cookie_name), true);
            // $this->like_menu = $cookies;
        }
    }
}
