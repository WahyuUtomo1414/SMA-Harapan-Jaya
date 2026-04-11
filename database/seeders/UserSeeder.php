<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('12345678');

        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => $password,
            ]
        );

        User::updateOrCreate(
            ['email' => 'guru@gmail.com'],
            [
                'name' => 'Guru',
                'password' => $password,
            ]
        );

        User::updateOrCreate(
            ['email' => 'murid@gmail.com'],
            [
                'name' => 'Murid',
                'password' => $password,
            ]
        );
    }
}
