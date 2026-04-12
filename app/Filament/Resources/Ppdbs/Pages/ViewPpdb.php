<?php

namespace App\Filament\Resources\Ppdbs\Pages;

use App\Filament\Resources\Ppdbs\PpdbResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPpdb extends ViewRecord
{
    protected static string $resource = PpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

