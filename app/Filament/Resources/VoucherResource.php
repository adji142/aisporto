<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoucherResource\Pages;
use App\Models\Voucher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VoucherResource extends Resource
{
    protected static ?string $model = Voucher::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationGroup = 'E-Commerce';
    protected static ?string $modelLabel = 'Voucher';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->label('Kode Voucher')
                    ->unique(ignoreRecord: true)
                    ->required(),

                Forms\Components\Select::make('discount_type')
                    ->label('Tipe Diskon')
                    ->options([
                        'percent' => 'Persentase (%)',
                        'amount' => 'Nominal (Rp)',
                    ])
                    ->required()
                    ->reactive(),

                Forms\Components\TextInput::make('discount_value')
                    ->label('Nilai Diskon')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('max_discount_amount')
                    ->label('Maksimal Potongan (Rp)')
                    ->numeric()
                    ->visible(fn ($get) => $get('discount_type') === 'percent'),

                Forms\Components\TextInput::make('usage_limit')
                    ->label('Batas Pemakaian')
                    ->numeric()
                    ->nullable(),

                Forms\Components\DateTimePicker::make('start_date')
                    ->label('Mulai Berlaku'),

                Forms\Components\DateTimePicker::make('end_date')
                    ->label('Berakhir'),

                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Kode'),
                Tables\Columns\TextColumn::make('discount_type')->label('Tipe'),
                Tables\Columns\TextColumn::make('discount_value')->label('Nilai Diskon'),
                Tables\Columns\TextColumn::make('max_discount_amount')->label('Max Potongan'),
                Tables\Columns\TextColumn::make('usage_limit')->label('Limit Pemakaian'),
                Tables\Columns\TextColumn::make('used_count')->label('Terpakai'),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Aktif'),
                Tables\Columns\TextColumn::make('start_date')->dateTime(),
                Tables\Columns\TextColumn::make('end_date')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVouchers::route('/'),
            'create' => Pages\CreateVoucher::route('/create'),
            'edit' => Pages\EditVoucher::route('/{record}/edit'),
        ];
    }
}
