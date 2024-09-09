<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

class DashboardController extends Controller
{
    // Admin Dashboard
    public function adminDashboard()
    {
        $user = authenticated();
        $totalCategories = Category::count();
        $totalSubCategories = Subcategory::count();
        $totalUsers = User::count();
        $adminCount = User::role('admin')->count();
        $editorCount = User::role('editor')->count();
        $userCount = User::role('user')->count();

        return view('backend.dashboards.admin', [
            'title' => 'Admin Dashboard',
            'user' => $user,
            'totalCategories' => $totalCategories,
            'totalSubCategories' => $totalSubCategories,
            'totalUsers' => $totalUsers,
            'adminCount' => $adminCount,
            'editorCount' => $editorCount,
            'userCount' => $userCount,
        ]);
    }

    // Editor Dashboard
    public function editorDashboard()
    {
        $user = authenticated();
        // $totalFilesUploaded = $user->files()->count();

        return view('backend.dashboards.editor', [
            'title' => 'Editor Dashboard',
            'user' => $user,
            // 'totalFilesUploaded' => $totalFilesUploaded,
        ]);
    }

    // User Dashboard
    public function userDashboard()
    {
        $user = authenticated();
        return view('backend.dashboards.user', [
            'title' => 'User Dashboard',
            'user' => $user,
        ]);
    }
}
