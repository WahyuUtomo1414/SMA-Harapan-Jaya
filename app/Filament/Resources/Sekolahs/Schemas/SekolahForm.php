<?php

namespace App\Filament\Resources\Sekolahs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class SekolahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('no_telepon')
                    ->label('No. Telepon')
                    ->tel()
                    ->required()
                    ->maxLength(16),
                TextInput::make('nss_npsn')
                    ->label('NSS / NPSN')
                    ->required()
                    ->maxLength(128),
                TextInput::make('website')
                    ->url()
                    ->required()
                    ->maxLength(128),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(128),
                TextInput::make('status_sekolah')
                    ->label('Status Sekolah')
                    ->required()
                    ->maxLength(128),
                TextInput::make('waktu_belajar')
                    ->label('Waktu Belajar')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('tahun_berdiri')
                    ->label('Tahun Berdiri')
                    ->required(),
                TextInput::make('luas_tanah_bangunan')
                    ->label('Luas Tanah / Bangunan')
                    ->required()
                    ->maxLength(128),
                TextInput::make('status_tanah')
                    ->label('Status Tanah')
                    ->required()
                    ->maxLength(128),
                TextInput::make('no_sertifikat_tanah')
                    ->label('No. Sertifikat Tanah')
                    ->required()
                    ->maxLength(128),
                TextInput::make('status_akreditasi')
                    ->label('Status Akreditasi')
                    ->required()
                    ->maxLength(128),
                Textarea::make('visi')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('misi')
                    ->schema([
                        Textarea::make('teks')->required()->label('Deskripsi Misi'),
                    ])
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->directory('sekolah')
                    ->required(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('sekolah/thumbnail'),
                Textarea::make('maps')
                    ->label('Google Maps')
                    ->columnSpanFull(),
                Repeater::make('sosial_media')
                    ->schema([
                        Select::make('nama')
                            ->options([
                                'Facebook' => 'Facebook',
                                'Instagram' => 'Instagram',
                                'YouTube' => 'YouTube',
                            ])
                            ->required(),
                        TextInput::make('link')
                            ->url()
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                // Select::make('status')
                //     ->options([
                //         true => 'Active',
                //         false => 'Non Active',
                //     ])
                //     ->native(false)
                //     ->required(),
            ]);
    }
}
