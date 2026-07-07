<?php

use App\Http\Controllers\PageController;
use App\Models\Pages;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

    // Helper function to recursively build menu path
    function buildMenuPath($menu)
    {
        $segments = [];

        while ($menu) {
            $segments[] = Str::slug($menu->name);
            $menu = $menu->parent;
        }

        return implode('/', array_reverse($segments));
    }

    if (Schema::hasTable('pages')) {

        // Eager load menu and its ancestors (up to 2 levels)
        $pages = Pages::with('menu.parent.parent')->get();

        foreach ($pages as $page) {
            $menu = $page->menu;

            if (!$menu) {
                continue; // Skip pages with no associated menu
            }

            $menuPath = buildMenuPath($menu);
            $menuSegments = explode('/', $menuPath);

            // Only add the page slug if it's not the same as the last menu segment
            if (Str::slug(end($menuSegments)) !== Str::slug($page->slug)) {
                $fullPath = $menuPath . '/' . $page->slug;
            } else {
                $fullPath = $menuPath;
            }


            // Register the route
            Route::get($fullPath, [PageController::class, 'common'])
                ->name("pages.$page->slug");
        }
}