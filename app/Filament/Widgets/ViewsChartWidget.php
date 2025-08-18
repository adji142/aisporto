<?php

namespace App\Filament\Widgets;

use App\Models\View;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ViewsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Statistik View Harian';

    protected function getData(): array
    {
        $data = View::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as total')
            )
            ->where('created_at', '>=', now()->subDays(14))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Views',
                    'data' => $data->pluck('total')->toArray(),
                ],
            ],
            'labels' => $data->pluck('date')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    public function getColumnSpan(): int|string|array
    {
        return 'full'; // full = lebar 12 kolom
    }
}
