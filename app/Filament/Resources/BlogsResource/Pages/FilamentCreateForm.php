<?php

namespace App\Filament\Resources\BlogsResource\Pages;

use Filament\Resources\Pages\CreateRecord;

class FilamentCreateForm extends CreateRecord
{
    public function mount($record = null): void
    {
        parent::mount();

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
        return 'filament.forms.' . static::class;
    }
}