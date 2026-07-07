<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menus;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function common(Request $request)
    {
        $segments = $request->segments();
        
        $lastSegment = end($segments);

        $page = Pages::where('slug', $lastSegment)->first();
       
        if (!$page) {
            abort(404);
        }

        // Get menu details
        $menu = Menus::where('name', $page->title)->first();
        
        // Breadcrumbs array
        $breadcrumbs = [];

        // Fetch parent menus recursively
        while ($menu && $menu->parent_id) {
            $parentMenu = Menus::find($menu->parent_id);
          
            if ($parentMenu) {
                $breadcrumbs[] = [
                    'name' => $parentMenu->name,
                    'url' => $parentMenu->slug,
                ];
                $menu = $parentMenu; 
             
            } else {
                break;
            }
        }

        // Reverse to get correct order (parent first)
        $breadcrumbs = array_reverse($breadcrumbs);
       
        // Add the current page at the end
        $breadcrumbs[] = [
            'name' => $page->title,
            'url' => (string) url($page->slug), // Ensure it's a string
        ];

        return view('frontend.page', compact('page', 'breadcrumbs'));
    }
}