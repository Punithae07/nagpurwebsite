<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenusResource\Pages;
use App\Models\Menus;
use App\Models\Pages as Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;

class MenusResource extends Resource
{
    protected static ?string $model = Menus::class;
    protected static string $icon = 'heroicon-o-bars-3';
    protected static ?string $navigationIcon = 'heroicon-o-bars-3';
    protected static ?string $label = 'Menus';
    protected static ?string $navigationLabel = 'Menus';
    protected static ?string $navigationGroup = 'Menus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('type')
                    ->options([
                        'main_menu' => 'Main Menu',
                        'sub_menu' => 'Sub Menu',
                        'submenu_under_submenu' => 'Submenu Under Submenu',
                    ])
                    ->native(false)
                    ->required()
                    ->reactive(),

                Forms\Components\Checkbox::make('is_url')
                    ->live(),

                Forms\Components\TextInput::make('url')
                    ->hidden(fn(Get $get): bool => !$get('is_url'))
                    ->required(),

                Forms\Components\Select::make('target')
                    ->hidden(fn(Get $get): bool => !$get('is_url'))
                    ->label('Link Target')
                    ->live()
                    ->options([
                        '_self' => 'Same Tab',
                        '_blank' => 'New Tab',
                    ])
                    ->native(false),

                // Parent Menu for sub_menu only, listing only main_menus
                Forms\Components\Select::make('parent_id')
                    ->label('Parent Menu')
                    ->relationship('subParent', 'name')
                    ->searchable()
                    ->preload()
                    ->hidden(fn(Get $get) => $get('type') !== 'sub_menu')
                    ->required(fn(Get $get) => $get('type') === 'sub_menu')
                    ->native(false),

                // Submenu under submenu (shows only submenus)
                Forms\Components\Select::make('submenu_under_submenu_parent')
                    ->label('Select Submenu')
                    ->hidden(fn(Get $get) => $get('type') !== 'submenu_under_submenu')
                    ->required(fn(Get $get) => $get('type') === 'submenu_under_submenu')
                    ->relationship('subUnderParent', 'name')
                    ->searchable()
                    ->preload()
                    ->afterStateUpdated(function (callable $set, $state) {
                        // Set the parent_id to the selected submenu's id
                        $set('parent_id', $state);
                    })
                    ->native(false),

                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('parent.name')
                    ->collapsible(),
            ])
            ->reorderable('order_by')
            ->defaultGroup('parent.name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order_by')
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
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                        ->before(function ($action, $record) {
                            try {
                                // Check if the menu has submenus
                                if ($record->children()->count() > 0) {
                                    throw new \Exception("This menu has submenus and cannot be deleted.");
                                }

                                // Check if the menu is referenced by a page
                                if ($record->page()->exists()) {
                                    throw new \Exception("This menu is referenced by a page and cannot be deleted.");
                                }

                            } catch (\Exception $e) {
                                // Show error notification and prevent deletion
                                Notification::make()
                                    ->title('Error')
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();

                                // Prevent the deletion from proceeding
                                $action->cancel();
                            }
                        }),

                ]),
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
            'index' => Pages\ListMenuses::route('/'),
            'create' => Pages\CreateMenus::route('/create'),
            'edit' => Pages\EditMenus::route('/{record}/edit'),
        ];
    }
}