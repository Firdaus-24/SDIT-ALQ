<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
