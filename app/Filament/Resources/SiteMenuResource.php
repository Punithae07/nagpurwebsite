<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteMenuResource\Pages;
use App\Models\SiteMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteMenuResource extends Resource
{
    protected static ?string $model = SiteMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $navigationGroup = 'Website CMS';
    protected static ?string $navigationLabel = 'Menus';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\TextInput::make('url')->required(),
            Forms\Components\Select::make('location')->options([
                'header' => 'Header Menu',
                'footer_quick_links' => 'Footer Quick Links',
                'footer_explore' => 'Footer Explore',
            ])->required(),
            Forms\Components\Select::make('parent_id')->label('Parent Menu')->options(SiteMenu::query()->pluck('title', 'id'))->searchable(),
            Forms\Components\Select::make('target')->options(['_self' => 'Same Tab', '_blank' => 'New Tab'])->default('_self'),
            Forms\Components\Toggle::make('is_active')->default(true),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table->reorderable('sort_order')->columns([
            Tables\Columns\TextColumn::make('title')->searchable(),
            Tables\Columns\TextColumn::make('location')->badge(),
            Tables\Columns\TextColumn::make('parent.title')->label('Parent'),
            Tables\Columns\TextColumn::make('url')->limit(30),
            Tables\Columns\IconColumn::make('is_active')->boolean(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteMenus::route('/'),
            'create' => Pages\CreateSiteMenu::route('/create'),
            'edit' => Pages\EditSiteMenu::route('/{record}/edit'),
        ];
    }
}