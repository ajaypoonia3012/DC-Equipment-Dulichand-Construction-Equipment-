<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\ClientReference;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalProducts = Product::count();
        $chemicalSolutions = Product::whereHas('category', function ($q) {
            $q->where('type', 'chemicals');
        })->count();
        $equipmentSpares = Product::whereHas('category', function ($q) {
            $q->where('type', 'equipment');
        })->count();
        $totalServices = Service::count();
        $totalClients = ClientReference::count();
        $newEnquiries = Enquiry::where('status', 'new')->count();

        return [
            Stat::make('Equipment Spares & Parts', $equipmentSpares)
                ->description('Batching plants, pumps & mixers')
                ->descriptionIcon('heroicon-m-cog-6-tooth')
                ->color('primary'),

            Stat::make('DCP Chemical Solutions', $chemicalSolutions)
                ->description('PCE plasticisers, grouts, waterproofing')
                ->descriptionIcon('heroicon-m-beaker')
                ->color('success'),

            Stat::make('Engineering Services', $totalServices)
                ->description('Workshop & on-site field repairs')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->color('info'),

            Stat::make('Client References', $totalClients)
                ->description('MEIL, JK Lakshmi, KEC & more')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('gray'),

            Stat::make('Pending Leads / Quotes', $newEnquiries)
                ->description($newEnquiries > 0 ? 'Requires follow-up review' : 'All inquiries addressed')
                ->descriptionIcon('heroicon-m-inbox-arrow-down')
                ->color($newEnquiries > 0 ? 'warning' : 'success'),
        ];
    }
}
