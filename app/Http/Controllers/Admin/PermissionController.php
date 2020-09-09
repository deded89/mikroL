<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin.permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $rules = ([
            'name' => 'required|unique:permissions'
        ]);
        $message = ([
            'unique' => 'Permission allready exist.'
        ]);
        $request->validate($rules, $message);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('admin.permissions.index')->with(['success' => 'New Permission Saved Succesfully.']);
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('admin.permissions.index')->with(['success' => 'Permission deleted succesfully.']);
    }
}
