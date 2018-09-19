<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '702023563499057',         // Your Facebook Client ID
    'client_secret' => 'c2917e3db81af35c1d4351ed40c595c4', // Your Facebook Client Secret
    'redirect' => 'https://task.loc/login/facebook/callback',
    ],

    'google' => [
    'client_id' => '1014581757287-7u99078aan7nak93phdpeg9f75kqg7l5.apps.googleusercontent.com',         // Your Google Client ID
    'client_secret' => 'sawFb1ZFvXMXl13mJ-bnqNSh', // Your Google Client Secret
    'redirect' => 'https://task.loc/login/google/callback',
    ],

];
