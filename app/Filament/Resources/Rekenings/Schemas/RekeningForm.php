<?php

namespace App\Filament\Resources\Rekenings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class RekeningForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_bank')
                    ->required(),
                TextInput::make('nama_pemilik')
                    ->required(),
                TextInput::make('nomor_rekening')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->directory('rekening'),
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
