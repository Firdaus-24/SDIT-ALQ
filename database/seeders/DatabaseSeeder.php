<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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

        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'lihat-user']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'users']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('delete-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $roleAdmin = Role::findByName('superadmin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('delete-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $admin = User::create([
            'name' => 'admin',
            'uuid' => Str::uuid(),
            'email' => 'admin@test.com',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'superadmin',
            'uuid' => Str::uuid(),
            'email' => 'superadmin@test.com',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('superadmin');

        $admin = User::create([
            'name' => 'ujang',
            'uuid' => Str::uuid(),
            'email' => 'ujang@test.com',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('users');


        Jabatan::factory(100)->create();
    }
}
