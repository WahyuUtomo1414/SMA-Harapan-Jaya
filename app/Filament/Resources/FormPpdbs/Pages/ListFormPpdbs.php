<?php

namespace App\Filament\Resources\FormPpdbs\Pages;

use App\Filament\Resources\FormPpdbs\FormPpdbResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFormPpdbs extends ListRecords
{
    protected static string $resource = FormPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
