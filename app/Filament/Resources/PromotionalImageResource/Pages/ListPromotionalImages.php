<?php

namespace App\Filament\Resources\PromotionalImageResource\Pages;

use App\Filament\Resources\PromotionalImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPromotionalImages extends ListRecords
{
    protected static string $resource = PromotionalImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}