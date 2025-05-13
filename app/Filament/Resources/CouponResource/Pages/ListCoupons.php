<?php

namespace App\Filament\Resources\CouponResource\Pages;

use App\Filament\Resources\CouponResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoupons extends ListRecords
{
    protected static string $resource = CouponResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('إضافة كوبون')
                ->modalHeading('إضافة كوبون جديد'),
        ];
    }

    public function getTitle(): string
    {
        return 'الكوبونات والخصومات';
    }
}