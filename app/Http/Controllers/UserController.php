<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUsers()
    {
        $AuthUser = Auth::user();
        $users = User::all();
        // dd($users);
        return view('backend.user.user', [
            'users' => $users,
            'user' => $AuthUser,
        ]);
    }

    public function storeUser(Request $request)
    {
        dd($request->all());
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|unique|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('users.list')->with('success', 'User created successfully.');
    }

    public function managePermissions($user)
    {
        dd($user);
        return view('backend.user.permissions');
    }
}
