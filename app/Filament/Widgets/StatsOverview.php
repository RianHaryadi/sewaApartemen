<?php

namespace App\Filament\Widgets;

use App\Models\Unit;
use App\Models\Booking;
use App\Models\Reservation;
use App\Models\ContactLead;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalUnits = Unit::count();
        $rentedCount = Unit::where('listing_type', 'rent')->where('status', 'booked')->count();
        $totalRentUnits = Unit::where('listing_type', 'rent')->count();
        
        $occupancyRate = $totalRentUnits > 0 
            ? round(($rentedCount / $totalRentUnits) * 100, 1) 
            : 0;

        return [
            Stat::make('Okupansi Sewa', $occupancyRate . '%')
                ->description("{$rentedCount} dari {$totalRentUnits} unit sewa terisi")
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color($occupancyRate > 70 ? 'success' : ($occupancyRate > 40 ? 'warning' : 'danger')),

            Stat::make('Total Unit Apartemen', $totalUnits)
                ->description(
                    Unit::where('listing_type', 'rent')->count() . ' Sewa | ' . 
                    Unit::where('listing_type', 'sell')->count() . ' Jual'
                )
                ->descriptionIcon('heroicon-m-home-modern')
                ->color('info'),

            Stat::make('Booking Aktif', Booking::where('status', 'pending')->count())
                ->description('Menunggu konfirmasi pembayaran/berkas')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Permintaan Kontak & Leads', ContactLead::count())
                ->description('Total leads masuk dari front-end')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('primary'),
        ];
    }
}
