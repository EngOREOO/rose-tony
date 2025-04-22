<?php

namespace App\Filament\Resources\FooterMenuItemResource\Pages;

use App\Filament\Resources\FooterMenuItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFooterMenuItem extends EditRecord
{
    protected static string $resource = FooterMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}