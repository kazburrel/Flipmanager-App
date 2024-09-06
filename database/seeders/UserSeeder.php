<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Enums\RoleEnum;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'id' => Str::uuid(),
            'fname' => 'Admin',
            'lname' => 'User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign Admin role to the created user
        $adminRole = Role::where('name', RoleEnum::Admin->value)->first();
        if ($adminRole) {
            $adminUser->assignRole($adminRole);

            // Assign all permissions to the Admin user
            $permissions = Permission::all();
            foreach ($permissions as $permission) {
                $adminUser->givePermissionTo($permission);
            }
        }
    }
}
