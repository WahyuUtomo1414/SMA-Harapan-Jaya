<?php

namespace App\Filament\Resources\Nilais;

use App\Filament\Resources\Nilais\Pages\CreateNilai;
use App\Filament\Resources\Nilais\Pages\EditNilai;
use App\Filament\Resources\Nilais\Pages\ListNilais;
use App\Filament\Resources\Nilais\Schemas\NilaiForm;
use App\Filament\Resources\Nilais\Tables\NilaisTable;
use App\Models\Nilai;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedChartBar;

    protected static string|UnitEnum|null $navigationGroup = 'Penilaian';

    protected static ?string $navigationLabel = 'Nilai';

    protected static ?string $modelLabel = 'Nilai';

    protected static ?string $pluralModelLabel = 'Nilai';

    public static function form(Schema $schema): Schema
    {
        return NilaiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NilaisTable::configure($table);
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
            'index' => ListNilais::route('/'),
            'create' => CreateNilai::route('/create'),
            'edit' => EditNilai::route('/{record}/edit'),
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
