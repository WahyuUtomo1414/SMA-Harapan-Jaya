<?php

namespace App\Filament\Resources\Sekolahs;

use App\Filament\Resources\Sekolahs\Pages\EditSekolah;
use App\Filament\Resources\Sekolahs\Pages\ListSekolahs;
use App\Filament\Resources\Sekolahs\Pages\ViewSekolah;
use App\Filament\Resources\Sekolahs\Schemas\SekolahForm;
use App\Filament\Resources\Sekolahs\Tables\SekolahsTable;
use App\Models\Sekolah;
use BackedEnum;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SekolahResource extends Resource
{
    protected static ?string $model = Sekolah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    protected static string|UnitEnum|null $navigationGroup = 'Data Sekolah';

    protected static ?string $navigationLabel = 'Sekolah';

    protected static ?string $modelLabel = 'Sekolah';

    protected static ?string $pluralModelLabel = 'Sekolah';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return SekolahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SekolahsTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil Sekolah')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('logo')
                            ->disk('public')
                            ->circular(),
                        TextEntry::make('nama'),
                        TextEntry::make('status')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Active' : 'Non Active'),
                        TextEntry::make('status_akreditasi')
                            ->label('Akreditasi'),
                        TextEntry::make('status_sekolah')
                            ->label('Status Sekolah'),
                        TextEntry::make('tahun_berdiri')
                            ->date(),
                        TextEntry::make('alamat')
                            ->columnSpanFull(),
                        TextEntry::make('deskripsi')
                            ->columnSpanFull(),
                        TextEntry::make('visi')->columnSpanFull(),
                        TextEntry::make('misi')->columnSpanFull(),
                    ]),
                Section::make('Kontak & Legalitas')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('no_telepon')
                            ->label('No. Telepon'),
                        TextEntry::make('email'),
                        TextEntry::make('website')
                            ->url(fn (?string $state): ?string => $state),
                        TextEntry::make('nss_npsn')
                            ->label('NSS / NPSN'),
                        TextEntry::make('waktu_belajar')
                            ->label('Waktu Belajar'),
                        TextEntry::make('luas_tanah_bangunan')
                            ->label('Luas Tanah / Bangunan'),
                        TextEntry::make('status_tanah')
                            ->label('Status Tanah'),
                        TextEntry::make('no_sertifikat_tanah')
                            ->label('No. Sertifikat Tanah'),
                    ]),
                // Section::make('Visi & Misi')
                //     ->schema([
                //         TextEntry::make('visi')->columnSpanFull(),
                //         TextEntry::make('misi')->columnSpanFull(),
                //     ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSekolahs::route('/'),
            'view' => ViewSekolah::route('/{record}'),
            'edit' => EditSekolah::route('/{record}/edit'),
        ];
    }

    public static function getNavigationUrl(): string
    {
        $record = static::getEloquentQuery()->first();

        if (! $record) {
            return static::getUrl('index');
        }

        return static::getUrl('view', ['record' => $record]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
