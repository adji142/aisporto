<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ViewStatsWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Blog Views', \App\Models\View::where('viewable_type', Blog::class)->count())
                ->description('Jumlah semua view di blog')
                ->descriptionIcon('heroicon-o-eye')
                ->color('success'),

            Card::make('Total Portfolio Views', \App\Models\View::where('viewable_type', Portfolio::class)->count())
                ->description('Jumlah semua view di portfolio')
                ->descriptionIcon('heroicon-o-eye')
                ->color('primary'),

            Card::make('Total Product Views', \App\Models\View::where('viewable_type', Product::class)->count())
                ->description('Jumlah semua view di produk')
                ->descriptionIcon('heroicon-o-eye')
                ->color('warning'),
        ];
    }
}
