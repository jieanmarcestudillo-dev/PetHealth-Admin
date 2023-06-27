<?php

return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],


    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'adminModel' => [
            'driver' => 'session',
            'provider' => 'adminModel',
        ],

        'completedModel' => [
            'driver' => 'session',
            'provider' => 'completedModel',
        ],

        'appointmentModel' => [
            'driver' => 'session',
            'provider' => 'appointmentModel',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'adminModel' => [
            'driver' => 'eloquent',
            'model' => App\Models\adminModel::class
        ],

        'completedModel' => [
            'driver' => 'eloquent',
            'model' => App\Models\completedModel::class
        ],

        'appointmentModel' => [
            'driver' => 'eloquent',
            'model' => App\Models\appointmentModel::class
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],


    'password_timeout' => 10800,
];
