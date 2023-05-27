<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'administrator']);
        $sales = Role::create(['name' => 'sales']);
        $store = Role::create(['name' => 'store']);
        $guest = Role::create(['name' => 'guest']);

        Permission::create(['name' => 'administration.index'])->syncRoles([$admin, $sales, $store, $guest]);
        Permission::create(['name' => 'administration.user'])->syncRoles([$admin]);
        Permission::create(['name' => 'administration.users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'administration.users.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'administration.users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'administration.users.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'administration.users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'administration.users.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'administration.users.edit'])->syncRoles([$admin]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'phone' => '+53 11111111',
            'password' => bcrypt('password'),
            'active' => '1',
        ])->assignRole('administrator');
        User::create([
            'name' => 'Sales',
            'email' => 'sales@gmail.com',
            'phone' => '+53 22222222',
            'password' => bcrypt('password'),
            'active' => '1',
        ])->assignRole('sales');
        User::create([
            'name' => 'Store',
            'email' => 'store@gmail.com',
            'phone' => '+53 33333333',
            'password' => bcrypt('password'),
            'active' => '1',
        ])->assignRole('store');
        User::create([
            'name' => 'Guest',
            'email' => 'guest@gmail.com',
            'phone' => '+53 44444444',
            'password' => bcrypt('password'),
            'active' => '1',
        ])->assignRole('guest');
        Location::create([
            'name' => 'Proveedores',
            'description' => 'Proveedores de servicios',
            'address' => 'Dirección variadas',
            'code' => '00000001',
            'latitude' => '00000001',
            'longitude' => '00000001',
        ]);
        location::create([
            'name' => 'Merma',
            'description' => 'Ubicaciones para merma',
            'address' => 'Dirección variadas',
            'code' => '00000002',
            'latitude' => '00000002',
            'longitude' => '00000002',
        ]);
        location::create([
            'name' => 'Almacen1',
            'description' => 'Almacen 1',
            'address' => 'Dirección variadas',
            'code' => '00000003',
            'latitude' => '00000003',
            'longitude' => '00000003',
        ]);
        location::create([
            'name' => 'Tienda1',
            'description' => 'Tienda1',
            'address' => 'Dirección variadas',
            'code' => '00000004',
            'latitude' => '00000004',
            'longitude' => '00000004',
        ]);
        location::create([
            'name' => 'Cliente',
            'description' => 'Cliente',
            'address' => 'Cliente',
            'code' => '00000005',
            'latitude' => '00000005',
            'longitude' => '00000005',
        ]);
        Employee::create([
            'name' => 'Proveedor',
            'email' => 'proveedor@proveedor.cu',
            'phone' => '00000000',
            'salary' => '0',
            'active' => '1',
        ]);
        employee::create([
            'name' => 'Almacenero',
            'email' => 'almacenero@proveedor.cu',
            'phone' => '00000001',
            'salary' => '0',
            'active' => '1',
        ]);
        employee::create([
            'name' => 'Cliente',
            'email' => 'cliente@proveedor.cu',
            'phone' => '00000002',
            'salary' => '0',
            'active' => '1',
        ]);
        employee::create([
            'name' => 'Dependiente1',
            'email' => 'dependiente1@proveedor.cu',
            'phone' => '00000002',
            'salary' => '0',
            'active' => '1',
        ]);
        employee::create([
            'name' => 'Dependiente2',
            'email' => 'dependiente2@proveedor.cu',
            'phone' => '00000002',
            'salary' => '0',
            'active' => '1',
        ]);
        \App\Models\User::factory(10)->create();
        //\App\Models\location::factory(5)->create();
        \App\Models\product::factory(10)->create();
        \App\Models\employee::factory(20)->create();
    }
}
