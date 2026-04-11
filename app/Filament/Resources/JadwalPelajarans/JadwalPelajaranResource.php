<?php

namespace App\Filament\Resources\JadwalPelajarans;

use App\Filament\Resources\JadwalPelajarans\Pages\CreateJadwalPelajaran;
use App\Filament\Resources\JadwalPelajarans\Pages\EditJadwalPelajaran;
use App\Filament\Resources\JadwalPelajarans\Pages\ListJadwalPelajarans;
use App\Filament\Resources\JadwalPelajarans\Schemas\JadwalPelajaranForm;
use App\Filament\Resources\JadwalPelajarans\Tables\JadwalPelajaransTable;
use App\Models\JadwalPelajaran;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalPelajaranResource extends Resource
{
    protected static ?string $model = JadwalPelajaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static string|UnitEnum|null $navigationGroup = 'Akademik';

    protected static ?string $navigationLabel = 'Jadwal Pelajaran';

    protected static ?string $modelLabel = 'Jadwal Pelajaran';

    protected static ?string $pluralModelLabel = 'Jadwal Pelajaran';

    protected static ?string $recordTitleAttribute = 'hari';

    public static function form(Schema $schema): Schema
    {
        return JadwalPelajaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JadwalPelajaransTable::configure($table);
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
            'index' => ListJadwalPelajarans::route('/'),
            'create' => CreateJadwalPelajaran::route('/create'),
            'edit' => EditJadwalPelajaran::route('/{record}/edit'),
        ];
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
