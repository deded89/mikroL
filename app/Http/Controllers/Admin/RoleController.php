<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ], [
            'unique' => 'Role tersebut sudah ada',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.roles.index')->with(['success' => 'Role berhasil ditambahkan']);
    }

    public function show($id)
    {
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.roles.index')->with(['success' => 'Role Berhasil dihapus']);
    }

    public function rolePermissions($id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('admin.roles.rolePermissions', compact('permissions', 'role'));
    }

    public function assignPermissions(Request $request, $id)
    {
        $role = Role::find($id);

        $rolePermissions = $request->permissions;

        if ($rolePermissions) {
            $role->syncPermissions($rolePermissions);
        } else {
            $rolePermissions = $role->getPermissionNames();
            foreach ($rolePermissions as $permission) {
                $role->revokePermissionTo($permission);
            }
        }

        return redirect()->route('admin.roles.index')->with(['success' => 'Roles Permission assigned successfully']);
    }
}
