<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Town halls
            'panel.town-halls.create',
            'panel.town-halls.edit',
            'panel.town-halls.destroy',
            // Users
            'panel.users.index',
            'panel.users.create',
            'panel.users.edit',
            'panel.users.destroy',
            // Roles
            'panel.roles.index',
            'panel.roles.create',
            'panel.roles.edit',
            'panel.roles.destroy'
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission
            ]);
        }
    }
}
