<?php

namespace App\Filament\Resources\Ppdbs\Pages;

use App\Filament\Resources\Ppdbs\PpdbResource;
use App\Filament\Resources\Ppdbs\Schemas\PpdbForm;
use Filament\Resources\Pages\EditRecord;

class EditPpdb extends EditRecord
{
    protected static string $resource = PpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return PpdbForm::mutateDataBeforeFill($data);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return PpdbForm::mutateDataBeforeSave($data);
    }
}
