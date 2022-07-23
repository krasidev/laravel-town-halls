<?php

namespace App\Repository\Panel;

use App\Models\Role;
use LazyElePHPant\Repository\Repository;

class RoleRepository extends Repository
{
    public function model()
    {
        return Role::class;
    }

    public function data($data)
    {
		$roles = $this->getModel()
            ->select('roles.*');

        $datatable = datatables()->eloquent($roles);

        $datatable->editColumn('readonly', function($role) {
            return view('panel.roles.table.table-readonly', compact('role'));
		});

        $datatable->addColumn('actions', function($role) {
			return view('panel.roles.table.table-actions', compact('role'));
		});

        return $datatable->make(true);
    }

    public function create($data)
    {
        $role = $this->getModel()->create([
            'name' => $data['name']
        ]);

        $role->syncPermissions($data['permissions'] ?? []);

        return $role;
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        $role = $this->getModel()->findOrFail($id);

        if ($role->readonly == 0) {
            $role->update([
                'name' => $data['name']
            ]);

            $role->syncPermissions($data['permissions'] ?? []);
        }

        return $role;
    }

    public function delete($id)
    {
        if ($this->getModel()->where('id', $id)->where('readonly', 0)->exists()) {
            return $this->getModel()->destroy($id);
        }
    }
}
