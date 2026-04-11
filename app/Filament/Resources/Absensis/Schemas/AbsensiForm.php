<?php

namespace App\Filament\Resources\Absensis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AbsensiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('jadwal_pelajaran_id')
                    ->label('Jadwal Pelajaran')
                    ->relationship('jadwalPelajaran', 'id')
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->mataPelajaran?->nama} - {$record->kelas?->kode} ({$record->hari})")
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('guru_id')
                    ->label('Guru')
                    ->relationship('guru', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),
                DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        true => 'Active',
                        false => 'Non Active',
                    ])
                    ->native(false)
                    ->required(),
            ]);
    }
}
