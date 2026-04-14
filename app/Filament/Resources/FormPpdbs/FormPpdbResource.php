<?php

namespace App\Filament\Resources\FormPpdbs;

use App\Filament\Resources\FormPpdbs\Pages\CreateFormPpdb;
use App\Filament\Resources\FormPpdbs\Pages\EditFormPpdb;
use App\Filament\Resources\FormPpdbs\Pages\ListFormPpdbs;
use App\Filament\Resources\FormPpdbs\Pages\ViewFormPpdb;
use App\Filament\Resources\FormPpdbs\Schemas\FormPpdbForm;
use App\Filament\Resources\FormPpdbs\Schemas\FormPpdbInfolist;
use App\Filament\Resources\FormPpdbs\Tables\FormPpdbsTable;
use App\Models\FormPpdb;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FormPpdbResource extends Resource
{
    protected static ?string $model = FormPpdb::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static string|UnitEnum|null $navigationGroup = 'Data Sekolah';

    protected static ?string $navigationLabel = 'Form PPDB';

    protected static ?string $modelLabel = 'Form PPDB';

    protected static ?string $pluralModelLabel = 'Form PPDB';

    protected static ?string $recordTitleAttribute = 'nama_lengkap';

    public static function form(Schema $schema): Schema
    {
        return FormPpdbForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FormPpdbInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormPpdbsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListFormPpdbs::route('/'),
            'create' => CreateFormPpdb::route('/create'),
            'view'   => ViewFormPpdb::route('/{record}'),
            'edit'   => EditFormPpdb::route('/{record}/edit'),
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
