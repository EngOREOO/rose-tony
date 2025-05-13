<?php

namespace App\Filament\Resources\PromotionalImageResource\Pages;

use App\Filament\Resources\PromotionalImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromotionalImage extends EditRecord
{
    protected static string $resource = PromotionalImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}