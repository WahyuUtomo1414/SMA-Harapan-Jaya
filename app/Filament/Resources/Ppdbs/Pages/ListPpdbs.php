<?php

namespace App\Filament\Resources\Ppdbs\Pages;

use App\Filament\Resources\Ppdbs\PpdbResource;
use Filament\Resources\Pages\ListRecords;

class ListPpdbs extends ListRecords
{
    protected static string $resource = PpdbResource::class;

    public function mount(): void
    {
        parent::mount();

        $record = static::getResource()::getEloquentQuery()->first();

        abort_unless($record, 404, 'Data PPDB belum tersedia.');

        $this->redirect(
            static::getResource()::getUrl('view', ['record' => $record]),
            navigate: true,
        );
    }
}
