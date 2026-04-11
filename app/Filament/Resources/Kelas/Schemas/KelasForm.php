<?php

namespace App\Filament\Resources\Kelas\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KelasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->label('Kode Kelas')
                    ->required()
                    ->maxLength(16),
                Select::make('jurusan')
                    ->label('Jurusan')
                    ->options([
                        'IPA' => 'IPA',
                        'IPS' => 'IPS',
                        'Bahasa' => 'Bahasa',
                    ])
                    ->native(false)
                    ->required(),
                Select::make('wali_kelas_id')
                    ->label('Wali Kelas')
                    ->relationship('waliKelas', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),
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
