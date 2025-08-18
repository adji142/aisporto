<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Portofolio';
    protected static ?string $pluralLabel = 'Daftar Portofolio';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('headline')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->reactive()
                ->afterStateUpdated(fn ($state, callable $set) =>
                    $set('slug', Str::slug($state))
                ),

            Forms\Components\RichEditor::make('description')
                ->label('Deskripsi')
                ->toolbarButtons([
                    'bold', 'italic', 'underline', 'strike', 'link',
                    'bulletList', 'orderedList', 'blockquote', 'codeBlock',
                    'h2', 'h3', 'image', 'table',
                ])
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('thumbnail')
                ->label('Thumbnail')
                ->image()
                ->directory('thumbnails')
                ->maxSize(2048), // 2MB

            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(Portfolio::class, 'slug', ignoreRecord: true),

            Forms\Components\TextInput::make('link')
                ->label('Sisipan Link')
                ->url()
                ->nullable(),

            Repeater::make('images')
                ->relationship()
                ->schema([
                    FileUpload::make('image')
                        ->image()
                        ->directory('portfolios/images')
                        ->required(),
                ])
                ->createItemButtonLabel('Tambah Gambar')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('headline')->searchable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')->square(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('views_count')
                    ->label('Views')
                    ->counts('views') // Filament v3 mendukung langsung menghitung relasi
                    ->sortable()
            ])
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
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}