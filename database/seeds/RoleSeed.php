<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array('admin', 'owner', 'employee');
        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role]);
        }
    }
}
