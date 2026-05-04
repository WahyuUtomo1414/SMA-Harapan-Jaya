<?php

namespace App\Filament\Resources\PembayaranPpdbs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PembayaranPpdbForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jenis')
                    ->label('Jenis')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(4)
                    ->columnSpanFull(),

                TextInput::make('nominal')
                    ->label('Nominal')
                    ->numeric()
                    ->prefix('Rp')
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
