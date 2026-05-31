<?php

namespace App\Filament\Widgets;

use App\Models\Unit;
use Filament\Widgets\ChartWidget as BaseWidget;

class UnitStatusChart extends BaseWidget
{
    protected ?string $heading = 'Status Unit Apartemen';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $available = Unit::where('status', 'available')->count();
        $booked = Unit::where('status', 'booked')->count();
        $sold = Unit::where('status', 'sold')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Unit',
                    'data' => [$available, $booked, $sold],
                    'backgroundColor' => [
                        '#10b981',
                        '#f59e0b',
                        '#ef4444',
                    ],
                ],
            ],
            'labels' => ['Tersedia (Available)', 'Dipesan (Booked)', 'Terjual (Sold)'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
