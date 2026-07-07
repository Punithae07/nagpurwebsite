<?php

namespace App\Filament\Resources\MenusResource\Pages;

use App\Filament\Resources\MenusResource;
use App\Models\Pages;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateMenus extends CreateRecord
{
    protected static string $resource = MenusResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record;

        if (!$record->is_url) {
            $slug = Str::slug($record->name);

            $page = new Pages();

            $page->menu_id = $record->id;
            $page->title = $record->name;
            $page->slug = $slug;
            $page->publish_date = now();

            $page->save();
        }
    }


    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}