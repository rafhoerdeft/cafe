<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\MenuOption;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function getConfig()
    {
        try {
            $config = Config::select([
                'profile_id',
                'theme_id',
                'image_category_menu',
                'logo',
                'carousel',
                'carousel_popular_menu',
                'carousel_blog',
                'blog'
            ])->with(['themes'])->where('id', 1)->first();

            if (!$config) {
                throw new \Exception("Get config failed");
            }

            $res = ['success' => true, 'data' => $config];
        } catch (\Exception $e) {
            $res = ['success' => false, 'alert' => $e->getMessage()];
        }

        return $res;
    }
}
