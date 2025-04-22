<?php

namespace App\Filament\Resources\ContactQuestionResource\Pages;

use App\Filament\Resources\ContactQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactQuestion extends EditRecord
{
    protected static string $resource = ContactQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
