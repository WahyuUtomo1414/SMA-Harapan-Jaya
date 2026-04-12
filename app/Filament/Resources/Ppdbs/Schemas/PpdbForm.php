<?php

namespace App\Filament\Resources\Ppdbs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PpdbForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),
                Repeater::make('alur_ppdb')
                    ->label('Alur PPDB')
                    ->schema([
                        TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['judul'] ?? null)
                    ->columnSpanFull()
                    ->required(),
                Repeater::make('persyaratan')
                    ->label('Persyaratan')
                    ->schema([
                        TextInput::make('item')
                            ->label('Persyaratan')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['item'] ?? null)
                    ->columnSpanFull()
                    ->required(),
                Repeater::make('timeline')
                    ->label('Timeline')
                    ->schema([
                        TextInput::make('periode')
                            ->label('Periode')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('keterangan')
                            ->label('Keterangan')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['periode'] ?? null)
                    ->columns(2)
                    ->columnSpanFull()
                    ->required(),
                Repeater::make('kontak')
                    ->label('Kontak')
                    ->schema([
                        TextInput::make('label')
                            ->label('Label')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('value')
                            ->label('Nilai')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                    ->columns(2)
                    ->columnSpanFull()
                    ->required(),
                FileUpload::make('brosur')
                    ->label('Brosur')
                    ->image()
                    ->disk('public')
                    ->directory('ppdb'),
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
