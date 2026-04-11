<?php

namespace App\Filament\Resources\Murids\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MuridForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kelas_id')
                    ->label('Kelas')
                    ->relationship('kelas', 'kode')
                    ->preload()
                    ->searchable()
                    ->required(),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nisn')
                    ->label('NISN')
                    ->maxLength(128),
                TextInput::make('nis')
                    ->label('NIS')
                    ->maxLength(128),
                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('tempat_lahir')
                    ->label('Tempat Lahir')
                    ->required()
                    ->maxLength(128),
                DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),
                Textarea::make('alamat')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->email()
                    ->maxLength(128),
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
