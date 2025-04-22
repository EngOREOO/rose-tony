<?php

namespace App\Filament\Resources\HomeSettingResource\Pages;

use App\Filament\Resources\HomeSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeSetting extends EditRecord
{
    protected static string $resource = HomeSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('حذف'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'تم تحديث إعدادات الصفحة الرئيسية بنجاح';
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['feature_items'])) {
            $data['feature_items'] = [];
        }

        return $data;
    }
}