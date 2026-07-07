<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialIconsResource\Pages;
use App\Filament\Resources\SocialIconsResource\RelationManagers;
use App\Models\SocialIcons;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\View;

class SocialIconsResource extends Resource
{
    protected static ?string $model = SocialIcons::class;

    protected static ?string $navigationIcon = 'heroicon-o-x-circle';
    protected static ?string $navigationGroup = 'Support Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),

                Forms\Components\Select::make('icon')
                    ->label('Icon')
                    ->options([
                        'fa-facebook' => 'Facebook',
                        'fa-twitter' => 'Twitter',
                        'fa-whatsapp' => 'Whatsapp',
                        'fa-instagram' => 'Instagram',
                        'fa-linkedin' => 'Linkedin',
                        'fa-youtube' => 'Youtube',
                        'fa-telegram' => 'Telegram',
                    ])
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('url')
                    ->url()
                    ->required(),

                Forms\Components\Select::make('target')
                    ->label('Link Target')
                    ->live()
                    ->options([
                        '_self' => 'Same Tab',
                        '_blank' => 'New Tab',
                    ])
                    ->native(false)
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Title')->sortable(),
                Tables\Columns\TextColumn::make('icon')->label('Icon')->sortable(),
                Tables\Columns\TextColumn::make('url')->label('URL')->sortable(),
                Tables\Columns\TextColumn::make('status')->label('Status')->sortable(),
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
                Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListSocialIcons::route('/'),
            'create' => Pages\CreateSocialIcons::route('/create'),
            'edit' => Pages\EditSocialIcons::route('/{record}/edit'),
        ];
    }
}