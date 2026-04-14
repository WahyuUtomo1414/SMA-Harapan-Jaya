<?php

namespace App\Filament\Resources\FormPpdbs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FormPpdbForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ── A. Identitas Calon Peserta Didik ────────────────
                Section::make('A. Identitas Calon Peserta Didik')
                    ->schema([
                        TextInput::make('nik')
                            ->label('NIK')
                            ->required()
                            ->maxLength(16),
                        TextInput::make('nisn')
                            ->label('NISN')
                            ->maxLength(10)
                            ->nullable(),
                        TextInput::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('tempat_lahir')
                            ->label('Tempat Lahir')
                            ->required()
                            ->maxLength(128),
                        TextInput::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->type('date')
                            ->required(),
                        TextInput::make('no_hp')
                            ->label('No. HP / WhatsApp')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        TextInput::make('asal_sekolah')
                            ->label('Asal Sekolah')
                            ->required()
                            ->maxLength(255),
                        Select::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->options([
                                'Laki - Laki' => 'Laki - Laki',
                                'Perempuan'   => 'Perempuan',
                            ])
                            ->native(false)
                            ->required(),
                        TextInput::make('alamat')
                            ->label('Alamat')
                            ->required()
                            ->maxLength(512)
                            ->columnSpanFull(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->nullable()
                            ->maxLength(128),
                        Select::make('jurusan')
                            ->label('Pilih Jurusan')
                            ->options([
                                'IPA' => 'IPA',
                                'IPS' => 'IPS',
                            ])
                            ->native(false)
                            ->required(),
                        Select::make('agama')
                            ->label('Agama')
                            ->options([
                                'Islam'     => 'Islam',
                                'Kristen'   => 'Kristen',
                                'Katolik'   => 'Katolik',
                                'Hindu'     => 'Hindu',
                                'Buddha'    => 'Buddha',
                                'Konghucu'  => 'Konghucu',
                            ])
                            ->native(false)
                            ->required(),
                        Select::make('anak_ke')
                            ->label('Anak Ke')
                            ->options(array_combine(range(1, 15), range(1, 15)))
                            ->native(false)
                            ->required(),
                        Select::make('dari')
                            ->label('Dari (Bersaudara)')
                            ->options(array_combine(range(1, 15), range(1, 15)))
                            ->native(false)
                            ->required(),
                        TextInput::make('tinggi_badan')
                            ->label('Tinggi Badan (cm)')
                            ->numeric()
                            ->minValue(1)
                            ->suffix('cm'),
                        TextInput::make('berat_badan')
                            ->label('Berat Badan (kg)')
                            ->numeric()
                            ->minValue(1)
                            ->suffix('kg'),
                    ])
                    ->columnSpanFull(),

                // ── B. Data Orang Tua / Wali ─────────────────────────
                Section::make('B. Data Orang Tua / Wali')
                    ->schema([
                        TextInput::make('nama_ayah')
                            ->label('Nama Ayah')
                            ->maxLength(255),
                        TextInput::make('nama_ibu')
                            ->label('Nama Ibu')
                            ->maxLength(255),
                        TextInput::make('pekerjaan_ayah')
                            ->label('Pekerjaan Ayah')
                            ->maxLength(128),
                        TextInput::make('pekerjaan_ibu')
                            ->label('Pekerjaan Ibu')
                            ->maxLength(128),
                        TextInput::make('no_hp_ortu')
                            ->label('No. HP Orang Tua / Wali')
                            ->tel()
                            ->maxLength(20),
                        TextInput::make('alamat_ortu')
                            ->label('Alamat Orang Tua / Wali')
                            ->maxLength(512)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                // ── C. Upload Dokumen ────────────────────────────────
                Section::make('C. Upload Dokumen')
                    ->description('Format file: PDF/JPG/PNG, maksimal 2MB')
                    ->schema([
                        FileUpload::make('kartu_keluarga')
                            ->label('Kartu Keluarga')
                            ->disk('public')
                            ->directory('form-ppdb/kartu-keluarga')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                            ->maxSize(2048)
                            ->required(),
                        FileUpload::make('akte_kelahiran')
                            ->label('Akte Kelahiran')
                            ->disk('public')
                            ->directory('form-ppdb/akte-kelahiran')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                            ->maxSize(2048)
                            ->required(),
                        FileUpload::make('ijazah')
                            ->label('Ijazah / Surat Keterangan Lulus')
                            ->disk('public')
                            ->directory('form-ppdb/ijazah')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                            ->maxSize(2048)
                            ->required(),
                        FileUpload::make('pas_foto')
                            ->label('Pas Foto 3×4')
                            ->disk('public')
                            ->directory('form-ppdb/pas-foto')
                            ->image()
                            ->acceptedFileTypes(['image/jpeg', 'image/png'])
                            ->maxSize(2048)
                            ->required(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
