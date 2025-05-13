<?php

namespace App\Traits;

trait FormDataPersistence
{
    protected function fillForm(): void
    {
        parent::fillForm();

        if ($data = session()->get($this->getFormStateCacheKey())) {
            $this->form->fill($data);
        }
    }

    public function save(bool $shouldRedirect = true): mixed
    {
        session()->forget($this->getFormStateCacheKey());
        return parent::save($shouldRedirect);
    }

    protected function cacheFormState(): void 
    {
        session()->put($this->getFormStateCacheKey(), $this->form->getState());
    }

    protected function getFormStateCacheKey(): string
    {
        $name = class_basename(static::class);
        return $name . '_form_data_' . ($this->record?->id ?? 'create');
    }

    public function boot(): void
    {
        parent::boot();
        $this->cacheFormState();
    }
}