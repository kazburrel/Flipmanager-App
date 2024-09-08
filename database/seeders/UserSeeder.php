<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Permission;
use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all permissions
        $permissions = Permission::all();

        // Check if permissions are fetched correctly
        if ($permissions->isEmpty()) {
            throw new \Exception('No permissions found. Ensure the PermissionSeeder is run before UserSeeder.');
        }

        // Create Admin user
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
        $adminUser->assignRole(RoleEnum::Admin->value); // Assign role

        // Assign Admin permissions to the created user
        $adminPermissions = Permission::whereIn('name', [
            PermissionEnum::ManageUsers->value,
            PermissionEnum::ManagePermissions->value,
            PermissionEnum::ManageCategories->value,
            PermissionEnum::ManageFiles->value,
            PermissionEnum::ViewFiles->value,
            PermissionEnum::UploadFiles->value,
            PermissionEnum::EditFiles->value,
            PermissionEnum::DeleteFiles->value,
        ])->get();
        $adminUser->permissions()->sync($adminPermissions->pluck('uuid'));

        // Create Editor user
        $editorUser = User::create([
            'id' => Str::uuid(),
            'fname' => 'Editor',
            'lname' => 'User',
            'username' => 'editor',
            'email' => 'editor@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $editorUser->assignRole(RoleEnum::Editor->value); // Assign role

        // Assign Editor permissions to the created user
        $editorPermissions = Permission::whereIn('name', [
            PermissionEnum::ViewFiles->value,
            PermissionEnum::UploadFiles->value,
            PermissionEnum::EditFiles->value,
            PermissionEnum::DeleteFiles->value,
        ])->get();
        $editorUser->permissions()->sync($editorPermissions->pluck('uuid'));

        // Create Regular user
        $regularUser = User::create([
            'id' => Str::uuid(),
            'fname' => 'Regular',
            'lname' => 'User',
            'username' => 'user',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $regularUser->assignRole(RoleEnum::User->value); // Assign role

        // Assign User permissions to the created user
        $userPermissions = Permission::whereIn('name', [
            PermissionEnum::ViewFiles->value,
        ])->get();
        $regularUser->permissions()->sync($userPermissions->pluck('uuid'));
    }
}
