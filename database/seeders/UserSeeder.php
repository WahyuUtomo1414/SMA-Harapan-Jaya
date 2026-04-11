<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('12345678');

        // Create Roles
        $superAdminRole = Role::updateOrCreate(['name' => 'super_admin']);
        $guruRole = Role::updateOrCreate(['name' => 'guru']);
        $muridRole = Role::updateOrCreate(['name' => 'murid']);

        // Admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => $password,
            ]
        );
        $admin->assignRole($superAdminRole);

        // Guru
        $guru = User::updateOrCreate(
            ['email' => 'guru@gmail.com'],
            [
                'name' => 'Guru',
                'password' => $password,
            ]
        );
        $guru->assignRole($guruRole);

        // Murid
        $murid = User::updateOrCreate(
            ['email' => 'murid@gmail.com'],
            [
                'name' => 'Murid',
                'password' => $password,
            ]
        );
        $murid->assignRole($muridRole);
    }
}
