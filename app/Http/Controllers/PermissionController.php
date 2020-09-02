<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $breadcrumb = array('Permission Management', 'Permissions', 'Permissions list');
        $permissions = Permission::paginate(10);
        return view('admin.permissions.index', compact('permissions', 'breadcrumb'));
    }

    public function store(Request $request)
    {
        $rules = ([
            'name' => 'required|unique:permissions'
        ]);
        $message = ([
            'unique' => 'Permission allready exist.'
        ]);
        $this->validate($request, $rules, $message);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permissions.index')->with(['success' => 'New Permission Saved Succesfully.']);
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with(['success' => 'Permission deleted succesfully.']);
    }
}
