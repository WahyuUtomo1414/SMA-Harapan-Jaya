<?php

namespace App\Filament\Resources\AlurPpdbs\Pages;

use App\Filament\Resources\AlurPpdbs\AlurPpdbResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditAlurPpdb extends EditRecord
{
    protected static string $resource = AlurPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
