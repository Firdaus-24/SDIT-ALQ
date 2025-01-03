<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createPermissions = [
            ['name' => 'guru.create', 'guard_name' => 'web'],
            ['name' => 'guru.edit', 'guard_name' => 'web'],
            ['name' => 'guru.delete', 'guard_name' => 'web'],
            ['name' => 'guru.list', 'guard_name' => 'web'],
            ['name' => 'guru.import', 'guard_name' => 'web'],

            ['name' => 'kelas.create', 'guard_name' => 'web'],
            ['name' => 'kelas.edit', 'guard_name' => 'web'],
            ['name' => 'kelas.delete', 'guard_name' => 'web'],
            ['name' => 'kelas.list', 'guard_name' => 'web'],

            ['name' => 'jabatan.create', 'guard_name' => 'web'],
            ['name' => 'jabatan.edit', 'guard_name' => 'web'],
            ['name' => 'jabatan.delete', 'guard_name' => 'web'],
            ['name' => 'jabatan.list', 'guard_name' => 'web'],
            ['name' => 'jabatan.import', 'guard_name' => 'web'],

            ['name' => 'siswa.create', 'guard_name' => 'web'],
            ['name' => 'siswa.edit', 'guard_name' => 'web'],
            ['name' => 'siswa.delete', 'guard_name' => 'web'],
            ['name' => 'siswa.list', 'guard_name' => 'web'],
            ['name' => 'siswa.import', 'guard_name' => 'web'],
            ['name' => 'siswa.datatable', 'guard_name' => 'web'],
            ['name' => 'siswa.kenaikan-kelas', 'guard_name' => 'web'],

            ['name' => 'kesalahan-siswa.create', 'guard_name' => 'web'],
            ['name' => 'kesalahan-siswa.edit', 'guard_name' => 'web'],
            ['name' => 'kesalahan-siswa.delete', 'guard_name' => 'web'],
            ['name' => 'kesalahan-siswa.list', 'guard_name' => 'web'],

            ['name' => 'detailkesalahan-siswa.create', 'guard_name' => 'web'],
            ['name' => 'detailkesalahan-siswa.edit', 'guard_name' => 'web'],
            ['name' => 'detailkesalahan-siswa.delete', 'guard_name' => 'web'],
            ['name' => 'detailkesalahan-siswa.list', 'guard_name' => 'web'],

            ['name' => 'prestasi-siswa.create', 'guard_name' => 'web'],
            ['name' => 'prestasi-siswa.edit', 'guard_name' => 'web'],
            ['name' => 'prestasi-siswa.delete', 'guard_name' => 'web'],
            ['name' => 'prestasi-siswa.list', 'guard_name' => 'web'],

            ['name' => 'detailprestasi-siswa.create', 'guard_name' => 'web'],
            ['name' => 'detailprestasi-siswa.edit', 'guard_name' => 'web'],
            ['name' => 'detailprestasi-siswa.delete', 'guard_name' => 'web'],
            ['name' => 'detailprestasi-siswa.list', 'guard_name' => 'web'],

            ['name' => 'keterlambatanguru.create', 'guard_name' => 'web'],
            ['name' => 'keterlambatanguru.edit', 'guard_name' => 'web'],
            ['name' => 'keterlambatanguru.delete', 'guard_name' => 'web'],
            ['name' => 'keterlambatanguru.list', 'guard_name' => 'web'],

            ['name' => 'kelas.create', 'guard_name' => 'web'],
            ['name' => 'kelas.edit', 'guard_name' => 'web'],
            ['name' => 'kelas.delete', 'guard_name' => 'web'],
            ['name' => 'kelas.list', 'guard_name' => 'web'],
            ['name' => 'kelas.import', 'guard_name' => 'web'],
        ];

        DB::beginTransaction();
        try {
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'superadmin']);
            Role::create(['name' => 'guru']);
            Role::create(['name' => 'user']);

            foreach ($createPermissions as $permission) {
                $data = Permission::where('name', $permission['name'])
                    ->where('guard_name', $permission['guard_name'])
                    ->first();

                if (is_null($data)) {
                    Permission::create(['name' => $permission['name']]);
                    $roleSuperAdmin = Role::findByName('superadmin');
                    $roleSuperAdmin->givePermissionTo($permission['name']);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
