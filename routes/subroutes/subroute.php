<?php
use App\Http\Controllers\OurActivitiesController;
use App\Http\Controllers\OurLeadersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ToppersXController;
use App\Http\Controllers\ToppersXIIController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Register routes for the given items using the specified controller.
 *
 * @param \Illuminate\Support\Collection $items
 * @param string $controllerClass
 * @param string|null $prefix
 */
function registerRoutesForItems($items, string $controllerClass, ?string $prefix = null): void
{
    foreach ($items as $item) {
        $slug = $prefix ? "{$prefix}/{$item->slug}" : $item->slug;
        Route::get($slug, [$controllerClass, 'common'])->name($slug);
    }
}


if (Schema::hasTable('posts')) {
    $posts = \App\Models\Posts::all();
    if ($posts->isNotEmpty()) {
        registerRoutesForItems($posts, PostController::class, 'post');
    }
}

if (Schema::hasTable('pages')) {
    $pages = \App\Models\Pages::all();
    if ($pages->isNotEmpty()) {
        registerRoutesForItems($pages, PageController::class);
    }
}