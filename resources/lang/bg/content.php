<?php

return [
    'panel' => [
        'profile' => [
            'labels' => [
                'name' => 'Име',
                'email' => 'Имейл адрес',
                'password' => 'Парола',
                'password_confirmation' => 'Потвърди парола',
                'role' => 'Роля'
            ],
            'buttons' => [
                'edit' => 'Актуализирай'
            ]
        ],
        'town-halls' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'abbreviation' => 'Съкращение',
                    'ekatte_num' => 'Ekatte Номер',
                    'name' => 'Име',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'abbreviation' => 'Съкращение',
                'ekatte_num' => 'Ekatte Номер',
                'name' => 'Име'
            ],
            'buttons' => [
                'create' => 'Добави',
                'edit' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ],
        'users' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Име',
                    'email' => 'Имейл адрес',
                    'role' => 'Роля',
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'name' => 'Име',
                'email' => 'Имейл адрес',
                'password' => 'Парола',
                'password_confirmation' => 'Потвърди парола',
                'role' => 'Роля'
            ],
            'buttons' => [
                'create' => 'Добави',
                'edit' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ],
        'roles' => [
            'table' => [
                'headers' => [
                    'id' => 'ID',
                    'name' => 'Роля',
                    'guard_name' => 'Guard Name',
                    'readonly' => 'Само за четене',
                    'created_at' => 'Добавен',
                    'updated_at' => 'Обновен',
                    'actions' => 'Действия'
                ]
            ],
            'labels' => [
                'name' => 'Роля',
                'guard_name' => 'Guard Name',
                'readonly' => 'Само за четене'
            ],
            'legends' => [
                'permissions' => 'Разрешения'
            ],
            'buttons' => [
                'create' => 'Добави',
                'edit' => 'Обнови',
                'destroy' => 'Изтрий'
            ]
        ]
    ]
];
