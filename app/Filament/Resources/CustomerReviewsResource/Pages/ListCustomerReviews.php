<?php

namespace App\Filament\Resources\CustomerReviewsResource\Pages;

use App\Filament\Resources\CustomerReviewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomerReviews extends ListRecords
{
    protected static string $resource = CustomerReviewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
