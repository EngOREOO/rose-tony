<?php

namespace App\Filament\Resources\HomeCategoryResource\Pages;

use App\Filament\Resources\HomeCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeCategory extends CreateRecord
{
    protected static string $resource = HomeCategoryResource::class;
}
