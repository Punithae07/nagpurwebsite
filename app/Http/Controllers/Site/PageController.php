<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\SitePage;
use App\Support\SiteCms;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $page = SitePage::query()
            ->where('slug', 'home')
            ->where('status', true)
            ->with('sections')
            ->firstOrFail();

        return $this->renderPage($page);
    }

    public function recentUpdates(): View
    {
        $homePage = SitePage::query()
            ->where('slug', 'home')
            ->where('status', true)
            ->first();

        $page = (object) [
            'title' => 'Recent Updates',
            'meta_title' => 'Recent Updates',
            'meta_description' => 'Latest recent updates and announcements.',
            'hero_eyebrow' => 'Updates',
            'hero_title' => 'Recent Updates',
            'hero_subtitle' => 'Latest notices, celebrations and community announcements.',
            'hero_image' => $homePage?->hero_image,
            'hero_style' => 'page-hero',
        ];

        return view('site.pages.recent-updates', [
            'page' => $page,
            'updates' => SiteCms::activeMedia('recent_update', 'home'),
        ]);
    }

    public function show(string $slug): View
    {
        $page = SitePage::query()
            ->where('slug', $slug)
            ->where('status', true)
            ->with('sections')
            ->firstOrFail();

        return $this->renderPage($page);
    }

    protected function renderPage(SitePage $page): View
    {
        $sections = $page->sections->keyBy('key');

        return view('site.pages.' . $page->template, [
            'page' => $page,
            'sections' => $sections,
            'heroSlides' => SiteCms::activeMedia('hero_slide', 'home'),
            'recentUpdates' => SiteCms::activeMedia('recent_update', 'home'),
            'videos' => SiteCms::activeMedia('video', 'home'),
            'galleryItems' => SiteCms::activeMedia('gallery', $page->slug),
            'leaders' => SiteCms::activeMembers('leadership'),
        ]);
    }
}
