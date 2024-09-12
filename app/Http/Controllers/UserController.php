<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function listUsers()
    {
        $AuthUser = authenticated();
        $users = User::orderBy('created_at', 'asc')->get();
        return view('backend.user.user', [
            'users' => $users,
            'user' => $AuthUser,
            'title' => 'User Manager'
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

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return view('backend.profile_management.edit', [
            'title' => 'Edit Profile',
            'user' => $request->user(),
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'username' => [
                'nullable',
                'string',
                'max:255',
                'in:' . $request->user()->username,
                'unique:users,username,' . $request->user()->id
            ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
        ], [
            'username.required' => 'The username field is required.',
            'username.string' => 'The username must be a string.',
            'username.max' => 'The username may not be greater than 255 characters.',
            'username.in' => 'The username must match your current username.',
            'username.unique' => 'The username has already been taken.',
        ]);

        $user = $request->user();
        $user->fill($request->only(['fname', 'lname', 'email']));
        $user->save();
        toast()->success('Profile updated successfully');
        return redirect()->back();
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'The current password field is required.',
            'current_password.string' => 'The current password must be a string.',
            'current_password.min' => 'The current password must be at least 8 characters.',
            'new_password.required' => 'The new password field is required.',
            'new_password.string' => 'The new password must be a string.',
            'new_password.min' => 'The new password must be at least 8 characters.',
            'new_password.confirmed' => 'The new password confirmation does not match.',
        ]);

        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        if ($request->new_password !== $request->new_password_confirmation) {
            return back()->withErrors(['new_password' => 'The new password confirmation does not match.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        toast()->success('Password updated successfully');
        return redirect()->back();
    }
}
