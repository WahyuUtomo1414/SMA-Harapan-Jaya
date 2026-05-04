<?php

namespace App\Filament\Resources\PembayaranPpdbs\Pages;

use App\Filament\Resources\PembayaranPpdbs\PembayaranPpdbResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPembayaranPpdbs extends ListRecords
{
    protected static string $resource = PembayaranPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
