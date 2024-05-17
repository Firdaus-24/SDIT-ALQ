<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $permissions = [
                'role-list',
                'role-create',
                'role-update',

                'permission-list',
                'permission-create',
                'permission-update',
                'permission-delete',

                'user-list',
                'user-create',
                'user-update',
                'user-delete',
            ];
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }

            $role_superadmin = Role::whereName('superadmin')->first();
            $role_superadmin->givePermissionTo($permissions);

            $superadmin = User::create([
                'name' => 'superadmin',
                'uuid' => Str::uuid(),
                'email' => 'superadmin@test.com',
                'password' => bcrypt('12345678'),
                'is_active' => 1
            ]);

            $superadmin->assignRole('superadmin');

            // $admin = User::create([
            //     'name' => 'admin',
            //     'uuid' => Str::uuid(),
            //     'email' => 'admin@test.com',
            //     'password' => bcrypt('12345678')
            // ]);

            // $admin->assignRole('admin');


            // $user = User::create([
            //     'name' => 'ujang',
            //     'uuid' => Str::uuid(),
            //     'email' => 'ujang@test.com',
            //     'password' => bcrypt('12345678')
            // ]);

            // $user->assignRole('user');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
