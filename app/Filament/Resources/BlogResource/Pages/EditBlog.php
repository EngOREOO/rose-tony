<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('view')
                ->url(fn () => route('blogs.show', $this->record->slug))
                ->openUrlInNewTab(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($this->record->category_id !== $data['category_id']) {
            // Update old category posts count
            if ($this->record->category) {
                $this->record->category->updatePostsCount();
            }
        }

        return $data;
    }

    protected function afterSave(): void
    {
        // Update new category posts count
        if ($this->record->category) {
            $this->record->category->updatePostsCount();
        }
    }
}