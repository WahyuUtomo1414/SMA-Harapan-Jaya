<?php

namespace App\Filament\Resources\FormPpdbs\Pages;

use App\Filament\Resources\FormPpdbs\FormPpdbResource;
use App\Models\FormPpdb;
use App\Mail\PpdbAccepted;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Otomatisasi: Jika status pembayaran diubah jadi lunas, status penerimaan menjadi diterima
        if (
            isset($data['status_pembayaran']) && 
            $data['status_pembayaran'] === FormPpdb::PEMBAYARAN_LUNAS &&
            $this->record->status_pembayaran !== FormPpdb::PEMBAYARAN_LUNAS
        ) {
            $data['status_penerimaan'] = FormPpdb::STATUS_DITERIMA;
        }

        return $data;
    }

    protected function afterSave(): void
    {
        // Push Notif Email bila lunas
        if ($this->record->wasChanged('status_pembayaran') && $this->record->status_pembayaran === FormPpdb::PEMBAYARAN_LUNAS) {
            if (!empty($this->record->email)) {
                Mail::to($this->record->email)->send(new PpdbAccepted($this->record));
            }
        }
    }
}
