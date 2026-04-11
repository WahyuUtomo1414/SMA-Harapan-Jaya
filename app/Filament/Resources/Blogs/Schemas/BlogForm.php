<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Select::make('kategori_id')
                    ->label('Kategori')
                    ->relationship('kategori', 'nama')
                    ->preload()
                    ->searchable()
                    ->required(),
                FileUpload::make('thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('blog')
                    ->required(),
                FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->disk('public')
                    ->directory('blog'),
                RichEditor::make('konten')
                    ->label('Konten')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        true => 'Active',
                        false => 'Non Active',
                    ])
                    ->native(false)
                    ->required(),
            ]);
    }
}
