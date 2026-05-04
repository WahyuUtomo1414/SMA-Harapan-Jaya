<?php

namespace App\Filament\Resources\Ppdbs;

use App\Filament\Resources\Ppdbs\Pages\EditPpdb;
use App\Filament\Resources\Ppdbs\Pages\ListPpdbs;
use App\Filament\Resources\Ppdbs\Pages\ViewPpdb;
use App\Filament\Resources\Ppdbs\Schemas\PpdbForm;
use App\Filament\Resources\Ppdbs\Tables\PpdbsTable;
use App\Models\Ppdb;
use BackedEnum;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use UnitEnum;

class PpdbResource extends Resource
{
    protected static ?string $model = Ppdb::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static string|UnitEnum|null $navigationGroup = 'PPDB';

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
                        TextEntry::make('brosur')
                            ->label('Brosur')
                            ->formatStateUsing(function ($state): HtmlString {
                                if (blank($state)) {
                                    return new HtmlString('-');
                                }

                                $url = Storage::disk('public')->url($state);

                                return new HtmlString('<a href="' . e($url) . '" target="_blank" class="text-primary underline">Lihat Brosur</a>');
                            })
                            ->html(),
                        TextEntry::make('status')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Active' : 'Non Active'),
                        TextEntry::make('deskripsi')
                            ->columnSpanFull(),
                    ]),
                Section::make('Alur PPDB')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('alur_ppdb.offline')
                            ->label('Jalur Offline')
                            ->formatStateUsing(fn ($state): HtmlString => static::formatSimpleList($state))
                            ->html(),
                        TextEntry::make('alur_ppdb.online')
                            ->label('Jalur Online')
                            ->formatStateUsing(fn ($state): HtmlString => static::formatSimpleList($state))
                            ->html()
                            ->columnSpanFull(),
                    ]),
                Section::make('Persyaratan')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('persyaratan')
                            ->label('Daftar Persyaratan')
                            ->formatStateUsing(fn ($state): HtmlString => static::formatSimpleList($state))
                            ->html(),
                    ]),
                Section::make('Timeline')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('timeline')
                            ->label('Timeline PPDB')
                            ->formatStateUsing(fn ($state): HtmlString => static::formatTimeline($state))
                            ->html(),
                    ]),
                Section::make('Kontak')
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('kontak')
                            ->label('Kontak PPDB')
                            ->formatStateUsing(fn ($state): HtmlString => static::formatContactList($state))
                            ->html(),
                    ]),
            ]);
    }

    protected static function formatSimpleList(mixed $state): HtmlString
    {
        if (! is_array($state) || $state === []) {
            return new HtmlString('-');
        }

        $items = collect(array_values($state))
            ->map(fn ($item, $index) => '<li>' . e(($index + 1) . '. ' . $item) . '</li>')
            ->implode('');

        return new HtmlString('<ol class="space-y-1">' . $items . '</ol>');
    }

    protected static function formatTimeline(mixed $state): HtmlString
    {
        if (! is_array($state) || $state === []) {
            return new HtmlString('-');
        }

        $items = collect($state)
            ->map(function ($item): string {
                if (is_string($item)) {
                    return '<li>' . e($item) . '</li>';
                }

                if (! is_array($item)) {
                    return '<li>-</li>';
                }

                $lines = [
                    '<strong>' . e($item['label'] ?? '-') . '</strong>',
                    'Waktu: ' . e($item['waktu'] ?? '-'),
                ];

                if (filled($item['keterangan'] ?? null)) {
                    $lines[] = 'Keterangan: ' . e($item['keterangan']);
                }

                if (filled($item['link'] ?? null)) {
                    $lines[] = 'Link: <a href="' . e($item['link']) . '" target="_blank" class="text-primary underline">' . e($item['link']) . '</a>';
                }

                return '<li>' . implode('<br>', $lines) . '</li>';
            })
            ->implode('');

        return new HtmlString('<ol class="list-decimal space-y-2 pl-5">' . $items . '</ol>');
    }

    protected static function formatContactList(mixed $state): HtmlString
    {
        if (! is_array($state) || $state === []) {
            return new HtmlString('-');
        }

        $items = collect($state)
            ->map(fn ($value, $label) => '<li><strong>' . e(ucfirst((string) $label)) . ':</strong> ' . e($value) . '</li>')
            ->implode('');

        return new HtmlString('<ul class="space-y-1">' . $items . '</ul>');
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
