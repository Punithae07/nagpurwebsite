<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

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
                                    ->unique(ignoreRecord: true)
                                    ->autofocus()
                                    ->helperText('Enter a unique title for your news.'),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->disabled()
                                    ->helperText('Automatically generated from the title.'),
                            ]),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->required()
                                    ->helperText('Select the category for this news.'),
                                Forms\Components\Toggle::make('status')
                                    ->required()
                                    ->default(true)
                                    ->label('Active?')
                                    ->inline(false)
                                    ->helperText('Toggle to activate or deactivate this news.'),
                            ]),
                        TiptapEditor::make('description')
                            ->label('Short Description')
                            ->columnSpanFull()
                            ->placeholder('Enter a short description...')
                            ->helperText('Provide a short description.'),
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->imageEditor()
                                    ->maxSize(5120)
                                    ->imagePreviewHeight('150')
                                    ->directory('uploads/images')
                                    ->helperText('Upload a featured image (jpg, png, gif, webp).'),
                                Forms\Components\FileUpload::make('file')
                                    ->maxSize(2048)
                                    ->directory('uploads/files')
                                    ->helperText('Upload a related file if applicable.'),
                            ]),
                        Forms\Components\Builder::make('content')
                    ->blocks([
                        Block::make('heading')
                            ->schema([
                                TextInput::make('content')
                                    ->label('Heading')
                                    ->required(),
                                Select::make('level')
                                    ->options([
                                        'h1' => 'Heading 1',
                                        'h2' => 'Heading 2',
                                        'h3' => 'Heading 3',
                                        'h4' => 'Heading 4',
                                        'h5' => 'Heading 5',
                                        'h6' => 'Heading 6',
                                    ])
                                    ->required(),
                            ])
                            ->columns(2),
                        Block::make('Rich Editor')
                            ->label('Content Editor')
                            ->schema([
                                TiptapEditor::make('content')
                                    ->label('Content')
                                    ->profile('cms')
                                    ->disk('public')
                                    ->output(TiptapOutput::Html)
                                    ->maxContentWidth('5xl')
                                    ->required()
                                    ->directory('file-manager/post/content')
                                    ->helperText('Use headings, lists, links, and images. Use the media button to insert properly formatted images.'),
                            ]),
                        Block::make('TipTap Editor')
                            ->label('Advanced Content Editor')
                            ->schema([
                                TiptapEditor::make('content')
                                    ->label('Content')
                                    ->profile('cms')
                                    ->disk('public')
                                    ->output(TiptapOutput::Html)
                                    ->maxContentWidth('5xl')
                                    ->required()
                                    ->directory('file-manager/post/content')
                                    ->helperText('Supports better formatting and inline images.')
                            ]),
                        Block::make('image')
                            ->schema([
                                // FormsCuratorPicker::make('image')->directory('file-manager/post/image')->preserveFilenames()
                                //     ->required()
                                //     ->maxSize(1024 * 2),
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->imageEditor()
                                    ->image()
                                    ->openable()
                                    ->required()
                                    ->directory('file-manager/post/image'),
                                TextInput::make('alt')
                                    ->label('Alt text')
                                    ->required(),
                            ]),

                        Block::make('video')
                            ->schema([
                                TextInput::make('url')
                                    ->label('Video URL')
                                    ->required(),
                                Select::make('type')
                                    ->options([
                                        'youtube' => 'YouTube',
                                        'vimeo' => 'Vimeo',
                                    ])
                                    ->required(),
                            ]),

                        Block::make('Image Carousel') // ✅ Wrapped the Repeater inside a Block
                            ->schema([
                                Forms\Components\Repeater::make('images')
                                    ->schema([
                                        FileUpload::make('url')
                                            ->label('Image')
                                            ->imageEditor()
                                            ->image()
                                            ->openable()
                                            ->required()
                                            ->multiple()
                                            ->directory('file-manager/page/image'),
                                        TextInput::make('alt')
                                            ->label('Alt text')
                                            ->required(),
                                    ])
                                    ->columns(2)
                                    ->createItemButtonLabel('Add Image'),
                            ]),
                        
                        // Iframe PDF viewer
                        Block::make('iframe')
                                ->schema([
                                    TextInput::make('url')
                                        ->label('Iframe URL')
                                        ->required(),
                                    Select::make('type')
                                        ->options([
                                            'pdf' => 'PDF',
                                            'other' => 'Other',
                                        ])
                                        ->required(),
                                ]),

                         Block::make('button')
                                ->schema([
                                    TextInput::make('url')
                                        ->label('Button URL')
                                        ->required(),
                                    TextInput::make('text')
                                        ->label('Button Text')
                                        ->required(),
                                    Select::make('type')
                                        ->options([
                                            'primary' => 'Primary',
                                            'secondary' => 'Secondary',
                                            'tertiary' => 'Tertiary',
                                        ])
                                        ->required(),
                                ]),

                           // Accordion
                           // Accordion
                           Block::make('accordion')
                            ->schema([
                                Repeater::make('items')
                                    ->label('Accordion Items')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Accordion Title')
                                            ->required()
                                            ->extraAttributes([
                                                'class' => 'bg-gray-100 text-gray-800 p-2 rounded-md',
                                            ]),
                                        TiptapEditor::make('content')
                                            ->label('Accordion Content')
                                            ->required()
                                            ->directory('file-manager/page/content')
                                            ->extraAttributes([
                                                'class' => 'bg-white text-gray-700 p-3 rounded-md',
                                            ]),

                                        Repeater::make('tabs')
                                            ->label('Tabs (Optional)')
                                            ->schema([
                                                TextInput::make('title')->label('Tab Title')->required(),
                                                TiptapEditor::make('content')->label('Tab Content')->required(),
                                            ])
                                            ->addable()
                                            ->deletable()
                                            ->reorderable(),

                                            Repeater::make('carousel')
                                            ->label('Carousel Items (Optional)')
                                            ->schema([
                                                Repeater::make('images')
                                                    ->label('Images')
                                                    ->schema([
                                                        FileUpload::make('url')
                                                            ->label('Image')
                                                            ->image()
                                                            ->directory('file-manager/page/carousel'),
                                                        TextInput::make('alt')
                                                            ->label('Alt Text')
                                                            ->required(false),
                                                    ])
                                                    ->addable()
                                                    ->deletable()
                                                    ->reorderable(),
                                            ])
                                            ->addable()
                                            ->deletable()
                                            ->reorderable(),
                                    ])
                                    ->minItems(1)
                                    ->addable()
                                    ->deletable()
                                    ->reorderable()
                                    ->extraAttributes([
                                        'class' => 'bg-gray-200 text-gray-900 border border-gray-300 rounded-md p-2',
                                    ]),
                                ]),

                            // Tabs with Custom Styles
                            Block::make('tabs')
                            ->schema([
                                Repeater::make('items')
                                    ->label('Tab Items')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Tab Title')
                                            ->required()
                                            ->extraAttributes([
                                                'class' => 'bg-blue-100 text-blue-800 p-2 rounded-md',
                                            ]),
                                        TiptapEditor::make('content')
                                            ->label('Tab Content')
                                            ->required()
                                            ->directory('file-manager/page/content')
                                            ->extraAttributes([
                                                'class' => 'bg-white text-gray-700 p-3 rounded-md',
                                            ]),
                                        Repeater::make('accordion')
                                            ->label('Accordion Items (Optional)')
                                            ->schema([
                                                TextInput::make('heading')->label('Heading')->required(),
                                                TiptapEditor::make('body')->label('Body')->required(),
                                            ])
                                            ->addable()
                                            ->deletable()
                                            ->reorderable()
                                            ->extraAttributes([
                                                'class' => 'bg-white border p-2 rounded',
                                            ]),
                                    ])
                                    ->minItems(1)
                                    ->addable()
                                    ->deletable()
                                    ->reorderable()
                                    ->extraAttributes([
                                        'class' => 'bg-blue-200 text-blue-900 border border-blue-300 rounded-md p-2',
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('url')
                                    ->maxLength(255)
                                    ->url()
                                    ->placeholder('https://example.com')
                                    ->helperText('Provide a valid URL if needed.'),
                                Forms\Components\DatePicker::make('date')
                                    ->required()
                                    ->default(now())
                                    ->helperText('Select the relevant date.'),
                                Forms\Components\TimePicker::make('time')
                                    ->helperText('Optional: specify a time.'),
                            ]),
                         Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('author')
                                    ->maxLength(255)
                                    ->helperText('Provide a valid author if needed.'),
                                Forms\Components\TextInput::make('designation')
                                    ->helperText('Provide a valid designation if needed.'),
                                Forms\Components\TextInput::make('location')
                                    ->helperText('Provide a valid location if needed.')
                            ]),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->sortable()->searchable(),
                Tables\Columns\IconColumn::make('status')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}



