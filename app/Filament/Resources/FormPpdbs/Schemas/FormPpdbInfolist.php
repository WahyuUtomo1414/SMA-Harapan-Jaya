<?php

namespace App\Filament\Resources\FormPpdbs\Schemas;

use App\Models\FormPpdb;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class FormPpdbInfolist
{
    /** Cek apakah path file adalah PDF */
    private static function isPdf(?string $path): bool
    {
        return str_ends_with(strtolower($path ?? ''), '.pdf');
    }

    /** URL publik ke file di disk 'public' */
    private static function fileUrl(?string $path): string
    {
        return $path ? Storage::disk('public')->url($path) : '#';
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ── Status Penerimaan ────────────────────────────────
                Section::make('Status Penerimaan')
                    ->schema([
                        TextEntry::make('status_penerimaan')
                            ->label('Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'diterima' => 'success',
                                'ditolak'  => 'danger',
                                default    => 'warning',
                            })
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'diterima' => 'Diterima',
                                'ditolak'  => 'Ditolak',
                                default    => 'Menunggu',
                            }),
                    ])
                    ->columns(1),

                // ── A. Identitas Calon Peserta Didik ────────────────
                Section::make('A. Identitas Calon Peserta Didik')
                    ->schema([
                        TextEntry::make('nik')
                            ->label('NIK'),
                        TextEntry::make('nisn')
                            ->label('NISN'),
                        TextEntry::make('nama_lengkap')
                            ->label('Nama Lengkap')
                            ->columnSpanFull(),
                        TextEntry::make('tempat_lahir')
                            ->label('Tempat Lahir'),
                        TextEntry::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->date('d M Y'),
                        TextEntry::make('no_hp')
                            ->label('No. HP / WhatsApp'),
                        TextEntry::make('asal_sekolah')
                            ->label('Asal Sekolah'),
                        TextEntry::make('jenis_kelamin')
                            ->label('Jenis Kelamin'),
                        TextEntry::make('email')
                            ->label('Email'),
                        TextEntry::make('alamat')
                            ->label('Alamat')
                            ->columnSpanFull(),
                        TextEntry::make('jurusan')
                            ->label('Jurusan'),
                        TextEntry::make('agama')
                            ->label('Agama'),
                        TextEntry::make('anak_ke')
                            ->label('Anak Ke'),
                        TextEntry::make('dari')
                            ->label('Dari (Bersaudara)'),
                        TextEntry::make('tinggi_badan')
                            ->label('Tinggi Badan')
                            ->suffix(' cm'),
                        TextEntry::make('berat_badan')
                            ->label('Berat Badan')
                            ->suffix(' kg'),
                    ])
                    ->columnSpanFull()
                    ->columns(2),

                // ── B. Data Orang Tua / Wali ─────────────────────────
                Section::make('B. Data Orang Tua / Wali')
                    ->schema([
                        TextEntry::make('nama_ayah')
                            ->label('Nama Ayah'),
                        TextEntry::make('nama_ibu')
                            ->label('Nama Ibu'),
                        TextEntry::make('pekerjaan_ayah')
                            ->label('Pekerjaan Ayah'),
                        TextEntry::make('pekerjaan_ibu')
                            ->label('Pekerjaan Ibu'),
                        TextEntry::make('no_hp_ortu')
                            ->label('No. HP Orang Tua / Wali'),
                        TextEntry::make('alamat_ortu')
                            ->label('Alamat Orang Tua / Wali')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->columns(2),

                // ── C. Dokumen ────────────────────────────────────────
                // Logika: jika ekstensi .pdf  → TextEntry + url (buka tab baru / stream PDF)
                //         jika ekstensi gambar → ImageEntry + url (klik buka tab baru, full size)
                Section::make('C. Dokumen')
                    ->schema([

                        // ─ Kartu Keluarga ─────────────────────────────
                        ImageEntry::make('kartu_keluarga')
                            ->label('Kartu Keluarga')
                            ->disk('public')
                            ->url(fn (FormPpdb $record): string => self::fileUrl($record->kartu_keluarga))
                            ->openUrlInNewTab()
                            ->visible(fn (FormPpdb $record): bool =>
                                ! self::isPdf($record->kartu_keluarga)),

                        TextEntry::make('kartu_keluarga')
                            ->label('Kartu Keluarga')
                            ->key('kartu_keluarga_pdf')
                            ->formatStateUsing(fn (): string => '📄 Lihat / Unduh PDF')
                            ->url(fn (FormPpdb $record): string =>
                                self::fileUrl($record->kartu_keluarga))
                            ->openUrlInNewTab()
                            ->visible(fn (FormPpdb $record): bool =>
                                self::isPdf($record->kartu_keluarga)),

                        // ─ Akte Kelahiran ──────────────────────────────
                        ImageEntry::make('akte_kelahiran')
                            ->label('Akte Kelahiran')
                            ->disk('public')
                            ->url(fn (FormPpdb $record): string => self::fileUrl($record->akte_kelahiran))
                            ->openUrlInNewTab()
                            ->visible(fn (FormPpdb $record): bool =>
                                ! self::isPdf($record->akte_kelahiran)),

                        TextEntry::make('akte_kelahiran')
                            ->label('Akte Kelahiran')
                            ->key('akte_kelahiran_pdf')
                            ->formatStateUsing(fn (): string => '📄 Lihat / Unduh PDF')
                            ->url(fn (FormPpdb $record): string =>
                                self::fileUrl($record->akte_kelahiran))
                            ->openUrlInNewTab()
                            ->visible(fn (FormPpdb $record): bool =>
                                self::isPdf($record->akte_kelahiran)),

                        // ─ Ijazah / SKL ────────────────────────────────
                        ImageEntry::make('ijazah')
                            ->label('Ijazah / Surat Keterangan Lulus')
                            ->disk('public')
                            ->url(fn (FormPpdb $record): string => self::fileUrl($record->ijazah))
                            ->openUrlInNewTab()
                            ->visible(fn (FormPpdb $record): bool =>
                                ! self::isPdf($record->ijazah)),

                        TextEntry::make('ijazah')
                            ->label('Ijazah / Surat Keterangan Lulus')
                            ->key('ijazah_pdf')
                            ->formatStateUsing(fn (): string => '📄 Lihat / Unduh PDF')
                            ->url(fn (FormPpdb $record): string =>
                                self::fileUrl($record->ijazah))
                            ->openUrlInNewTab()
                            ->visible(fn (FormPpdb $record): bool =>
                                self::isPdf($record->ijazah)),

                        // ─ Pas Foto — selalu gambar, klik buka full size di tab baru ───
                        ImageEntry::make('pas_foto')
                            ->label('Pas Foto 3×4')
                            ->disk('public')
                            ->url(fn (FormPpdb $record): string => self::fileUrl($record->pas_foto))
                            ->openUrlInNewTab()
                            ->circular(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                // ── D. Pembayaran ────────────────────────────────────────
                Section::make('D. Pembayaran')
                    ->schema([
                        TextEntry::make('status_pembayaran')
                            ->label('Status Pembayaran')
                            ->badge()
                            ->color(fn (?string $state): string => match ($state) {
                                FormPpdb::PEMBAYARAN_LUNAS => 'success',
                                FormPpdb::PEMBAYARAN_MENUNGGU_KONFIRMASI  => 'warning',
                                default    => 'danger',
                            })
                            ->formatStateUsing(fn (?string $state): string => match ($state) {
                                FormPpdb::PEMBAYARAN_LUNAS => 'Lunas',
                                FormPpdb::PEMBAYARAN_MENUNGGU_KONFIRMASI  => 'Menunggu Konfirmasi',
                                default    => 'Belum Bayar',
                            }),
                        
                        ImageEntry::make('bukti_pembayaran')
                            ->label('Bukti Pembayaran')
                            ->disk('public')
                            ->url(fn (FormPpdb $record): string => self::fileUrl($record->bukti_pembayaran))
                            ->openUrlInNewTab()
                            ->visible(fn (FormPpdb $record): bool => !empty($record->bukti_pembayaran)),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
