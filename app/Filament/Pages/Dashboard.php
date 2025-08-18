<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            // Hanya widget yang kamu mau
            \App\Filament\Widgets\ViewStatsWidget::class,
            \App\Filament\Widgets\ViewsChartWidget::class,
        ];
    }
}
