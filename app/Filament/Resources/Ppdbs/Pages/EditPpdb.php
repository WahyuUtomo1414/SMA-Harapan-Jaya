<?php

namespace App\Filament\Resources\Ppdbs\Pages;

use App\Filament\Resources\Ppdbs\PpdbResource;
use Filament\Resources\Pages\EditRecord;

class EditPpdb extends EditRecord
{
    protected static string $resource = PpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
