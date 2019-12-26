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

        'client_id' => '620669027594-bqanl6gtjehktjg7gu2gbqifemuk054o.apps.googleusercontent.com',

        'client_secret' => 'doPfZCUeJTp-Y7maoKKXRLsR',

        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',

    ],

    'twitter' => [

     'client_id' => 'SW2nK6mLfGcIUuT2oyupqU602',
     'client_secret' => 'hxFCKLCekdsTALDCoNGfB9K6JeI34qCwvxEaRNaFgCoECzF9aL',
     'redirect' => 'http://127.0.0.1:8000/auth/twitter/callback',
 ],

    'facebook' => [

        'client_id' => ' ',

        'client_secret' => ' ',

        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback',

    ],

];
