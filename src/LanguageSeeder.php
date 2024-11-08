<?php

declare(strict_types=1);

namespace BaseCodeOy\GeoNames;

use Illuminate\Support\LazyCollection;

final class LanguageSeeder extends AbstractSeeder
{
    /**
     * {@inheritDoc}
     */
    protected function getRecords(): LazyCollection
    {
        return $this->dataSource->getLanguages();
    }

    /**
     * {@inheritDoc}
     */
    protected function getModel(): string
    {
        return Language::class;
    }

    /**
     * {@inheritDoc}
     */
    protected function getSyncKeyName(): array
    {
        return ['name', 'iso_639_1', 'iso_639_2', 'iso_639_3'];
    }

    /**
     * {@inheritDoc}
     */
    protected function mapAttributes(array $record): array
    {
        return [
            'name' => $record['Language Name'],
            'iso_639_1' => $record['ISO 639-1'] ?: null,
            'iso_639_2' => $record['ISO 639-2'] ?: null,
            'iso_639_3' => $record['ISO 639-3'],
        ];
    }
}
