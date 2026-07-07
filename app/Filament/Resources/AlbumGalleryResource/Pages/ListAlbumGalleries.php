<?php

namespace App\Filament\Resources\AlbumGalleryResource\Pages;

use App\Filament\Resources\AlbumGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlbumGalleries extends ListRecords
{
    protected static string $resource = AlbumGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
