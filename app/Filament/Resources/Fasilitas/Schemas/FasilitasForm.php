<?php

namespace App\Filament\Resources\Fasilitas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FasilitasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128),
                FileUpload::make('foto')
                    ->image()
                    ->disk('public')
                    ->directory('fasilitas')
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
