<?php

namespace App\Filament\Resources\SocialIconsResource\Pages;

use App\Filament\Resources\SocialIconsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocialIcons extends EditRecord
{
    protected static string $resource = SocialIconsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
