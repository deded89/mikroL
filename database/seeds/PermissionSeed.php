<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeed extends Seeder
{
    private $models = array('customer', 'unit', 'service');
    private $perms = array('create', 'view', 'update', 'delete');
    public function run()
    {
        foreach ($this->models as $model) {
            foreach ($this->perms as $perm) {
                Permission::updateOrCreate(['name' => $model . '_' . $perm]);
            }
        }

        // assign all permission to admin
        $permissions = Permission::all();
        $role = Role::findByName('admin');
        $role->syncPermissions($permissions);
    }
}
