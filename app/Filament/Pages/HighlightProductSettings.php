<?php

namespace App\Filament\Pages;

use App\Models\HighlightProduct;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class HighlightProductSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Highlight Product';
    protected static ?string $navigationGroup = 'Landing Page';
    protected static ?string $slug = 'highlight-product';
    protected static string $view = 'filament.pages.highlight-product-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $record = HighlightProduct::firstOrCreate(['id' => 1]);

        // Isi form dengan data dari database
        $this->form->fill($record->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Produk')
                    ->required(),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required(),

                Forms\Components\Textarea::make('short_description')
                    ->label('Deskripsi Singkat')
                    ->rows(3),

                Forms\Components\RichEditor::make('description')
                    ->label('Deskripsi Lengkap')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Produk')
                    ->image()
                    ->directory('highlight-products')
                    ->visibility('public'),

                Forms\Components\TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $record = HighlightProduct::firstOrCreate(['id' => 1]);
        $record->update($this->form->getState());

        Notification::make()
        ->title('Highlight product updated successfully')
        ->success()
        ->send();
    }
}
