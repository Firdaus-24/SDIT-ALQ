<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Siswa;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::insert([
            [
                'id' => Str::uuid(),
                'nis' => null,
                'nisn' => '0122885932',
                'nama' => 'Abraham Albiruni',
                'jenis_kelamin' => 'L',
                'rombel' => null,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => Carbon::createFromFormat('d/m/Y', '14/05/2012')->format('Y-m-d'),
                'agama' => 'Islam',
                'wali' => 'Sri Istini',
                'is_lulus' => 0,
                'kelas_id' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nis' => null,
                'nisn' => '0111465509',
                'nama' => 'Abraham Albiruni',
                'jenis_kelamin' => 'L',
                'rombel' => null,
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => Carbon::createFromFormat('d/m/Y', '28/12/2011')->format('Y-m-d'),
                'agama' => 'Islam',
                'wali' => 'Rukmini',
                'is_lulus' => 0,
                'kelas_id' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'nis' => null,
                'nisn' => '0124066995',
                'nama' => 'Ahsan Nafis syazani',
                'jenis_kelamin' => 'L',
                'rombel' => null,
                'tempat_lahir' => 'Tangerang Selatan',
                'tanggal_lahir' => Carbon::createFromFormat('d/m/Y', '15/04/2012')->format('Y-m-d'),
                'agama' => 'Islam',
                'wali' => 'Mariyatul Qibtiyyah',
                'is_lulus' => 0,
                'kelas_id' => 1,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
