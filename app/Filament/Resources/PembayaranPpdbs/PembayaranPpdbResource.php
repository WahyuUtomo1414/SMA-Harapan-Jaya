<?php

namespace App\Filament\Resources\PembayaranPpdbs;

use App\Filament\Resources\PembayaranPpdbs\Pages\CreatePembayaranPpdb;
use App\Filament\Resources\PembayaranPpdbs\Pages\EditPembayaranPpdb;
use App\Filament\Resources\PembayaranPpdbs\Pages\ListPembayaranPpdbs;
use App\Filament\Resources\PembayaranPpdbs\Schemas\PembayaranPpdbForm;
use App\Filament\Resources\PembayaranPpdbs\Tables\PembayaranPpdbsTable;
use App\Models\PembayaranPpdb;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class PembayaranPpdbResource extends Resource
{
    protected static ?string $model = PembayaranPpdb::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string|UnitEnum|null $navigationGroup = 'Keuangan';

    protected static ?string $navigationLabel = 'Pembayaran PPDB';

    protected static ?string $modelLabel = 'Pembayaran PPDB';

    protected static ?string $pluralModelLabel = 'Pembayaran PPDB';

    protected static ?string $recordTitleAttribute = 'jenis';

    public static function form(Schema $schema): Schema
    {
        return PembayaranPpdbForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PembayaranPpdbsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPembayaranPpdbs::route('/'),
            'create' => CreatePembayaranPpdb::route('/create'),
            'edit' => EditPembayaranPpdb::route('/{record}/edit'),
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
