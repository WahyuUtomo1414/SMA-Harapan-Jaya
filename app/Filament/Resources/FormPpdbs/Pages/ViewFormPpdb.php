<?php

namespace App\Filament\Resources\FormPpdbs\Pages;

use App\Filament\Resources\FormPpdbs\FormPpdbResource;
use App\Models\FormPpdb;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFormPpdb extends ViewRecord
{
    protected static string $resource = FormPpdbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('terima')
                ->label('Terima Pendaftar')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Terima Pendaftaran')
                ->modalDescription('Apakah Anda yakin ingin menerima pendaftar ini?')
                ->modalSubmitActionLabel('Ya, Terima')
                ->visible(fn (): bool => $this->record->status_penerimaan !== FormPpdb::STATUS_DITERIMA)
                ->action(function (): void {
                    $this->record->update(['status_penerimaan' => FormPpdb::STATUS_DITERIMA]);
                    $this->refreshFormData(['status_penerimaan']);
                }),

            Action::make('tolak')
                ->label('Tolak Pendaftar')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Tolak Pendaftaran')
                ->modalDescription('Apakah Anda yakin ingin menolak pendaftar ini?')
                ->modalSubmitActionLabel('Ya, Tolak')
                ->visible(fn (): bool => $this->record->status_penerimaan !== FormPpdb::STATUS_DITOLAK)
                ->action(function (): void {
                    $this->record->update(['status_penerimaan' => FormPpdb::STATUS_DITOLAK]);
                    $this->refreshFormData(['status_penerimaan']);
                }),

            EditAction::make(),
        ];
    }
}
