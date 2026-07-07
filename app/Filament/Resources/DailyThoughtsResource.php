<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DailyThoughtsResource\Pages;
use App\Models\DailyThoughts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DailyThoughtsResource extends Resource
{
    protected static ?string $model = DailyThoughts::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($set, ?string $state) => $set('slug', Str::slug(Str::limit($state, 100, ''))))
                    ->rows(3)
                    ->autofocus()
                    ->columnSpanFull()
                    ->helperText('Enter the verse text or daily thought content.'),
                Forms\Components\TextInput::make('bible_verse')
                    ->label('Bible Verse Reference')
                    ->maxLength(255)
                    ->helperText('Enter the bible verse reference (e.g., Romans 15:13).'),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->disabled()
                    ->helperText('Automatically generated from the title.'),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required()
                    ->default(true)
                    ->label('Active?')
                    ->inline(false)
                    ->helperText('Toggle to activate or deactivate this daily thought.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('bible_verse')
                    ->label('Bible Verse')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')->boolean(),
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
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDailyThoughts::route('/'),
            'create' => Pages\CreateDailyThoughts::route('/create'),
            'edit' => Pages\EditDailyThoughts::route('/{record}/edit'),
        ];
    }
}
