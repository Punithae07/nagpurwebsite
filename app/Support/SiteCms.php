<?php

namespace App\Support;

use App\Models\MediaItem;
use App\Models\Member;
use App\Models\SiteMenu;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;

class SiteCms
{
    public static function shared(): array
    {
        if (! Schema::hasTable('site_settings')) {
            return [
                'siteSettings' => null,
                'headerMenu' => collect(),
                'footerQuickLinks' => collect(),
                'footerExploreLinks' => collect(),
            ];
        }

        return [
            'siteSettings' => SiteSetting::query()->first(),
            'headerMenu' => self::menuTree('header'),
            'footerQuickLinks' => self::menuTree('footer_quick_links'),
            'footerExploreLinks' => self::menuTree('footer_explore'),
        ];
    }

    public static function menuTree(string $location)
    {
        return SiteMenu::query()
            ->where('location', $location)
            ->whereNull('parent_id')
            ->where('is_active', true)
            ->with('children')
            ->orderBy('sort_order')
            ->get();
    }

    public static function activeMedia(string $type, ?string $pageSlug = null)
    {
        return MediaItem::query()
            ->where('type', $type)
            ->when($pageSlug, fn ($query) => $query->where('page_slug', $pageSlug))
            ->where('status', true)
            ->orderBy('sort_order')
            ->get();
    }

    public static function activeMembers(string $group)
    {
        return Member::query()
            ->where('group', $group)
            ->where('status', true)
            ->orderBy('sort_order')
            ->get();
    }
}