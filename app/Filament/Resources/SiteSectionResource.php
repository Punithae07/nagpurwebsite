<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSectionResource\Pages;
use App\Models\SitePage;
use App\Models\SiteSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;

class SiteSectionResource extends Resource
{
    protected static ?string $model = SiteSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'Website CMS';
    protected static ?string $navigationLabel = 'Sections';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('site_page_id')
                ->label('Page')
                ->options(SitePage::query()->pluck('title', 'id'))
                ->searchable()
                ->required(),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('key')->required(),
            Forms\Components\TextInput::make('layout')->default('content')->required(),
            Forms\Components\TextInput::make('eyebrow'),
            Forms\Components\TextInput::make('title'),
            Forms\Components\Textarea::make('subtitle')->rows(2),
            TiptapEditor::make('content')
                ->label('Content')
                ->profile('cms')
                ->disk('public')
                ->directory('site/sections/content')
                ->output(TiptapOutput::Html)
                ->maxContentWidth('4xl')
                
                ->columnSpanFull()
                ->helperText('Use this editor for formatted content, multiple announcements, lists, links, and images.'),
            Forms\Components\FileUpload::make('image')
                ->disk('public')
                ->directory('site/sections')
                ->image()
                ->imageEditor()
                ->helperText('Upload an image and use Edit to crop/resize it.'),
            Forms\Components\TextInput::make('image_alt'),
            Forms\Components\FileUpload::make('secondary_image')
                ->disk('public')
                ->directory('site/sections')
                ->image()
                ->imageEditor()
                ->helperText('Optional secondary image. You can crop/resize it before saving.'),
            Forms\Components\TextInput::make('secondary_image_alt'),
            Forms\Components\Repeater::make('items')->schema([
                Forms\Components\TextInput::make('title'),
                Forms\Components\TextInput::make('label'),
                Forms\Components\TextInput::make('year'),
                Forms\Components\TextInput::make('icon'),
                Forms\Components\TextInput::make('count'),
                Forms\Components\FileUpload::make('image')
                    ->disk('public')
                    ->directory('site/section-items')
                    ->image()
                    ->imageEditor(),
                Forms\Components\Textarea::make('text')->rows(3),
            ])->columnSpanFull()->collapsible(),
            Forms\Components\KeyValue::make('settings')->columnSpanFull(),
            Forms\Components\Toggle::make('status')->default(true),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table->reorderable('sort_order')->columns([
            Tables\Columns\TextColumn::make('page.title')->label('Page')->sortable(),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('key')->searchable(),
            Tables\Columns\TextColumn::make('layout')->badge(),
            Tables\Columns\IconColumn::make('status')->boolean(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSections::route('/'),
            'create' => Pages\CreateSiteSection::route('/create'),
            'edit' => Pages\EditSiteSection::route('/{record}/edit'),
        ];
    }
}

