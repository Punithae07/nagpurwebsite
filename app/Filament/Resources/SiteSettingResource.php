<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Website CMS';
    protected static ?string $navigationLabel = 'Contact & Footer';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Settings')->tabs([
                Forms\Components\Tabs\Tab::make('Branding')->schema([
                    Forms\Components\TextInput::make('site_name')->required(),
                    Forms\Components\TextInput::make('site_tagline'),
                    Forms\Components\TextInput::make('brand_prefix'),
                    Forms\Components\FileUpload::make('logo')->disk('public')->directory('site/settings')->image(),
                    Forms\Components\FileUpload::make('footer_logo')->disk('public')->directory('site/settings')->image(),
                ])->columns(2),
                Forms\Components\Tabs\Tab::make('Contact')->schema([
                    Forms\Components\TextInput::make('top_address'),
                    Forms\Components\TextInput::make('top_email'),
                    Forms\Components\TextInput::make('top_phone'),
                    Forms\Components\TextInput::make('top_website'),
                    Forms\Components\Textarea::make('address')->rows(3),
                    Forms\Components\TextInput::make('phone_primary'),
                    Forms\Components\TextInput::make('phone_secondary'),
                    Forms\Components\TextInput::make('email_primary'),
                    Forms\Components\TextInput::make('email_secondary'),
                    Forms\Components\TextInput::make('website'),
                    Forms\Components\Textarea::make('google_map_iframe')->rows(5)->columnSpanFull(),
                ])->columns(2),
                Forms\Components\Tabs\Tab::make('Footer')->schema([
                    Forms\Components\Textarea::make('footer_about')->rows(4)->columnSpanFull(),
                    Forms\Components\TextInput::make('footer_copyright')->columnSpanFull(),
                    Forms\Components\Repeater::make('social_links')->schema([
                        Forms\Components\TextInput::make('label')->required(),
                        Forms\Components\TextInput::make('url')->required(),
                        Forms\Components\TextInput::make('icon')->required(),
                        Forms\Components\Select::make('target')->options(['_self' => 'Same Tab', '_blank' => 'New Tab'])->default('_blank'),
                    ])->columnSpanFull(),
                ]),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('site_name')->searchable(),
            Tables\Columns\TextColumn::make('phone_primary'),
            Tables\Columns\TextColumn::make('email_primary'),
            Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([]);
    }

    public static function canCreate(): bool
    {
        return SiteSetting::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}