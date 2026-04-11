<?php

namespace App\Filament\Resources\Nilais\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NilaiForm
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
                Select::make('guru_id')
                    ->label('Guru')
                    ->relationship('guru', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('murid_id')
                    ->label('Murid')
                    ->relationship('murid', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),
                TextInput::make('tugas')
                    ->label('Nilai Tugas')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                TextInput::make('uts')
                    ->label('UTS')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                TextInput::make('uas')
                    ->label('UAS')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
                TextInput::make('total_nilai')
                    ->label('Total Nilai')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100),
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
