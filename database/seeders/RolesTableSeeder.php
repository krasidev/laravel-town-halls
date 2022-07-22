<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'readonly' => 1
            ], [
                'name' => 'user',
                'readonly' => 1,
                'permissions' => [
                    // Town halls
                    'panel.town-halls.create'
                ]
            ]
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate([
                'name' => $role['name']
            ], [
                'readonly' => $role['readonly']
            ])->syncPermissions($role['permissions'] ?? []);
        }
    }
}
