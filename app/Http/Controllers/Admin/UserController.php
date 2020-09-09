<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = user::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new user();
        $roles = Role::all();
        $state = 'create';
        $disabled = "";
        return view('admin.users.createOrEdit', compact('user', 'roles', 'state', 'disabled'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole($request->roles);
        return redirect()->route('admin.users.index')->with(['success' => 'New User created succesfully']);
    }

    public function editRoles($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRoles = $user->getRoleNames();
        $state = 'edit';
        $disabled = 'disabled';
        return view('admin.users.createOrEdit', compact('user', 'roles', 'userRoles', 'state', 'disabled'));
    }

    public function updateRoles(Request $request, $id)
    {
        $user = User::find($id);
        $roles = $request->roles;
        if ($roles) {
            $user->syncRoles($roles);
        } else {
            $existRoles = $user->getRoleNames();
            foreach ($existRoles as $role) {
                $user->removeRole($role);
            };
        };
        return redirect()->route('admin.users.index')->with(['success' => 'Roles updated succesfully']);
    }

    public function userPermissions($id)
    {
        $permissions = Permission::all();
        $user = User::find($id);
        return view('admin.users.userPermissions', compact('permissions', 'user'));
    }

    public function assignPermissions(Request $request, $id)
    {
        $user = User::find($id);
        $permissions = $request->permissions;
        if ($permissions) {
            $user->syncPermissions($permissions);
        } else {
            $existPermissions = $user->getDirectPermissions();
            foreach ($existPermissions as $permission) {
                $user->revokePermissionTo($permission->name);
            }
        }

        return redirect()->route('admin.users.index')->with(['success' => 'Permission assigned succesfully']);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with(['success' => 'User deleted succesfully']);
    }
}
