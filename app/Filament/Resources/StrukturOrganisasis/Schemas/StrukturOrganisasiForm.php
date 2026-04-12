<?php

namespace App\Filament\Resources\StrukturOrganisasis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StrukturOrganisasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('jabatan')
                    ->required()
                    ->maxLength(128),
                // FileUpload::make('foto')
                //     ->image()
                //     ->disk('public')
                //     ->directory('struktur_organisasi')
                //     ->required(),
                TextInput::make('urutan')
                    ->label('Urutan')
                    ->required()
                    ->numeric(),
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
