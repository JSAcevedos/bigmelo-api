<?php

return [
    'chat_gpt' => [
        'api_key' => env('CHATGPT_API_KEY'),
    ],
    'twilio' => [
        'sid'   => env('TWILIO_SID'),
        'token' => env('TWILIO_TOKEN'),
    ],
    'message' => [
        'no_available_messages'                     => env('NO_AVILABLE_MESSAGES', 'Ha excedido el límite de mensajes o su límite es cero.'),
        'no_available_messages_unregistered_user'   => env('NO_AVILABLE_MESSAGES_UNREGISTERED_USER', 'No tienes mas mensajes disponibles, para seguir disfrutando de Bigmelo registrate en bigmelo.com/#register'),
        'wrong_media_type'                          => 'El archivo adjunto no se puede procesar',
        'validation_code_message'                   => env('VALIDATION_CODE_MESSAGE', 'Tu código de validación de Bigmelo es: '),
        'not_registered_user_message_limit'         => env('NOT_REGISTERED_USER_MESSAGE_LIMIT', 5),
        'registered_user_message_limit'             => env('REGISTERED_USER_FREE_MESSAGES', 3),
    ],
    'client' => [
        'url' => env('CLIENT_URL'),
    ],
    'mail' => [
        'from_address'              => env('MAIL_FROM_ADDRESS'),
        'from_name'                 => env('MAIL_FROM_NAME'),
        'notification_addresses'    => env('NOTIFICATION_EMAIL_ADDRESSES'),
    ],
];
