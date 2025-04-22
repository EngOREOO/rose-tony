<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getTodayOrders(): int
    {
        return Order::whereDate('created_at', Carbon::today())->count();
    }

    protected function getYesterdayOrders(): int
    {
        return Order::whereDate('created_at', Carbon::yesterday())->count();
    }

    protected function getLastWeekOrders(): int
    {
        return Order::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();
    }

    protected function getMonthOrders(): int
    {
        return Order::whereMonth('created_at', now()->month)->count();
    }

    protected function getRevenueGrowth(): string
    {
        $thisMonth = Order::whereMonth('created_at', now()->month)->sum('total');
        $lastMonth = Order::whereMonth('created_at', now()->subMonth()->month)->sum('total');

        if ($lastMonth == 0) {
            return '0.00%';
        }

        $growth = (($thisMonth - $lastMonth) / $lastMonth) * 100;
        return number_format($growth, 2) . '%';
    }

    protected function getExpectedRevenue(): float
    {
        return Order::whereMonth('created_at', now()->month)->sum('total');
    }

    protected function getSoldProductsCount(): int
    {
        return Order::sum('ordered_quantity');
    }

    protected function getTotalOrdersCount(): int
    {
        return Order::count();
    }

    protected function getCards(): array
    {
        return [
            Card::make('طلبات اليوم', $this->getTodayOrders())
                ->description('عدد الطلبات التي تم استلامها اليوم')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->color('primary'),

            Card::make('طلبات أمس', $this->getYesterdayOrders())
                ->description('عدد الطلبات التي تم استلامها أمس')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('gray'),

            Card::make('طلبات الأسبوع السابق', $this->getLastWeekOrders())
                ->description('عدد الطلبات التي تم استلامها الأسبوع الماضي')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning'),

            Card::make('طلبات الشهر', $this->getMonthOrders())
                ->description('عدد الطلبات التي تم استلامها هذا الشهر')
                ->descriptionIcon('heroicon-o-chart-bar')
                ->color('success'),

            Card::make('معدل زيادة المبيعات', $this->getRevenueGrowth())
                ->description('معدل زيادة المبيعات بناءً على البيانات الحالية')
                ->descriptionIcon('heroicon-o-presentation-chart-line')
                ->color('gray'),

            Card::make('التحصيل المتوقع', number_format($this->getExpectedRevenue(), 2))
                ->description('إجمالي التحصيل المتوقع')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('success'),

            Card::make('عدد المنتجات المباعة', $this->getSoldProductsCount())
                ->description('عدد المنتجات التي تم بيعها')
                ->descriptionIcon('heroicon-o-cube')
                ->color('primary'),

            Card::make('عدد الطلبات', $this->getTotalOrdersCount())
                ->description('عدد الطلبات التي تم استلامها')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('warning'),
        ];
    }
}
