<?php

namespace App\Filament\Resources\FooterMenuItemResource\Pages;

use App\Filament\Resources\FooterMenuItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFooterMenuItems extends ListRecords
{
    protected static string $resource = FooterMenuItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}