<?php

namespace App\Filament\Resources\AlurPpdbs\Pages;

use App\Filament\Resources\AlurPpdbs\AlurPpdbResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAlurPpdbs extends ListRecords
{
    protected static string $resource = AlurPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
