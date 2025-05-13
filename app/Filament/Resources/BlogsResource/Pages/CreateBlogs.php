<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use App\Filament\Resources\BlogsResource;
use Filament\Actions;

class CreateBlogs extends FilamentCreateForm
{
    protected static string $resource = BlogsResource::class;

    public function isCachingForms(): bool
    {
        return true;
    }
}
