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
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $pluralModelLabel = 'Site Setting';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // META INFO
            Forms\Components\Section::make('Meta & Informasi Dasar')
                ->schema([
                    Forms\Components\TextInput::make('site_title')
                        ->label('Site Title')
                        ->required(),

                    Forms\Components\Textarea::make('site_description')
                        ->label('Meta Description'),

                    Forms\Components\TextInput::make('site_tags')
                        ->label('Meta Tags (pisahkan dengan koma)'),
                ]),

            // HERO SECTION
            Forms\Components\Section::make('Hero Section')
                ->schema([
                    Forms\Components\TextInput::make('headline')
                        ->label('Headline'),

                    Forms\Components\TextInput::make('sub_headline')
                        ->label('Sub Headline'),

                    Forms\Components\FileUpload::make('favicon')
                        ->label('Favicon')
                        ->image()
                        ->directory('favicons'),

                    Forms\Components\Repeater::make('banners')
                        ->label('Banner Images')
                        ->relationship()
                        ->schema([
                            Forms\Components\FileUpload::make('image')
                                ->image()
                                ->required()
                                ->directory('banners'),
                        ])
                        ->defaultItems(1),
                ]),

            // KONTAK & LOKASI
            Forms\Components\Section::make('Kontak & Lokasi')
                ->schema([
                    Forms\Components\TextInput::make('contact_phone')
                        ->label('Telepon')
                        ->tel(),

                    Forms\Components\TextInput::make('contact_email')
                        ->label('Email')
                        ->email(),

                    Forms\Components\Textarea::make('contact_address')
                        ->label('Alamat'),

                    Forms\Components\TextInput::make('contact_hours')
                        ->label('Jam Operasional'),

                    Forms\Components\Textarea::make('map_embed')
                        ->label('Google Maps Embed')
                        ->helperText('Paste kode iframe dari Google Maps'),
                ]),

            // SOSIAL MEDIA
            Forms\Components\Section::make('Sosial Media')
                ->schema([
                    Forms\Components\TextInput::make('facebook_url')
                        ->label('Facebook')
                        ->url(),

                    Forms\Components\TextInput::make('twitter_url')
                        ->label('Twitter')
                        ->url(),

                    Forms\Components\TextInput::make('instagram_url')
                        ->label('Instagram')
                        ->url(),

                    Forms\Components\TextInput::make('linkedin_url')
                        ->label('LinkedIn')
                        ->url(),

                    Forms\Components\TextInput::make('youtube_url')
                        ->label('YouTube')
                        ->url(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_title')
                    ->label('Site Title'),

                Tables\Columns\TextColumn::make('headline')
                    ->label('Headline'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiteSettings::route('/'),
        ];
    }
}
