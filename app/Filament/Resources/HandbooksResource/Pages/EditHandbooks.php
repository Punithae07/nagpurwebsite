<?php

namespace App\Filament\Resources\HandbooksResource\Pages;

use App\Filament\Resources\HandbooksResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHandbooks extends EditRecord
{
    protected static string $resource = HandbooksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
