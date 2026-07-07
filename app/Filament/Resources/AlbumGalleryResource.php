<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumGalleryResource\Pages;
use App\Models\AlbumGallery;
use App\Models\BedCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AlbumGalleryResource extends Resource
{
    protected static ?string $model = AlbumGallery::class;
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Gallery';

    public static function getNavigationGroup(): ?string
    {
        return 'Albums';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->label('Gallery Title')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn($set, ?string $state) => $set('slug', Str::slug($state)))
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->autofocus()
                            ->helperText('Enter a unique title for your gallery.'),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->disabled()
                            ->helperText('Automatically generated from the title.'),

                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->required(),

                        Forms\Components\DatePicker::make('date')
                            ->label('Date')
                            ->default(now())
                            ->required(),
                            
                        Forms\Components\FileUpload::make('main_image')
                            ->label('Main Image')
                            ->image()
                            ->directory('album/main')
                            ->imageEditor()
                            ->required()
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('status')
                            ->required()
                            ->default(true)
                            ->label('Active?')
                            ->inline(false)
                            ->helperText('Toggle to activate or deactivate this gallery.'),
                    ])
                    ->columns(2),

               Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\FileUpload::make('sub_images')
                            ->label('Album Images')
                            ->image()
                            ->directory('album/sub')
                            ->multiple()
                            ->reorderable()
                            ->panelLayout('grid')
                            ->appendFiles()
                            ->imageEditor()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('main_image')
                    ->label('Main Image')
                    ->square()
                    ->height(80),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label('Category')->sortable(),
                Tables\Columns\TextColumn::make('date')->date()->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlbumGalleries::route('/'),
            'create' => Pages\CreateAlbumGallery::route('/create'),
            'edit' => Pages\EditAlbumGallery::route('/{record}/edit'),
        ];
    }
}
