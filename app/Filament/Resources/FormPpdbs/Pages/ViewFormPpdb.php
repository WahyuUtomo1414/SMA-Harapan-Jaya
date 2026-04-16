<?php

namespace App\Filament\Resources\FormPpdbs\Pages;

use App\Filament\Resources\FormPpdbs\FormPpdbResource;
use App\Models\FormPpdb;
use App\Mail\PpdbAccepted;
use App\Mail\PpdbRejected;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

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
                    
                    Notification::make()
                        ->title('Status Diperbarui')
                        ->body('Pendaftar telah diterima.')
                        ->success()
                        ->send();
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

                    Notification::make()
                        ->title('Status Diperbarui')
                        ->body('Pendaftar telah ditolak.')
                        ->danger()
                        ->send();
                }),

            Action::make('sendAcceptedEmail')
                ->label('Kirim Email Diterima')
                ->icon('heroicon-o-envelope')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Kirim Email Pengumuman')
                ->modalDescription('Kirim email pemberitahuan bahwa siswa ini diterima?')
                ->visible(fn (): bool => 
                    $this->record->status_penerimaan === FormPpdb::STATUS_DITERIMA && 
                    !empty($this->record->email)
                )
                ->action(function (): void {
                    Mail::to($this->record->email)->send(new PpdbAccepted($this->record));

                    Notification::make()
                        ->title('Email Terkirim')
                        ->body('Email pengumuman diterima telah dikirim ke ' . $this->record->email)
                        ->success()
                        ->send();
                }),

            Action::make('sendRejectedEmail')
                ->label('Kirim Email Ditolak')
                ->icon('heroicon-o-envelope')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Kirim Email Pengumuman')
                ->modalDescription('Kirim email pemberitahuan bahwa siswa ini belum dapat diterima?')
                ->visible(fn (): bool => 
                    $this->record->status_penerimaan === FormPpdb::STATUS_DITOLAK && 
                    !empty($this->record->email)
                )
                ->action(function (): void {
                    Mail::to($this->record->email)->send(new PpdbRejected($this->record));

                    Notification::make()
                        ->title('Email Terkirim')
                        ->body('Email pemberitahuan ditolak telah dikirim ke ' . $this->record->email)
                        ->success()
                        ->send();
                }),

            EditAction::make(),
        ];
    }
}
