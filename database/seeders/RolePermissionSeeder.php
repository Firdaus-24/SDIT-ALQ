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
            ['name' => 'tambah-user', 'guard_name' => 'web'],
            ['name' => 'edit-user', 'guard_name' => 'web'],
            ['name' => 'delete-user', 'guard_name' => 'web'],
            ['name' => 'lihat-user', 'guard_name' => 'web'],

            ['name' => 'tambah-guru', 'guard_name' => 'web'],
            ['name' => 'edit-guru', 'guard_name' => 'web'],
            ['name' => 'delete-guru', 'guard_name' => 'web'],
            ['name' => 'lihat-guru', 'guard_name' => 'web'],

            ['name' => 'tambah-jabatan', 'guard_name' => 'web'],
            ['name' => 'edit-jabatan', 'guard_name' => 'web'],
            ['name' => 'delete-jabatan', 'guard_name' => 'web'],
            ['name' => 'lihat-jabatan', 'guard_name' => 'web'],

            ['name' => 'tambah-siswa', 'guard_name' => 'web'],
            ['name' => 'edit-siswa', 'guard_name' => 'web'],
            ['name' => 'delete-siswa', 'guard_name' => 'web'],
            ['name' => 'lihat-siswa', 'guard_name' => 'web'],
            ['name' => 'kenaikan-kelas', 'guard_name' => 'web'],

            ['name' => 'tambah-kesalahan-siswa', 'guard_name' => 'web'],
            ['name' => 'edit-kesalahan-siswa', 'guard_name' => 'web'],
            ['name' => 'delete-kesalahan-siswa', 'guard_name' => 'web'],
            ['name' => 'lihat-kesalahan-siswa', 'guard_name' => 'web'],

            ['name' => 'tambah-detailkesalahan-siswa', 'guard_name' => 'web'],
            ['name' => 'edit-detailkesalahan-siswa', 'guard_name' => 'web'],
            ['name' => 'delete-detailkesalahan-siswa', 'guard_name' => 'web'],
            ['name' => 'lihat-detailkesalahan-siswa', 'guard_name' => 'web'],

            ['name' => 'tambah-prestasi-siswa', 'guard_name' => 'web'],
            ['name' => 'edit-prestasi-siswa', 'guard_name' => 'web'],
            ['name' => 'delete-prestasi-siswa', 'guard_name' => 'web'],
            ['name' => 'lihat-prestasi-siswa', 'guard_name' => 'web'],

            ['name' => 'tambah-detailprestasi-siswa', 'guard_name' => 'web'],
            ['name' => 'edit-detailprestasi-siswa', 'guard_name' => 'web'],
            ['name' => 'delete-detailprestasi-siswa', 'guard_name' => 'web'],
            ['name' => 'lihat-detailprestasi-siswa', 'guard_name' => 'web'],

            ['name' => 'tambah-keterlambatanguru', 'guard_name' => 'web'],
            ['name' => 'edit-keterlambatanguru', 'guard_name' => 'web'],
            ['name' => 'delete-keterlambatanguru', 'guard_name' => 'web'],
            ['name' => 'lihat-keterlambatanguru', 'guard_name' => 'web'],
        ];

        DB::beginTransaction();
        try {
            Role::create(['name' => 'admin']);
            Role::create(['name' => 'superadmin']);
            Role::create(['name' => 'user']);

            foreach ($createPermissions as $permission) {
                $data = Permission::where('name', $permission['name'])
                    ->where('guard_name', $permission['guard_name'])
                    ->first();

                if (is_null($data)) {
                    Permission::create(['name' => $permission['name']]);
                    $roleSuperAdmin = Role::findByName('admin');
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
