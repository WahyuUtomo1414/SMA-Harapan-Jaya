<?php

namespace App\Filament\Resources\Ppdbs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PpdbForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->columnSpanFull(),
                Section::make('Alur PPDB')
                    ->schema([
                        Repeater::make('alur_offline')
                            ->label('Jalur Offline')
                            ->schema([
                                TextInput::make('step')
                                    ->label('Langkah')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->itemLabel(fn (array $state): ?string => $state['step'] ?? null)
                            ->columnSpanFull()
                            ->required(),
                        Repeater::make('alur_online')
                            ->label('Jalur Online')
                            ->schema([
                                TextInput::make('step')
                                    ->label('Langkah')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->itemLabel(fn (array $state): ?string => $state['step'] ?? null)
                            ->columnSpanFull()
                            ->required(),
                    ])
                    ->columnSpanFull(),
                Repeater::make('persyaratan_items')
                    ->label('Persyaratan')
                    ->schema([
                        TextInput::make('item')
                            ->label('Persyaratan')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['item'] ?? null)
                    ->columnSpanFull()
                    ->required(),
                Repeater::make('timeline_items')
                    ->label('Timeline')
                    ->schema([
                        TextInput::make('label')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('waktu')
                            ->label('Waktu')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('link')
                            ->label('Link')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('keterangan')
                            ->label('Keterangan')
                            ->maxLength(255),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                    ->columns(2)
                    ->columnSpanFull()
                    ->required(),
                Repeater::make('kontak_items')
                    ->label('Kontak')
                    ->schema([
                        TextInput::make('label')
                            ->label('Label')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('value')
                            ->label('Nilai')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                    ->columns(2)
                    ->columnSpanFull()
                    ->required(),
                FileUpload::make('brosur')
                    ->label('Brosur')
                    ->disk('public')
                    ->directory('ppdb')
                    ->acceptedFileTypes(['application/pdf']),
                Select::make('status')
                    ->options([
                        true => 'Active',
                        false => 'Non Active',
                    ])
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function mutateDataBeforeFill(array $data): array
    {
        $data['alur_offline'] = collect($data['alur_ppdb']['offline'] ?? [])
            ->map(fn ($step) => ['step' => $step])
            ->values()
            ->all();

        $data['alur_online'] = collect($data['alur_ppdb']['online'] ?? [])
            ->map(fn ($step) => ['step' => $step])
            ->values()
            ->all();

        $data['persyaratan_items'] = collect($data['persyaratan'] ?? [])
            ->map(fn ($item) => ['item' => $item])
            ->values()
            ->all();

        $data['timeline_items'] = collect($data['timeline'] ?? [])
            ->map(fn ($item) => [
                'label' => $item['label'] ?? '',
                'waktu' => $item['waktu'] ?? '',
                'link' => $item['link'] ?? '',
                'keterangan' => $item['keterangan'] ?? '',
            ])
            ->values()
            ->all();

        $data['kontak_items'] = collect($data['kontak'] ?? [])
            ->map(fn ($value, $label) => [
                'label' => (string) $label,
                'value' => $value,
            ])
            ->values()
            ->all();

        return $data;
    }

    public static function mutateDataBeforeSave(array $data): array
    {
        $data['alur_ppdb'] = [
            'offline' => collect($data['alur_offline'] ?? [])
                ->pluck('step')
                ->filter()
                ->values()
                ->all(),
            'online' => collect($data['alur_online'] ?? [])
                ->pluck('step')
                ->filter()
                ->values()
                ->all(),
        ];

        $data['persyaratan'] = collect($data['persyaratan_items'] ?? [])
            ->pluck('item')
            ->filter()
            ->values()
            ->all();

        $data['timeline'] = collect($data['timeline_items'] ?? [])
            ->map(function (array $item): array {
                return array_filter([
                    'label' => $item['label'] ?? null,
                    'waktu' => $item['waktu'] ?? null,
                    'link' => $item['link'] ?? null,
                    'keterangan' => $item['keterangan'] ?? null,
                ], fn ($value) => filled($value));
            })
            ->filter(fn (array $item) => ! empty($item['label']) && ! empty($item['waktu']))
            ->values()
            ->all();

        $data['kontak'] = collect($data['kontak_items'] ?? [])
            ->filter(fn (array $item) => filled($item['label'] ?? null) && filled($item['value'] ?? null))
            ->mapWithKeys(fn (array $item) => [$item['label'] => $item['value']])
            ->all();

        unset(
            $data['alur_offline'],
            $data['alur_online'],
            $data['persyaratan_items'],
            $data['timeline_items'],
            $data['kontak_items'],
        );

        return $data;
    }
}
