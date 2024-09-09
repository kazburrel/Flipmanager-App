<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function managePermissions($user)
    {
        $user = User::find($user);
        if (!$user) {
            toast()->error('User not found.');
            return redirect()->back();
        }

        $permissions = Permission::all();
        $userPermissions = $user->getAllPermissions();
        return view('backend.user.permissions', [
            'permissions' => $permissions,
            'userPermissions' => $userPermissions,
            'user' => $user,
            'title' => 'Permissions Matrix'
        ]);
    }

    public function updatePermission(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            toast()->error('User not found.');
            return redirect()->back();
        }

        $permissions = $request->input('permissions', []);
        $roles = $request->input('roles', []);

        // Update permissions
        foreach ($permissions as $permissionUuid => $value) {
            $permission = Permission::where('uuid', $permissionUuid)->first();

            if (!$permission) {
                toast()->error('Permission not found.');
                continue;
            }

            if ($value === 'true') {
                $user->givePermissionTo($permission);
            } elseif ($value === 'false') {
                $user->revokePermissionTo($permission);
            }
        }

        // Update roles
        foreach ($roles as $role => $value) {
            if (!RoleEnum::tryFrom($role)) {
                toast()->error('Role not found.');
                continue;
            }

            if ($value === 'true') {
                $user->assignRole($role);
            } elseif ($value === 'false') {
                $user->removeRole($role);
            }
        }

        toast()->success('Permissions and roles updated successfully.');
        return redirect()->back();
    }
}
