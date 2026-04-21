<?php

namespace App\Filament\Resources\FormPpdbs\Tables;

use App\Models\FormPpdb;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class FormPpdbsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('nisn')
                    ->label('NISN')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('asal_sekolah')
                    ->label('Asal Sekolah')
                    ->searchable(),

                TextColumn::make('jurusan')
                    ->label('Jurusan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'IPA' => 'info',
                        'IPS' => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('no_hp')
                    ->label('No. HP')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('status_pembayaran')
                    ->label('Status Pembayaran')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        FormPpdb::PEMBAYARAN_LUNAS => 'success',
                        FormPpdb::PEMBAYARAN_MENUNGGU_KONFIRMASI  => 'warning',
                        default    => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        FormPpdb::PEMBAYARAN_LUNAS => 'Lunas',
                        FormPpdb::PEMBAYARAN_MENUNGGU_KONFIRMASI  => 'Menunggu Konfirmasi',
                        default    => 'Belum Bayar',
                    })
                    ->sortable(),

                TextColumn::make('status_penerimaan')
                    ->label('Status Penerimaan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        FormPpdb::STATUS_DITERIMA => 'success',
                        FormPpdb::STATUS_DITOLAK  => 'danger',
                        default    => 'warning',  // pending
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        FormPpdb::STATUS_DITERIMA => 'Diterima',
                        FormPpdb::STATUS_DITOLAK  => 'Ditolak',
                        default    => 'Menunggu',
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('createdBy.name')
                    ->label('Dibuat Oleh')
                    ->badge()
                    ->description(fn ($record) => $record->created_at?->format('d M Y H:i'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status_penerimaan')
                    ->label('Status Penerimaan')
                    ->options([
                        FormPpdb::STATUS_PENDING  => 'Menunggu',
                        FormPpdb::STATUS_DITERIMA => 'Diterima',
                        FormPpdb::STATUS_DITOLAK  => 'Ditolak',
                    ])
                    ->native(false),

                SelectFilter::make('jurusan')
                    ->label('Jurusan')
                    ->options([
                        'IPA' => 'IPA',
                        'IPS' => 'IPS',
                    ])
                    ->native(false),

                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Lihat'),

                Action::make('terima')
                    ->label('Terima')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Terima Pendaftaran')
                    ->modalDescription('Apakah Anda yakin ingin menerima pendaftar ini?')
                    ->modalSubmitActionLabel('Ya, Terima')
                    ->visible(fn (FormPpdb $record): bool => $record->status_penerimaan !== FormPpdb::STATUS_DITERIMA)
                    ->action(fn (FormPpdb $record) => $record->update(['status_penerimaan' => FormPpdb::STATUS_DITERIMA])),

                Action::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Pendaftaran')
                    ->modalDescription('Apakah Anda yakin ingin menolak pendaftar ini?')
                    ->modalSubmitActionLabel('Ya, Tolak')
                    ->visible(fn (FormPpdb $record): bool => $record->status_penerimaan !== FormPpdb::STATUS_DITOLAK)
                    ->action(fn (FormPpdb $record) => $record->update(['status_penerimaan' => FormPpdb::STATUS_DITOLAK])),

                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
