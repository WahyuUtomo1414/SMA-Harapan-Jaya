<?php

namespace App\Filament\Resources\Spps\Pages;

use App\Filament\Resources\Spps\SppResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSpps extends ListRecords
{
    protected static string $resource = SppResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
