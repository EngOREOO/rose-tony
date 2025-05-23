<?php

namespace App\Filament\Resources\HomeCategoryResource\Pages;

use App\Filament\Resources\HomeCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHomeCategory extends EditRecord
{
    protected static string $resource = HomeCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
