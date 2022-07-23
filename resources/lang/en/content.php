<?php

return [
    'panel' => [
        'profile' => [
            'labels' => [
                'name' => 'Name',
                'email' => 'E-Mail Address',
                'password' => 'Password',
                'password_confirmation' => 'Confirm Password'
            ],
            'buttons' => [
                'edit' => 'Update'
            ]
        ],
        'town-halls' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'abbreviation' => 'Abbreviation',
                    'ekatte_num' => 'Ekatte Num',
                    'name' => 'Name',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'abbreviation' => 'Abbreviation',
                'ekatte_num' => 'Ekatte Num',
                'name' => 'Name'
            ],
            'buttons' => [
                'create' => 'Create',
                'edit' => 'Update',
                'destroy' => 'Delete'
            ]
        ],
        'users' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Name',
                    'email' => 'E-Mail Address',
                    'role' => 'Role',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'name' => 'Name',
                'email' => 'E-Mail Address',
                'password' => 'Password',
                'password_confirmation' => 'Confirm Password',
                'role' => 'Role'
            ],
            'buttons' => [
                'create' => 'Create',
                'edit' => 'Update',
                'destroy' => 'Delete'
            ]
        ],
        'roles' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Role',
                    'guard_name' => 'Guard Name',
                    'readonly' => 'Readonly',
                    'created_at' => 'Created At',
                    'updated_at' => 'Updated At',
                    'actions' => 'Actions'
                ]
            ],
            'labels' => [
                'name' => 'Role',
                'guard_name' => 'Guard Name',
                'readonly' => 'Readonly'
            ],
            'legends' => [
                'permissions' => 'Permissions'
            ],
            'buttons' => [
                'create' => 'Create',
                'edit' => 'Update',
                'destroy' => 'Delete'
            ]
        ]
    ]
];
