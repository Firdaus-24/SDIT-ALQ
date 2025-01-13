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
                'roles.list',
                'roles.create',
                'roles.update',
                'roles.delete',

                'user.list',
                'user.create',
                'user.edit',
                'user.delete',
            ];
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }

            $role_superadmin = Role::whereName('admin')->first();
            $role_superadmin->givePermissionTo($permissions);

            $superadmin = User::create([
                'name' => 'admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('12345678'),
            ]);

            $superadmin->assignRole('admin');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }
}
