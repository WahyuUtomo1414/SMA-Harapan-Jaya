<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DashboardUserSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('12345678');
        $murids = Murid::query()
            ->orderBy('nama')
            ->take(5)
            ->get();
        $reservedEmails = $murids
            ->map(fn (Murid $murid): string => $this->emailFromName($murid->nama))
            ->all();

        Guru::query()
            ->whereHas('jadwalPelajaran')
            ->orderBy('nama')
            ->get()
            ->filter(function (Guru $guru) use (&$reservedEmails): bool {
                $email = $this->emailFromName($guru->nama);

                if (in_array($email, $reservedEmails, true)) {
                    return false;
                }

                $reservedEmails[] = $email;

                return true;
            })
            ->take(5)
            ->each(function (Guru $guru) use ($password): void {
                $user = User::query()->updateOrCreate(
                    ['email' => $this->emailFromName($guru->nama)],
                    [
                        'name' => $guru->nama,
                        'password' => $password,
                        'guru_id' => $guru->id,
                        'murid_id' => null,
                    ]
                );

                $user->syncRoles(['guru']);
            });

        $murids->each(function (Murid $murid) use ($password): void {
            $user = User::query()->updateOrCreate(
                ['email' => $this->emailFromName($murid->nama)],
                [
                    'name' => $murid->nama,
                    'password' => $password,
                    'guru_id' => null,
                    'murid_id' => $murid->id,
                ]
            );

            $user->syncRoles(['murid']);
        });
    }

    private function emailFromName(string $name): string
    {
        $firstName = Str::of($name)
            ->ascii()
            ->lower()
            ->trim()
            ->before(' ')
            ->replaceMatches('/[^a-z0-9]/', '')
            ->value();

        return "{$firstName}@gmail.com";
    }
}
