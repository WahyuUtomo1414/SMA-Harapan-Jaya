<?php

namespace App\Filament\Resources\JadwalPelajarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class JadwalPelajaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mataPelajaran.nama')
                    ->label('Mata Pelajaran')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('kelas.kode')
                    ->label('Kelas')
                    ->searchable(),
                TextColumn::make('guru.nama')
                    ->label('Guru')
                    ->searchable(),
                TextColumn::make('hari')
                    ->badge(),
                TextColumn::make('mulai')
                    ->label('Mulai'),
                TextColumn::make('selesai')
                    ->label('Selesai'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Active' : 'Non Active'),
                TextColumn::make('createdBy.name')
                    ->label('Dibuat Oleh')
                    ->badge()
                    ->description(fn ($record) => $record->created_at?->format('d M Y H:i'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updatedBy.name')
                    ->label('Diubah Oleh')
                    ->badge()
                    ->description(fn ($record) => $record->updated_at?->format('d M Y H:i'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deletedBy.name')
                    ->label('Dihapus Oleh')
                    ->badge()
                    ->description(fn ($record) => $record->deleted_at?->format('d M Y H:i'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
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
            ]);
    }
}
