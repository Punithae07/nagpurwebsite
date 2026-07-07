<?php

namespace App\Filament\Resources\DailyThoughtsResource\Pages;

use App\Filament\Resources\DailyThoughtsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDailyThoughts extends CreateRecord
{
    protected static string $resource = DailyThoughtsResource::class;
}
