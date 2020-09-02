<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $breadcrumb = array('Role Management', 'Roles', 'Roles list');
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles', 'breadcrumb'));
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

        return redirect()->route('roles.index')->with(['success' => 'Role berhasil ditambahkan']);
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->with(['success' => 'Role Berhasil dihapus']);
    }
}
