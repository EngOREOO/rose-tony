<?php

namespace App\Filament\Resources\FaqHelpSectionResource\Pages;

use App\Filament\Resources\FaqHelpSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaqHelpSection extends EditRecord
{
    protected static string $resource = FaqHelpSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
