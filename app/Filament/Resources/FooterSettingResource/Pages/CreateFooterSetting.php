<?php

namespace App\Filament\Resources\FooterSettingResource\Pages;

use App\Filament\Resources\FooterSettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFooterSetting extends CreateRecord
{
    protected static string $resource = FooterSettingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}