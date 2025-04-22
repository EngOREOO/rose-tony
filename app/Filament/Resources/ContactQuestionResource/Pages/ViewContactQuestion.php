<?php

namespace App\Filament\Resources\ContactQuestionResource\Pages;

use App\Filament\Resources\ContactQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContactQuestion extends ViewRecord
{
    protected static string $resource = ContactQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
