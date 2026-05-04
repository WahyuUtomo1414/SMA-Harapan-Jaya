<?php

namespace App\Filament\Resources\Ppdbs\Pages;

use App\Filament\Resources\Ppdbs\PpdbResource;
use App\Filament\Resources\Ppdbs\Schemas\PpdbForm;
use Filament\Resources\Pages\CreateRecord;

class CreatePpdb extends CreateRecord
{
    protected static string $resource = PpdbResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return PpdbForm::mutateDataBeforeSave($data);
    }
}
