<?php

namespace App\Filament\Resources\Ppdbs;

use App\Filament\Resources\Ppdbs\Pages\EditPpdb;
use App\Filament\Resources\Ppdbs\Pages\ListPpdbs;
use App\Filament\Resources\Ppdbs\Pages\ViewPpdb;
use App\Filament\Resources\Ppdbs\Schemas\PpdbForm;
use App\Filament\Resources\Ppdbs\Tables\PpdbsTable;
use App\Models\Ppdb;
use BackedEnum;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class PpdbResource extends Resource
{
    protected static ?string $model = Ppdb::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string|UnitEnum|null $navigationGroup = 'Data Sekolah';

    protected static ?string $navigationLabel = 'Alur PPDB';

    protected static ?string $modelLabel = 'Alur PPDB';

    protected static ?string $pluralModelLabel = 'Alur PPDB';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return PpdbForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PpdbsTable::configure($table);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi PPDB')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('brosur')
                            ->label('Brosur')
                            ->disk('public'),
                        TextEntry::make('status')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Active' : 'Non Active'),
                        TextEntry::make('deskripsi')
                            ->columnSpanFull(),
                    ]),
                Section::make('Alur PPDB')
                    ->columnSpanFull()
                    ->schema([
                        RepeatableEntry::make('alur_ppdb')
                            ->schema([
                                TextEntry::make('judul'),
                                TextEntry::make('deskripsi'),
                            ])
                            ->columnSpanFull(),
                    ]),
                Section::make('Persyaratan')
                    ->columnSpanFull()
                    ->schema([
                        RepeatableEntry::make('persyaratan')
                            ->schema([
                                TextEntry::make('item')->label('Persyaratan'),
                            ])
                            ->columnSpanFull(),
                    ]),
                Section::make('Timeline')
                    ->columnSpanFull()
                    ->schema([
                        RepeatableEntry::make('timeline')
                            ->schema([
                                TextEntry::make('periode'),
                                TextEntry::make('keterangan'),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),
                Section::make('Kontak')
                    ->columnSpanFull()
                    ->schema([
                        RepeatableEntry::make('kontak')
                            ->schema([
                                TextEntry::make('label'),
                                TextEntry::make('value'),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ]),
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
            'index' => ListPpdbs::route('/'),
            'view' => ViewPpdb::route('/{record}'),
            'edit' => EditPpdb::route('/{record}/edit'),
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
