<?php

namespace App\Filament\Resources\DailyThoughtsResource\Pages;

use App\Filament\Resources\DailyThoughtsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDailyThoughts extends EditRecord
{
    protected static string $resource = DailyThoughtsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
