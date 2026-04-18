<?php

namespace App\Filament\Resources\Spps\Schemas;

use App\Models\Murid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class SppForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'kode')
                    ->live()
                    ->afterStateUpdated(fn (Set $set) => $set('murid_id', null))
                    ->preload()
                    ->searchable()
                    ->required(),

                Select::make('murid_id')
                    ->label('Murid')
                    ->options(fn (Get $get): array => filled($get('kelas_id'))
                        ? Murid::query()
                            ->where('kelas_id', $get('kelas_id'))
                            ->orderBy('nama')
                            ->pluck('nama', 'id')
                            ->all()
                        : [])
                    ->searchable()
                    ->preload()
                    ->disabled(fn (Get $get): bool => blank($get('kelas_id')))
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
                        'belum_lunas' => 'Belum Lunas',
                        'lunas' => 'Lunas',
                    ])
                    ->native(false)
                    ->required(),

                Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->rows(4)
                    ->columnSpanFull(),

                Hidden::make('status')
                    ->default(true),
            ]);
    }
}
