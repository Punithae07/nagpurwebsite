<?php

namespace App\Helpers;

use App\Models\Menus;
use App\Models\SocialIcons;
use Auth;
use Awcodes\Curator\Models\Media;
use Carbon\Carbon;
use Config;
use DB;
use Illuminate\Support\Str;

class Common
{

    /**
     * Replace the null value with empty
     *
     * @return
     */

    // public static function getMenus()
    // {
    //     $menus = Menus::where('type', 'main_menu')->where('status', 1)->orderBy('order_by', 'asc')->get();

    //     $menus->load('children');

    //     return $menus;
    // }

    public static function getMenus()
    {
        $menus = Menus::where('type', 'main_menu')
            ->where('status', 1)
            ->orderBy('order_by', 'asc')
            ->with('allChildren')  // Eager load recursively
            ->get();
        
        return $menus;
    }



    public static function getImage($image)
    {
        $data = Media::find($image);

        return $data->path;
    }

    public static function getSocialIcons()
    {
        return SocialIcons::where('status', 1)->get();
    }

    public static function getMenuFullPath($menu)
    {
        $segments = [];

        while ($menu) {
            $segments[] = Str::slug($menu->name);
            $menu = $menu->parent;
        }

        return implode('/', array_reverse($segments));
    }


}