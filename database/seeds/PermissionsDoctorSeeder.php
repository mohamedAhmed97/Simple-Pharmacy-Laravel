<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['guard_name' => 'doctors','name' => 'add doctor']);
        Permission::create(['guard_name' => 'doctors','name' => 'delete doctor']);
        Permission::create(['guard_name' => 'doctors','name' => 'edit doctor']);
        Permission::create(['guard_name' => 'doctors','name' => 'show doctors']);
        //pharmacy owner
        // create roles and assign existing permissions
        $role1 = Role::create(['guard_name' => 'doctors','name' => 'pharmacy owner']);
        $role1->givePermissionTo('add doctor');
        $role1->givePermissionTo('delete doctor');
        $role1->givePermissionTo('edit doctor');
        $role1->givePermissionTo('show doctors');
    }
}
