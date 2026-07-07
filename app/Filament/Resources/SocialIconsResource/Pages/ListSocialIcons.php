<?php

namespace App\Filament\Resources\SocialIconsResource\Pages;

use App\Filament\Resources\SocialIconsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocialIcons extends ListRecords
{
    protected static string $resource = SocialIconsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
