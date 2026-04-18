<?php

namespace App\Filament\Resources\Spps;

use App\Filament\Resources\Spps\Pages\CreateSpp;
use App\Filament\Resources\Spps\Pages\EditSpp;
use App\Filament\Resources\Spps\Pages\ListSpps;
use App\Filament\Resources\Spps\Schemas\SppForm;
use App\Filament\Resources\Spps\Tables\SppsTable;
use App\Models\Spp;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SppResource extends Resource
{
    protected static ?string $model = Spp::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string|UnitEnum|null $navigationGroup = 'Keuangan';

    protected static ?string $navigationLabel = 'SPP';

    protected static ?string $modelLabel = 'SPP';

    protected static ?string $pluralModelLabel = 'SPP';

    protected static ?string $recordTitleAttribute = 'status_bayar';

    public static function form(Schema $schema): Schema
    {
        return SppForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SppsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSpps::route('/'),
            'create' => CreateSpp::route('/create'),
            'edit' => EditSpp::route('/{record}/edit'),
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
