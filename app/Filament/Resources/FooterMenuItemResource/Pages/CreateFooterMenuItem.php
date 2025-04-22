<?php

namespace App\Filament\Resources\FooterMenuItemResource\Pages;

use App\Filament\Resources\FooterMenuItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFooterMenuItem extends CreateRecord
{
    protected static string $resource = FooterMenuItemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}