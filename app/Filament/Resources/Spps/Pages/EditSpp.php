<?php

namespace App\Filament\Resources\Spps\Pages;

use App\Filament\Resources\Spps\SppResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSpp extends EditRecord
{
    protected static string $resource = SppResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            RestoreAction::make(),
            ForceDeleteAction::make(),
        ];
    }
}
