<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Admin Dashboard
    public function adminDashboard()
    {
        $user = authenticated();
        return view('backend.dashboards.admin', [
            'title' => 'Admin Dashboard',
            'user' => $user,
            // Add any other data you may want to pass to the view
        ]);
    }

    // Editor Dashboard
    public function editorDashboard()
    {
        return view('dashboards.editor', [
            'title' => 'Editor Dashboard',
            // Add any other data you may want to pass to the view
        ]);
    }

    // User Dashboard
    public function userDashboard()
    {
        return view('dashboards.user', [
            'title' => 'User Dashboard',
            // Add any other data you may want to pass to the view
        ]);
    }
}
