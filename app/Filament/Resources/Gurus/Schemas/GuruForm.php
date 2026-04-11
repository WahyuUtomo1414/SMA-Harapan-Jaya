<?php

namespace App\Filament\Resources\Gurus\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GuruForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
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
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('tahun_mulai_mengajar')
                    ->label('Tahun Mulai Mengajar')
                    ->required(),
                Select::make('ijaza')
                    ->label('Ijazah')
                    ->options([
                        'SMA' => 'SMA',
                        'D3' => 'D3',
                        'S1' => 'S1',
                        'S2' => 'S2',
                        'S3' => 'S3',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('jabatan')
                    ->required()
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
