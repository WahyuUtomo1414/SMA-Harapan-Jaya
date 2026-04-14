<?php

namespace App\Filament\Resources\FormPpdbs\Pages;

use App\Filament\Resources\FormPpdbs\FormPpdbResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFormPpdb extends EditRecord
{
    protected static string $resource = FormPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
