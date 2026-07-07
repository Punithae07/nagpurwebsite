<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HandbooksResource\Pages;
use App\Filament\Resources\HandbooksResource\RelationManagers;
use App\Models\Handbooks;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class HandbooksResource extends Resource
{
    protected static ?string $model = Handbooks::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
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
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->maxLength(255)
                                    ->columnSpanFull()
                                    ->unique(ignoreRecord: true)
                                    ->autofocus()
                                    ->helperText('Enter a unique title for the handbook.'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('status')
                                    ->required()
                                    ->default(true)
                                    ->label('Active?')
                                    ->inline(false)
                                    ->helperText('Toggle to activate or deactivate this handbook.'),
                                Forms\Components\TextInput::make('order_by')
                                    ->label('Order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Set the display order (lower numbers appear first).'),
                            ]),
                        Forms\Components\FileUpload::make('file')
                            ->label('Handbook File')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->multiple()
                            ->maxSize(10240)
                            ->directory('uploads/handbooks')
                            ->helperText('Upload handbook file(s) (PDF, DOC, DOCX). Max size: 10MB per file.')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Enter a brief description about the handbook...')
                            ->helperText('Provide additional information about the handbook.'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->placeholder('All handbooks')
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
            'index' => Pages\ListHandbooks::route('/'),
            'create' => Pages\CreateHandbooks::route('/create'),
            'edit' => Pages\EditHandbooks::route('/{record}/edit'),
        ];
    }
}
