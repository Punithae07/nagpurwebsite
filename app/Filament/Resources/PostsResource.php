<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostsResource\Pages;
use App\Filament\Resources\PostsResource\RelationManagers;
use App\Models\Posts;
use Filament\Forms;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\Enums\TiptapOutput;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Awcodes\Curator\Components\Forms\CuratorPicker as FormsCuratorPicker;

class PostsResource extends Resource
{
    protected static ?string $model = Posts::class;
    protected static string $icon = 'heroicon-o-document-text';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'CMS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->readOnly(),
                Forms\Components\Textarea::make('excerpt')
                    ->columnSpanFull(),
                // FormsCuratorPicker::make('feature_image')
                //     ->directory('file-manager/post/feature_image')
                //     ->preserveFilenames()
                //     ->maxSize(1024 * 2),
                Forms\Components\FileUpload::make('feature_image')
                    ->image()
                    ->imageEditor()
                    ->directory('file-manager/post/feature_image')
                    ->preserveFilenames()
                    ->maxSize(1024 * 2),
                Forms\Components\Select::make('categories')
                    ->relationship('categories', 'name')
                    ->required()
                    ->preload()
                    ->multiple()
                    ->columns(2),

                Forms\Components\TextInput::make('author')
                    ->maxLength(255)
                    ->default(null),
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
                Forms\Components\Toggle::make('status')
                    ->required(),
                Forms\Components\TextInput::make('order_by')
                    ->numeric()
                    ->default(null),
                Forms\Components\DatePicker::make('publish_date')
                    ->required()
                    ->default(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('feature_image'),
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug_url')
                    ->icon('heroicon-o-clipboard')
                    ->tooltip('Copy Link')
                    ->limit(20)
                    ->label('Link')
                    ->copyable()
                    ->copyMessage('Link copied'),
                // Tables\Columns\ImageColumn::make('featuredImage.path'),
                Tables\Columns\TextColumn::make('category_names')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('author')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),

                Tables\Columns\TextColumn::make('publish_date')
                    ->date()
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePosts::route('/create'),
            'edit' => Pages\EditPosts::route('/{record}/edit'),
        ];
    }
    
}


