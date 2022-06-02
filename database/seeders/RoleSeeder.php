<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    protected $roles = [
        'Authenticated',
        'Board',
        'CoCo',
        'FoodCo',
    ];

    /**
     * Run the database seeds.
     * You can run this seeder again, and it will only create new roles
     *
     * @return void
     */
    public function run()
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Create each role if it does not exist yet
        foreach ($this->roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}