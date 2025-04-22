<?php

namespace App\Filament\Resources\ContactQuestionResource\Pages;

use App\Filament\Resources\ContactQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactQuestions extends ListRecords
{
    protected static string $resource = ContactQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
