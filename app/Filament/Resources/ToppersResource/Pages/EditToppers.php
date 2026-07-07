<?php

namespace App\Filament\Resources\ToppersResource\Pages;

use App\Filament\Resources\ToppersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditToppers extends EditRecord
{
    protected static string $resource = ToppersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
