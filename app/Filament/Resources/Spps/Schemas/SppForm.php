<?php

namespace App\Filament\Resources\Spps\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SppForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('murid_id')
                    ->label('Murid')
                    ->relationship('murid', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'kode')
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('bulan')
                    ->label('Bulan')
                    ->options([
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ])
                    ->native(false)
                    ->required(),

                TextInput::make('tahun')
                    ->label('Tahun')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(2100)
                    ->default((int) date('Y'))
                    ->required(),

                Select::make('status_bayar')
                    ->label('Status Bayar')
                    ->options([
                        'belum_bayar' => 'Belum Bayar',
                        'cicilan' => 'Cicilan',
                        'lunas' => 'Lunas',
                    ])
                    ->native(false)
                    ->required(),

                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->rows(4)
                    ->columnSpanFull(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        true => 'Active',
                        false => 'Non Active',
                    ])
                    ->native(false)
                    ->required(),
            ]);
    }
}
