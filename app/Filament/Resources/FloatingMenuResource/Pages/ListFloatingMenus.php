<?php

namespace App\Filament\Resources\FloatingMenuResource\Pages;

use App\Filament\Resources\FloatingMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFloatingMenus extends ListRecords
{
    protected static string $resource = FloatingMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
