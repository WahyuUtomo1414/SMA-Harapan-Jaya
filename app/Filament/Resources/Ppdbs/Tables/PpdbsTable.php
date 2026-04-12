<?php

namespace App\Filament\Resources\Ppdbs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PpdbsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('brosur')
                    ->label('Brosur')
                    ->disk('public')
                    ->circular(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('alur_ppdb')
                    ->label('Alur')
                    ->formatStateUsing(fn ($state): string => count($state ?? []) . ' item')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('persyaratan')
                    ->label('Persyaratan')
                    ->formatStateUsing(fn ($state): string => count($state ?? []) . ' item')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('timeline')
                    ->label('Timeline')
                    ->formatStateUsing(fn ($state): string => count($state ?? []) . ' item')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('kontak')
                    ->label('Kontak')
                    ->formatStateUsing(fn ($state): string => count($state ?? []) . ' item')
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
