<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kesalahan;
use App\Models\Prestasi;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                RolePermissionSeeder::class,
                UserSeeder::class,
                KelasSeeder::class,
                JabatanSeeder::class,
                GuruSeeder::class,
                SiswaSeeder::class,
                PrestasiSeeder::class,
                KesalahanSiswaSeeder::class,
            ]
        );
    }
}
