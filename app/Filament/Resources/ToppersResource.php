<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ToppersResource\Pages;
use App\Filament\Resources\ToppersResource\RelationManagers;
use App\Models\Toppers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ToppersResource extends Resource
{
    protected static ?string $model = Toppers::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Content';

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
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->autofocus()
                                    ->helperText('Enter the full name of the topper student.'),
                                Forms\Components\TextInput::make('class')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Enter the class or grade of the student.'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('percentage')
                                    ->label('Percentage / Marks')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Enter the percentage or marks obtained by the student.'),
                                Forms\Components\Toggle::make('status')
                                    ->required()
                                    ->default(true)
                                    ->label('Active?')
                                    ->inline(false)
                                    ->helperText('Toggle to activate or deactivate this topper.'),
                            ]),
                        Forms\Components\FileUpload::make('image')
                            ->label('Student Photo')
                            ->image()
                            ->multiple()
                            ->maxSize(5120)
                            ->imagePreviewHeight('150')
                            ->directory('uploads/toppers')
                            ->helperText('Upload student photo(s) (jpg, png, gif, webp). Max size: 5MB.')
                            ->columnSpanFull(),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('order_by')
                                    ->label('Order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Set the display order (lower numbers appear first).'),
                            ]),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Photo')
                    ->circular()
                    ->defaultImageUrl(url('/site/assets/img/crest.png')),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('class')
                    ->label('Class')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('percentage')
                    ->label('Percentage / Marks')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('success'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_by')
                    ->label('Order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Status')
                    ->placeholder('All toppers')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('order_by', 'asc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListToppers::route('/'),
            'create' => Pages\CreateToppers::route('/create'),
            'edit' => Pages\EditToppers::route('/{record}/edit'),
        ];
    }
}
