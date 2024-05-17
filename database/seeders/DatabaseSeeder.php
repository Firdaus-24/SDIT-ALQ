<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(
            [
                RolePermissionSeeder::class,
                UserSeeder::class,
            ]
        );

        // Permission::create(['name' => 'tambah-user']);
        // Permission::create(['name' => 'edit-user']);
        // Permission::create(['name' => 'delete-user']);
        // Permission::create(['name' => 'lihat-user']);

        // Permission::create(['name' => 'tambah-guru']);
        // Permission::create(['name' => 'edit-guru']);
        // Permission::create(['name' => 'delete-guru']);
        // Permission::create(['name' => 'lihat-guru']);

        // Permission::create(['name' => 'tambah-jabatan']);
        // Permission::create(['name' => 'edit-jabatan']);
        // Permission::create(['name' => 'delete-jabatan']);
        // Permission::create(['name' => 'lihat-jabatan']);

        // Permission::create(['name' => 'tambah-siswa']);
        // Permission::create(['name' => 'edit-siswa']);
        // Permission::create(['name' => 'delete-siswa']);
        // Permission::create(['name' => 'lihat-siswa']);
        // Permission::create(['name' => 'kenaikan-kelas']);

        // Permission::create(['name' => 'tambah-kesalahan-siswa']);
        // Permission::create(['name' => 'edit-kesalahan-siswa']);
        // Permission::create(['name' => 'delete-kesalahan-siswa']);
        // Permission::create(['name' => 'lihat-kesalahan-siswa']);

        // Permission::create(['name' => 'tambah-detailkesalahan-siswa']);
        // Permission::create(['name' => 'edit-detailkesalahan-siswa']);
        // Permission::create(['name' => 'delete-detailkesalahan-siswa']);
        // Permission::create(['name' => 'lihat-detailkesalahan-siswa']);

        // Permission::create(['name' => 'tambah-prestasi-siswa']);
        // Permission::create(['name' => 'edit-prestasi-siswa']);
        // Permission::create(['name' => 'delete-prestasi-siswa']);
        // Permission::create(['name' => 'lihat-prestasi-siswa']);

        // Permission::create(['name' => 'tambah-detailprestasi-siswa']);
        // Permission::create(['name' => 'edit-detailprestasi-siswa']);
        // Permission::create(['name' => 'delete-detailprestasi-siswa']);
        // Permission::create(['name' => 'lihat-detailprestasi-siswa']);

        // Permission::create(['name' => 'tambah-keterlambatanguru']);
        // Permission::create(['name' => 'edit-keterlambatanguru']);
        // Permission::create(['name' => 'delete-keterlambatanguru']);
        // Permission::create(['name' => 'lihat-keterlambatanguru']);

        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'superadmin']);
        // Role::create(['name' => 'user']);

        // // admin
        // $roleAdmin = Role::findByName('admin');
        // $roleAdmin->givePermissionTo('tambah-user');
        // $roleAdmin->givePermissionTo('edit-user');
        // $roleAdmin->givePermissionTo('delete-user');
        // $roleAdmin->givePermissionTo('lihat-user');

        // $roleAdmin->givePermissionTo('tambah-guru');
        // $roleAdmin->givePermissionTo('edit-guru');
        // $roleAdmin->givePermissionTo('delete-guru');
        // $roleAdmin->givePermissionTo('lihat-guru');

        // $roleAdmin->givePermissionTo('tambah-jabatan');
        // $roleAdmin->givePermissionTo('edit-jabatan');
        // $roleAdmin->givePermissionTo('delete-jabatan');
        // $roleAdmin->givePermissionTo('lihat-jabatan');

        // $roleAdmin->givePermissionTo('tambah-siswa');
        // $roleAdmin->givePermissionTo('edit-siswa');
        // $roleAdmin->givePermissionTo('delete-siswa');
        // $roleAdmin->givePermissionTo('lihat-siswa');
        // $roleAdmin->givePermissionTo('kenaikan-kelas');

        // $roleAdmin->givePermissionTo('tambah-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('edit-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('delete-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('lihat-kesalahan-siswa');

        // $roleAdmin->givePermissionTo('tambah-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('edit-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('delete-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('lihat-detailkesalahan-siswa');

        // $roleAdmin->givePermissionTo('tambah-prestasi-siswa');
        // $roleAdmin->givePermissionTo('edit-prestasi-siswa');
        // $roleAdmin->givePermissionTo('delete-prestasi-siswa');
        // $roleAdmin->givePermissionTo('lihat-prestasi-siswa');

        // $roleAdmin->givePermissionTo('tambah-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('edit-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('delete-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('lihat-detailprestasi-siswa');

        // $roleAdmin->givePermissionTo('tambah-keterlambatanguru');
        // $roleAdmin->givePermissionTo('edit-keterlambatanguru');
        // $roleAdmin->givePermissionTo('delete-keterlambatanguru');
        // $roleAdmin->givePermissionTo('lihat-keterlambatanguru');

        // // superadmin
        // $roleAdmin = Role::findByName('superadmin');
        // $roleAdmin->givePermissionTo('tambah-user');
        // $roleAdmin->givePermissionTo('edit-user');
        // $roleAdmin->givePermissionTo('delete-user');
        // $roleAdmin->givePermissionTo('lihat-user');

        // $roleAdmin->givePermissionTo('tambah-guru');
        // $roleAdmin->givePermissionTo('edit-guru');
        // $roleAdmin->givePermissionTo('delete-guru');
        // $roleAdmin->givePermissionTo('lihat-guru');

        // $roleAdmin->givePermissionTo('tambah-jabatan');
        // $roleAdmin->givePermissionTo('edit-jabatan');
        // $roleAdmin->givePermissionTo('delete-jabatan');
        // $roleAdmin->givePermissionTo('lihat-jabatan');

        // $roleAdmin->givePermissionTo('tambah-siswa');
        // $roleAdmin->givePermissionTo('edit-siswa');
        // $roleAdmin->givePermissionTo('delete-siswa');
        // $roleAdmin->givePermissionTo('lihat-siswa');
        // $roleAdmin->givePermissionTo('kenaikan-kelas');

        // $roleAdmin->givePermissionTo('tambah-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('edit-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('delete-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('lihat-kesalahan-siswa');

        // $roleAdmin->givePermissionTo('tambah-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('edit-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('delete-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('lihat-detailkesalahan-siswa');

        // $roleAdmin->givePermissionTo('tambah-prestasi-siswa');
        // $roleAdmin->givePermissionTo('edit-prestasi-siswa');
        // $roleAdmin->givePermissionTo('delete-prestasi-siswa');
        // $roleAdmin->givePermissionTo('lihat-prestasi-siswa');

        // $roleAdmin->givePermissionTo('tambah-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('edit-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('delete-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('lihat-detailprestasi-siswa');

        // $roleAdmin->givePermissionTo('tambah-keterlambatanguru');
        // $roleAdmin->givePermissionTo('edit-keterlambatanguru');
        // $roleAdmin->givePermissionTo('delete-keterlambatanguru');
        // $roleAdmin->givePermissionTo('lihat-keterlambatanguru');

        // // user
        // $roleAdmin = Role::findByName('user');
        // $roleAdmin->givePermissionTo('tambah-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('edit-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('delete-kesalahan-siswa');
        // $roleAdmin->givePermissionTo('lihat-kesalahan-siswa');

        // $roleAdmin->givePermissionTo('tambah-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('edit-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('delete-detailkesalahan-siswa');
        // $roleAdmin->givePermissionTo('lihat-detailkesalahan-siswa');

        // $roleAdmin->givePermissionTo('tambah-prestasi-siswa');
        // $roleAdmin->givePermissionTo('edit-prestasi-siswa');
        // $roleAdmin->givePermissionTo('delete-prestasi-siswa');
        // $roleAdmin->givePermissionTo('lihat-prestasi-siswa');

        // $roleAdmin->givePermissionTo('tambah-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('edit-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('delete-detailprestasi-siswa');
        // $roleAdmin->givePermissionTo('lihat-detailprestasi-siswa');

        // $roleAdmin->givePermissionTo('tambah-keterlambatanguru');
        // $roleAdmin->givePermissionTo('edit-keterlambatanguru');
        // $roleAdmin->givePermissionTo('delete-keterlambatanguru');
        // $roleAdmin->givePermissionTo('lihat-keterlambatanguru');


        // $admin = User::create([
        //     'name' => 'admin',
        //     'uuid' => Str::uuid(),
        //     'email' => 'admin@test.com',
        //     'password' => bcrypt('12345678'),
        //     'is_active' => 1
        // ]);

        // $admin->assignRole('admin');

        // $admin = User::create([
        //     'name' => 'superadmin',
        //     'uuid' => Str::uuid(),
        //     'email' => 'superadmin@test.com',
        //     'password' => bcrypt('12345678'),
        //     'is_active' => 1
        // ]);

        // $admin->assignRole('superadmin');

        // $admin = User::create([
        //     'name' => 'radikasadewa',
        //     'uuid' => Str::uuid(),
        //     'email' => 'radikasadewa@test.com',
        //     'password' => bcrypt('12345678'),
        //     'is_active' => 1
        // ]);

        // $admin->assignRole('user');
    }
}
