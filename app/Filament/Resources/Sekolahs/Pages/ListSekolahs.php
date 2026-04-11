<?php

namespace App\Filament\Resources\Sekolahs\Pages;

use App\Filament\Resources\Sekolahs\SekolahResource;
use Filament\Resources\Pages\ListRecords;

class ListSekolahs extends ListRecords
{
    protected static string $resource = SekolahResource::class;

    public function mount(): void
    {
        parent::mount();

        $record = static::getResource()::getEloquentQuery()->first();

        abort_unless($record, 404, 'Data sekolah belum tersedia.');

        $this->redirect(
            static::getResource()::getUrl('view', ['record' => $record]),
            navigate: true,
        );
    }
}
