<?php

namespace App\Filament\Resources\FaqHelpSectionResource\Pages;

use App\Filament\Resources\FaqHelpSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaqHelpSections extends ListRecords
{
    protected static string $resource = FaqHelpSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
