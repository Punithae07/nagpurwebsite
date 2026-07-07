<?php

namespace App\Filament\Resources\FloatingMenuResource\Pages;

use App\Filament\Resources\FloatingMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFloatingMenu extends CreateRecord
{
    protected static string $resource = FloatingMenuResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}