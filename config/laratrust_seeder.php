<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'dashboard' => 'i',
            'roles' => 'i,sh,s,u,a,d',
            'users' => 'i,sh,s,u,a,d',
        ],
        'admin' => [
            'users' => 'i,sh,s,u,d,a',
        ],
    ],

    'permissions_map' => [
        'i' => 'index',
        's' => 'store',
        'u' => 'update',
        'd' => 'destroy',
        'a' => 'active',
        'sh' => 'show',
    ],
];
