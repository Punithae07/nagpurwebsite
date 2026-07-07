<?php

namespace App\Filament\Resources\DailyThoughtsResource\Pages;

use App\Filament\Resources\DailyThoughtsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDailyThoughts extends ListRecords
{
    protected static string $resource = DailyThoughtsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
