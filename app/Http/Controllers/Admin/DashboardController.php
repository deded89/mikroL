<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rolesCount = Role::count();
        $permissionsCount = Permission::count();
        $usersCount = User::count();
        $thisWeekUserCount = User::RegThisWeek()->count();
        return view('admin.dashboard', compact('rolesCount', 'permissionsCount', 'usersCount', 'thisWeekUserCount'));
    }
}
