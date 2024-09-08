<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserUpdateRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function listUsers()
    {
        $AuthUser = authenticated();
        $users = User::orderBy('created_at', 'asc')->get();
        return view('backend.user.user', [
            'users' => $users,
            'user' => $AuthUser,
        ]);
    }

    public function storeUser(StoreUserRequest $request)
    {
        $roleName = $request->input('role');
        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user = User::create($request->safe()->merge([
                'password' => Hash::make($request->input('password')),
            ])->all());

            $user->assignRole($role);
            // Assign all permissions associated with the role to the user
            $permissions = $role->permissions;
            foreach ($permissions as $permission) {
                $user->givePermissionTo($permission);
            }
        } else {
            toast()->error('Role not found.');
            return redirect()->back();
        }
        toast()->success('User created successfully');
        return redirect()->back();
    }

    public function updateUser(StoreUserUpdateRequest $request, $update)
    {
        $user = User::find($update);

        if (!$user) {
            toast()->error('User not found.');
            return redirect()->back();
        }

        $roleName = $request->input('role');
        $role = Role::where('name', $roleName)->first();

        if ($role) {
            $user->update($request->safe()->except(['password', 'role']));
            if ($request->input('password')) {
                $user->update([
                    'password' => Hash::make($request->input('password')),
                ]);
            }

            $user->syncRoles([$role]);
            // Sync all permissions associated with the role to the user
            $permissions = $role->permissions;
            $user->syncPermissions($permissions);
        } else {
            toast()->error('Role not found.');
            return redirect()->back();
        }

        toast()->success('User updated successfully');
        return redirect()->back();
    }

    public function destroyUser($user)
    {
        $user = User::find($user);

        if (!$user) {
            toast()->error('User not found.');
            return redirect()->back();
        }

        $user->delete();
        toast()->success('User deleted successfully');
        return redirect()->back();
    }
}
