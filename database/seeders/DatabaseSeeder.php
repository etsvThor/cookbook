<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Only add production seeders here
    protected $seeds = [
        RoleSeeder::class,
        PermissionSeeder::class,
        UnitSeeder::class,
    ];

    /**
     * Seed the application's database.
     * https://laravel.com/docs/9.x/authorization#via-middleware
     * @return void
     */
    public function run()
    {
        foreach ($this->seeds as $seed) {
            $this->call($seed);
        }
    }
}