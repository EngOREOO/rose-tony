<?php

namespace App\Filament\Resources\ProductReviewResource\Pages;

use App\Filament\Resources\ProductReviewResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductReview extends ViewRecord
{
    protected static string $resource = ProductReviewResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('approve')
                ->action(fn () => $this->record->update(['status' => 'approved']))
                ->requiresConfirmation()
                ->color('success')
                ->icon('heroicon-s-check')
                ->visible(fn () => $this->record->status === 'pending'),
            Actions\Action::make('reject')
                ->action(fn () => $this->record->update(['status' => 'rejected']))
                ->requiresConfirmation()
                ->color('danger')
                ->icon('heroicon-s-x-mark')
                ->visible(fn () => $this->record->status === 'pending'),
        ];
    }
}