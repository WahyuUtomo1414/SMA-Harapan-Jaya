<?php

namespace App\Filament\Resources\JadwalPelajarans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class JadwalPelajaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('mata_pelajaran_id')
                    ->label('Mata Pelajaran')
                    ->relationship('mataPelajaran', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'kode')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('guru_id')
                    ->label('Guru')
                    ->relationship('guru', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('hari')
                    ->label('Hari')
                    ->options([
                        'Senin' => 'Senin',
                        'Selasa' => 'Selasa',
                        'Rabu' => 'Rabu',
                        'Kamis' => 'Kamis',
                        'Jumat' => 'Jumat',
                        'Sabtu' => 'Sabtu',
                    ])
                    ->native(false)
                    ->required(),
                TimePicker::make('mulai')
                    ->label('Mulai')
                    ->required(),
                TimePicker::make('selesai')
                    ->label('Selesai')
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
