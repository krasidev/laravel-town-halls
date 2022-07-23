<?php

namespace App\Repository\Panel;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LazyElePHPant\Repository\Repository;

class ProfileRepository extends Repository
{
    public function model()
    {
        return User::class;
    }

    public function update(array $data, $id, $attribute = 'id')
    {
		if (isset($data['password'])) {
			$data['password'] = Hash::make($data['password']);
		} else {
			unset($data['password']);
		}

        $profile = $this->getModel()->findOrFail($id);

        $profile->update($data);

        $profile->syncRoles([$data['role']]);

        return $profile;
    }
}
