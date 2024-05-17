<?php

namespace App\Http\Livewire\Auths;

use App\Models\Config;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Base extends Component
{
    protected
        $config,
        $cookie_config_name = 'configs-web';

    public function __construct()
    {
        parent::__construct();

        $this->loadCookieConfigWeb();
    }

    public function loadCookieConfigWeb()
    {
        $cookie_name = $this->cookie_config_name;
        if (!Cookie::has($cookie_name)) {
            $config_web = Config::select([
                'theme_id',
            ])->where('profile_id', 1)->with('themes')->first();

            $this->config = json_decode($config_web);

            Cookie::queue($cookie_name, $config_web, 180); // Set cookie config
        } else {
            $this->config = json_decode(request()->cookie($cookie_name)); // get cookie config
        }
    }
}
