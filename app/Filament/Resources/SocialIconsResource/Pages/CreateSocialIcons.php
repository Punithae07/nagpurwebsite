<?php

namespace App\Filament\Resources\SocialIconsResource\Pages;

use App\Filament\Resources\SocialIconsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSocialIcons extends CreateRecord
{
    protected static string $resource = SocialIconsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}