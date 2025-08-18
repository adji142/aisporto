<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $modelLabel = 'Service';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Layanan')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            if ($state) $set('slug', Str::slug($state));
                        }),

                    Forms\Components\TextInput::make('slug')
                        ->unique(ignoreRecord: true)
                        ->required(),

                    Forms\Components\Textarea::make('summary')
                        ->label('Deskripsi Singkat')
                        ->rows(3)
                        ->maxLength(160)
                        ->hint('Maks 160 karakter'),

                    Forms\Components\RichEditor::make('description')
                        ->label('Deskripsi Panjang')
                        ->columnSpanFull(),
                ])->columns(2),

            Forms\Components\Section::make('Icon')
                ->schema([
                    Forms\Components\Select::make('icon_type')
                        ->options([
                            'emoji' => 'Emoji',
                            'icon'  => 'Nama Icon (heroicon/lucide)',
                            'image' => 'Gambar',
                        ])
                        ->required()
                        ->reactive(),

                    Forms\Components\TextInput::make('icon')
                        ->label('Emoji / Nama Icon')
                        ->helperText('Contoh emoji: 🔧 • Contoh nama icon: heroicon-o-code atau lucide-code')
                        ->visible(fn ($get) => in_array($get('icon_type'), ['emoji','icon'])),

                    Forms\Components\FileUpload::make('icon_image')
                        ->label('Gambar Icon')
                        ->image()
                        ->directory('services/icons')
                        ->visible(fn ($get) => $get('icon_type') === 'image'),
                ])->columns(2),

            Forms\Components\Section::make('Tampilan & CTA')
                ->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),

                    Forms\Components\TextInput::make('sort')
                        ->numeric()
                        ->label('Urutan'),

                    Forms\Components\TextInput::make('cta_label')
                        ->label('Label Tombol')
                        ->placeholder('Pelajari'),

                    Forms\Components\TextInput::make('cta_url')
                        ->label('URL Tombol')
                        ->placeholder('/contact'),
                ])->columns(4),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('summary')->limit(40),
                Tables\Columns\TextColumn::make('sort')->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('sort')
            ->reorderable('sort') // drag & drop urutan
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit'   => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
