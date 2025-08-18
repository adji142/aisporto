<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form; // ✅ Form v3
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table; // ✅ Table v3
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'E-Commerce';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                Forms\Components\RichEditor::make('description'),
                Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->directory('products/thumbnails'),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('Rp'),
                Forms\Components\FileUpload::make('file_path')
                    ->directory('products/files')
                    ->label('File Produk'),
                Forms\Components\Select::make('type_id')
                    ->label('Tipe Produk')
                    ->relationship('type', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),
                
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
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('price')->money('IDR'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('views_count')
                    ->label('Views')
                    ->counts('views') // Filament v3 mendukung langsung menghitung relasi
                    ->sortable()
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
