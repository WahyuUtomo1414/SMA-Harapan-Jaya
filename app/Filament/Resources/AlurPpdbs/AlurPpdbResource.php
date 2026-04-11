<?php

namespace App\Filament\Resources\AlurPpdbs;

use App\Filament\Resources\AlurPpdbs\Pages\CreateAlurPpdb;
use App\Filament\Resources\AlurPpdbs\Pages\EditAlurPpdb;
use App\Filament\Resources\AlurPpdbs\Pages\ListAlurPpdbs;
use App\Filament\Resources\AlurPpdbs\Schemas\AlurPpdbForm;
use App\Filament\Resources\AlurPpdbs\Tables\AlurPpdbsTable;
use App\Models\AlurPpdb;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlurPpdbResource extends Resource
{
    protected static ?string $model = AlurPpdb::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string|UnitEnum|null $navigationGroup = 'Data Sekolah';

    protected static ?string $navigationLabel = 'Alur PPDB';

    protected static ?string $modelLabel = 'Alur PPDB';

    protected static ?string $pluralModelLabel = 'Alur PPDB';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return AlurPpdbForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AlurPpdbsTable::configure($table);
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
            'index' => ListAlurPpdbs::route('/'),
            'create' => CreateAlurPpdb::route('/create'),
            'edit' => EditAlurPpdb::route('/{record}/edit'),
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
