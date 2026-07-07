<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimetableResource\Pages;
use App\Models\Timetable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TimetableResource extends Resource
{
    protected static ?string $model = Timetable::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Support Data';

    protected static ?string $navigationLabel = 'Timetable';

    protected static ?string $pluralLabel = 'Timetables';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Timetable Details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Type')
                            ->options([
                                'image' => 'Image (Downloadable / PDF)',
                                'calendar' => 'Calendar Item',
                            ])
                            ->required()
                            ->reactive(),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('class_name')
                            ->label('Class')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('section')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('academic_year')
                            ->maxLength(50),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ]),

                Forms\Components\Section::make('Content')
                    ->columns(2)
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Timetable Image / PDF')
                            ->directory('timetables')
                            ->imagePreviewHeight('150')
                            ->image()
                            ->enableOpen()
                            ->enableDownload()
                            ->visible(fn (callable $get) => $get('type') === 'image'),

                        Forms\Components\Repeater::make('entries')
                            ->relationship('entries')
                            ->visible(fn (callable $get) => $get('type') === 'calendar')
                            ->label('Timetable Entries')
                            ->minItems(1)
                            ->columns(3)
                            ->schema([
                                Forms\Components\TextInput::make('subject')
                                    ->label('Subject')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('class_name')
                                    ->label('Class')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('section')
                                    ->maxLength(255),
                                Forms\Components\DateTimePicker::make('start_at')
                                    ->label('Start At')
                                    ->seconds(false),
                                Forms\Components\DateTimePicker::make('end_at')
                                    ->label('End At')
                                    ->seconds(false),
                            ]),

                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull()
                            ->rows(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('type')
                    ->colors([
                        'primary',
                        'success' => 'calendar',
                        'warning' => 'image',
                    ])
                    ->formatStateUsing(fn (string $state) => ucfirst($state)),
                Tables\Columns\TextColumn::make('class_name')
                    ->label('Class')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('academic_year')
                    ->label('Year')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('start_at')
                    ->dateTime('M d, Y H:i')
                    ->label('Start')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->label('Created')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'image' => 'Image',
                        'calendar' => 'Calendar',
                    ]),
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTimetables::route('/'),
            'create' => Pages\CreateTimetable::route('/create'),
            'edit' => Pages\EditTimetable::route('/{record}/edit'),
        ];
    }
}

