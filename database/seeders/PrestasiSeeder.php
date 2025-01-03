<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestasi::insert([
            [
                'id' => Str::uuid(),
                'nama' => 'Juara 1 MTQ',
                'score' => 100,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Juara 2 MTQ',
                'score' => 80,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Juara 3 MTQ',
                'score' => 60,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
