<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create konsumen']);
        Permission::create(['name' => 'read konsumen']);
        Permission::create(['name' => 'edit konsumen']);
        Permission::create(['name' => 'delete konsumen']);

        Permission::create(['name' => 'create produk']);
        Permission::create(['name' => 'read produk']);
        Permission::create(['name' => 'edit produk']);
        Permission::create(['name' => 'delete produk']);

        Permission::create(['name' => 'create relationship']);
        Permission::create(['name' => 'read relationship']);
        Permission::create(['name' => 'edit relationship']);
        Permission::create(['name' => 'delete relationship']);

        Permission::create(['name' => 'create mapping']);
        Permission::create(['name' => 'read mapping']);
        Permission::create(['name' => 'edit mapping']);
        Permission::create(['name' => 'delete mapping']);

        Permission::create(['name' => 'create penetrasi']);
        Permission::create(['name' => 'read penetrasi']);
        Permission::create(['name' => 'edit penetrasi']);
        Permission::create(['name' => 'delete penetrasi']);

        Permission::create(['name' => 'create plantest']);
        Permission::create(['name' => 'read plantest']);
        Permission::create(['name' => 'edit plantest']);
        Permission::create(['name' => 'delete plantest']);

        Permission::create(['name' => 'create quatation']);
        Permission::create(['name' => 'read quatation']);
        Permission::create(['name' => 'edit quatation']);
        Permission::create(['name' => 'delete quatation']);

        Permission::create(['name' => 'create deals']);
        Permission::create(['name' => 'read deals']);
        Permission::create(['name' => 'edit deals']);
        Permission::create(['name' => 'delete deals']);

        Permission::create(['name' => 'create supply']);
        Permission::create(['name' => 'read supply']);
        Permission::create(['name' => 'edit supply']);
        Permission::create(['name' => 'delete supply']);

        Permission::create(['name' => 'create kunjungan marketing']);
        Permission::create(['name' => 'read kunjungan marketing']);
        Permission::create(['name' => 'edit kunjungan marketing']);
        Permission::create(['name' => 'delete kunjungan marketing']);

        Permission::create(['name' => 'create introduction']);
        Permission::create(['name' => 'read introduction']);
        Permission::create(['name' => 'edit introduction']);
        Permission::create(['name' => 'delete introduction']);

        Permission::create(['name' => 'create jartest']);
        Permission::create(['name' => 'read jartest']);
        Permission::create(['name' => 'edit jartest']);
        Permission::create(['name' => 'delete jartest']);

        Permission::create(['name' => 'create presentasi']);
        Permission::create(['name' => 'read presentasi']);
        Permission::create(['name' => 'edit presentasi']);
        Permission::create(['name' => 'delete presentasi']);

        Permission::create(['name' => 'create kunjungan teknisi']);
        Permission::create(['name' => 'read kunjungan teknisi']);
        Permission::create(['name' => 'edit kunjungan teknisi']);
        Permission::create(['name' => 'delete kunjungan teknisi']);

        Permission::create(['name' => 'create kondisi']);
        Permission::create(['name' => 'read kondisi']);
        Permission::create(['name' => 'edit kondisi']);
        Permission::create(['name' => 'delete kondisi']);

        Permission::create(['name' => 'create role user']);
        Permission::create(['name' => 'read role user']);
        Permission::create(['name' => 'edit role user']);
        Permission::create(['name' => 'delete role user']);

        Permission::create(['name' => 'create permission user']);
        Permission::create(['name' => 'read permission user']);
        Permission::create(['name' => 'edit permission user']);
        Permission::create(['name' => 'delete permission user']);

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
    }
}
