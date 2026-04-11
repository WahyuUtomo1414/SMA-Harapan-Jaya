<?php

namespace App\Filament\Resources\StrukturOrganisasis;

use App\Filament\Resources\StrukturOrganisasis\Pages\CreateStrukturOrganisasi;
use App\Filament\Resources\StrukturOrganisasis\Pages\EditStrukturOrganisasi;
use App\Filament\Resources\StrukturOrganisasis\Pages\ListStrukturOrganisasis;
use App\Filament\Resources\StrukturOrganisasis\Schemas\StrukturOrganisasiForm;
use App\Filament\Resources\StrukturOrganisasis\Tables\StrukturOrganisasisTable;
use App\Models\StrukturOrganisasi;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StrukturOrganisasiResource extends Resource
{
    protected static ?string $model = StrukturOrganisasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|UnitEnum|null $navigationGroup = 'Data Sekolah';

    protected static ?string $navigationLabel = 'Struktur Organisasi';

    protected static ?string $modelLabel = 'Struktur Organisasi';

    protected static ?string $pluralModelLabel = 'Struktur Organisasi';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return StrukturOrganisasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StrukturOrganisasisTable::configure($table);
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
            'index' => ListStrukturOrganisasis::route('/'),
            'create' => CreateStrukturOrganisasi::route('/create'),
            'edit' => EditStrukturOrganisasi::route('/{record}/edit'),
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
