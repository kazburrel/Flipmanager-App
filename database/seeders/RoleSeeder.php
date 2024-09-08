<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Enums\RoleEnum;
use App\Enums\PermissionEnum;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        foreach (PermissionEnum::cases() as $permission) {
            Permission::firstOrCreate([
                'name' => $permission->value,
            ]);
        }

        // Create roles and assign permissions
        $admin = Role::firstOrCreate(['name' => RoleEnum::Admin->value]);
        $editor = Role::firstOrCreate(['name' => RoleEnum::Editor->value]);
        $user = Role::firstOrCreate(['name' => RoleEnum::User->value]);

        // Assign permissions to Admin
        $admin->syncPermissions(Permission::all());

        // Assign specific permissions to Editor
        $editor->syncPermissions([
            PermissionEnum::UploadFiles->value,
            PermissionEnum::ViewFiles->value,
            PermissionEnum::EditFiles->value,
            PermissionEnum::DeleteFiles->value
        ]);

        // Assign specific permissions to User
        $user->syncPermissions([
            PermissionEnum::ViewFiles->value
        ]);
    }
}
