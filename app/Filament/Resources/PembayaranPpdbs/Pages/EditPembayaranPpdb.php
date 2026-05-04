<?php

namespace App\Filament\Resources\PembayaranPpdbs\Pages;

use App\Filament\Resources\PembayaranPpdbs\PembayaranPpdbResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPembayaranPpdb extends EditRecord
{
    protected static string $resource = PembayaranPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
