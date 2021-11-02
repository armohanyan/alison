<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '450986371291-gg0tn2ma941id9d9ud3duehcimjmuhis.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://alison-app-main.herokuapp.com/callback/google',
    ],

    'facebook' => [
        'client_id' => '1203357340173808',
        'client_secret' => '666e226fcf5c47362ac29f19b71718b9',
        'redirect' => 'https://alison-app-main.herokuapp.com/callback/facebook',
    ],

    'linkedin' => [
        'client_id' => '77q9k92xpgmu64',
        'client_secret' => 'J7xgpyX09Z53qotj',
        'redirect' => 'https://alison-app-main.herokuapp.com/callback/linkedin'
    ],
];

