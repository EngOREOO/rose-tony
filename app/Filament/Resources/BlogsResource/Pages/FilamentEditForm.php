<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use Filament\Resources\Pages\EditRecord;

class FilamentEditForm extends EditRecord
{
    public function mount($record): void
    {
        parent::mount($record);

        if ($data = $this->session()->get($this->getSessionKey())) {
            $this->form->fill($data);
        }
    }

    public function dehydrate(): void
    {
        parent::dehydrate();

        if (!$this->isCachingForms()) {
            return;
        }

        $this->session()->put(
            $this->getSessionKey(),
            $this->form->getState(shouldIncludeDefaultValues: false)
        );
    }

    public function getSessionKey(): string
    {
        return 'filament.forms.' . static::class . '.' . $this->record->id;
    }
}