<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffsResource\Pages;
use App\Filament\Resources\StaffsResource\RelationManagers;
use App\Models\Staffs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffsResource extends Resource
{
    protected static ?string $model = Staffs::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
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
                                    ->helperText('Enter the full name of the staff member.'),
                                Forms\Components\TextInput::make('designation')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Enter the designation or position of the staff member.'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('staff_type')
                                    ->label('Staff Type')
                                    ->options([
                                        'kindergarten' => 'Kindergarten Staff',
                                        'school-section' => 'School Section Staff',
                                        'office' => 'Office Staff',
                                        'helping' => 'Helping Staff',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->helperText('Select the category for this staff member.'),
                                Forms\Components\Toggle::make('status')
                                    ->required()
                                    ->default(true)
                                    ->label('Active?')
                                    ->inline(false)
                                    ->helperText('Toggle to activate or deactivate this staff member.'),
                            ]),
                        Forms\Components\FileUpload::make('image')
                            ->label('Staff Photo')
                            ->image()
                            ->multiple()
                            ->maxSize(5120)
                            ->imagePreviewHeight('150')
                            ->directory('uploads/staffs')
                            ->helperText('Upload staff photo(s) (jpg, png, gif, webp). Max size: 5MB.')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('qualification')
                            ->label('Qualification')
                            ->rows(4)
                            ->columnSpanFull()
                            ->placeholder('Enter the qualification of the staff member...')
                            ->helperText('Provide additional information about the staff member.'),
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('designation')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('staff_type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'kindergarten' => 'success',
                        'school-section' => 'info',
                        'office' => 'warning',
                        'helping' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'kindergarten' => 'Kindergarten',
                        'school-section' => 'School Section',
                        'office' => 'Office',
                        'helping' => 'Helping',
                        default => $state,
                    })
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('staff_type')
                    ->label('Staff Type')
                    ->options([
                        'kindergarten' => 'Kindergarten Staff',
                        'school-section' => 'School Section Staff',
                        'office' => 'Office Staff',
                        'helping' => 'Helping Staff',
                    ]),
                Tables\Filters\TernaryFilter::make('status')
                    ->label('Status')
                    ->placeholder('All staff')
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
            'index' => Pages\ListStaffs::route('/'),
            'create' => Pages\CreateStaffs::route('/create'),
            'edit' => Pages\EditStaffs::route('/{record}/edit'),
        ];
    }
}
