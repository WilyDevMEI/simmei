<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' =>  'super_admin']);
        Role::create(['name' =>  'admin']);
        Role::create(['name' =>  'directur']);
        Role::create(['name' =>  'manager']);
        Role::create(['name' =>  'marketing']);
        Role::create(['name' =>  'technician']);
        Role::create(['name' =>  'auditor']);

        $role = Role::findById(1);
        $role->givePermissionTo(Permission::all());
    }
}
