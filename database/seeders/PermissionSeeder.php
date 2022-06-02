<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;


class PermissionSeeder extends Seeder
{
    // Admin roles will get every permission
    protected $admins = ['CoCo'];

    // Name, roles (besides admin roles)
    protected $permissions = [
        'view-admin-panel' => ['FoodCo', 'Board'],

        'recipes.viewAny' => [],
        'recipes.create' => ['Authenticated'],
        'recipes.update' => ['FoodCo', 'Board'],
        'recipes.delete' => ['FoodCo', 'Board'],
        'recipes.restore' => ['FoodCo', 'Board'],
        'recipes.forceDelete' => [],

        'groups.viewAny' => [],
        'groups.create' => ['Authenticated'],
        'groups.update' => ['FoodCo', 'Board'],
        'groups.delete' => ['FoodCo', 'Board'],
        'groups.restore' => ['FoodCo', 'Board'],
        'groups.forceDelete' => [],
    ];

    /**
     * Run the database seeds.
     * You can run this seeder again, and it will only create the new permissions and assign new roles
     *
     * @return void
     */
    public function run()
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach ($this->permissions as $newPermission => $roles) {
            $permission = Permission::firstOrCreate(['name' => $newPermission]);

            // Assign roles to the permission (does not do anything if the role is already assigned to the permission)
            foreach (array_merge($roles, $this->admins) as $role) {
                $permission->assignRole(Role::findByName($role));
            }
        }
    }
}