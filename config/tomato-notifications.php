<?php

use App\Models\User;

return [
    'name' => 'Notifications',

    'types' => [
        [
            "name" => "Alert",
            "id" => "alert",
            "color" => "#fff",
            "icon" => "bx bxs-user"
        ],
        [
            "name" => "Info",
            "id" => "info",
            "color" => "#fff",
            "icon" => "bx bxs-user"
        ],
        [
            "name" => "Danger",
            "id" => "danger",
            "color" => "#fff",
            "icon" => "bx bxs-user"
        ],
        [
            "name" => "Success",
            "id" => "success",
            "color" => "#fff",
            "icon" => "bx bxs-user"
        ],
        [
            "name" => "Warring",
            "id" => "warring",
            "color" => "#fff",
            "icon" => "bx bxs-user"
        ],
    ],

    'provider' => "pusher",

    'models' => [
        "Admins" => User::class,
    ],

    'providers' => [
        [
            "name" =>'Email',
            "id" => "email"
        ],
        [
            "name" =>'Slack',
            "id" => "slack",
        ],
        [
            "name" => 'Discord',
            "id" => "discord"
        ],
        [
            "name" => 'FCM Web',
            "id" => "fcm-web"
        ],
        [
            "name" => 'FCM Mobile',
            "id" => "fcm-api"
        ],
        [
            "name" => 'Pusher Web',
            "id" => "pusher-web"
        ],
        [
            "name" => 'Pusher Mobile',
            "id" => "pusher-api"
        ],
        [
            "name" => 'SMS MessageBird',
            "id" => "sms-messagebird"
        ]
    ],

    "lang" => [
        "ar" => "arabic",
        "en" => "english"
    ]
];
