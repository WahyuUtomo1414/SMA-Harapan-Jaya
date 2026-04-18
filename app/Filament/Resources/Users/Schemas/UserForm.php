<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->dehydrateStateUsing(fn (string $state): string => bcrypt($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->helperText('Kosongkan jika tidak ingin mengubah password.')
                    ->maxLength(255),

                Select::make('roles')
                    ->label('Role')
                    ->relationship('roles', 'name')
                    ->options(Role::query()->pluck('name', 'id'))
                    ->preload()
                    ->searchable()
                    ->native(false)
                    ->required(),

                Select::make('guru_id')
                    ->label('Guru')
                    ->relationship('guru', 'nama')
                    ->preload()
                    ->searchable()
                    ->native(false),

                Select::make('murid_id')
                    ->label('Murid')
                    ->relationship('murid', 'nama')
                    ->preload()
                    ->searchable()
                    ->native(false),
            ]);
    }
}
