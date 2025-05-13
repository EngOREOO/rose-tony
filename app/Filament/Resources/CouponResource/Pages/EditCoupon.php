<?php

namespace App\Filament\Resources\CouponResource\Pages;

use App\Filament\Resources\CouponResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoupon extends EditRecord
{
    protected static string $resource = CouponResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('حذف الكوبون')
                ->modalHeading('حذف الكوبون')
                ->modalDescription('هل أنت متأكد من حذف هذا الكوبون؟')
                ->modalSubmitActionLabel('نعم، احذف الكوبون')
                ->modalCancelActionLabel('إلغاء'),
        ];
    }

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getTitle(): string
    {
        return 'تعديل الكوبون';
    }

    public function getSavedNotificationTitle(): ?string
    {
        return 'تم تحديث الكوبون بنجاح';
    }
}