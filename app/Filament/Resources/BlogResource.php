<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Blog';
    protected static ?string $pluralLabel = 'Daftar Blog';

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
            Forms\Components\Select::make('category_id')
            ->label('Kategori')
            ->relationship('category', 'name')
            ->searchable()
            ->preload()
            ->required(),
            Forms\Components\RichEditor::make('content')
                ->label('Isi Blog')
                ->toolbarButtons([
                    'bold', 'italic', 'underline', 'strike', 'link',
                    'bulletList', 'orderedList', 'blockquote', 'codeBlock',
                    'h2', 'h3', 'image', 'table',
                ])
                ->columnSpanFull(),

            Forms\Components\FileUpload::make('thumbnail')
                ->label('Thumbnail')
                ->image()
                ->directory('thumbnails/blog')
                ->maxSize(2048),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(Blog::class, 'slug', ignoreRecord: true),

            Forms\Components\TagsInput::make('tags')
                ->label('Tag SEO')
                ->placeholder('Tambah tag...'),
            Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archive' => 'Archive',
                    ])
                    ->default('draft')
                    ->required()
                    ->native(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->sortable()
                ->colors([
                    'secondary' => 'draft',
                    'success' => 'published',
                    'danger' => 'archive',
                ]),
                Tables\Columns\TextColumn::make('headline')->searchable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label('Kategori'),
                Tables\Columns\ImageColumn::make('thumbnail')->square(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TagsColumn::make('tags'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('views_count')
                    ->label('Views')
                    ->counts('views') // Filament v3 mendukung langsung menghitung relasi
                    ->sortable()
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter by Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archive' => 'Archive',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make('set_draft')
                    ->label('Set Draft')
                    ->icon('heroicon-o-pencil')
                    ->requiresConfirmation()
                    ->action(fn ($records) => $records->each->update(['status' => 'draft'])),

                Tables\Actions\BulkAction::make('set_published')
                    ->label('Set Published')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(fn ($records) => $records->each->update(['status' => 'published'])),

                Tables\Actions\BulkAction::make('set_archive')
                    ->label('Set Archive')
                    ->icon('heroicon-o-archive-box')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(fn ($records) => $records->each->update(['status' => 'archive'])),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
