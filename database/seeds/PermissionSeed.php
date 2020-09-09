<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeed extends Seeder
{
    private $adminModels = array('role', 'permission', 'user');
    private $userModels = array('customer', 'unit', 'service');
    private $perms = array('create', 'view', 'update', 'delete');
    public function run()
    {
        foreach ($this->adminModels as $model) {
            foreach ($this->perms as $perm) {
                Permission::updateOrCreate(['name' => $model . '_' . $perm]);
            }
        }
        // assign all permission to admin
        $permissions = Permission::all();
        $role = Role::findByName('admin');
        $role->syncPermissions($permissions);

        foreach ($this->userModels as $model) {
            foreach ($this->perms as $perm) {
                Permission::updateOrCreate(['name' => $model . '_' . $perm]);
            }
        }
    }
}
