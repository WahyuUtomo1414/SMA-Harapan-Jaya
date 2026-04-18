<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SekolahSeeder::class,
            GuruSeeder::class,
            StrukturOrganisasiSeeder::class,
            KategoriSeeder::class,
            BlogSeeder::class,
            FaqSeeder::class,
            PpdbSeeder::class,
            KelasSeeder::class,
            MataPelajaranSeeder::class,
            MuridSeeder::class,
            JadwalPelajaranSeeder::class,
            FasilitasSeeder::class,
            SppSeeder::class,
        ]);
    }
}
