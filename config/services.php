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

    'facebook' => [
        'client_id' => '436139907275094',
        'client_secret' => '5bd37c852fb5db863d2d825f16436d37',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '7572260509-ojhs1188ar2efjd3u0k3u3t3iaoq1mip.apps.googleusercontent.com',
        'client_secret' => 'PeEMgs_dS4ILUBMOnnvZuxKv',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'twitter' => [
        'client_id' => 'cG2HxUyyyX3FjySQYNf5FMKYw',
        'client_secret' => 'DKkSJPZkfQeo64uzF9DGYhdqB6YuZaoJxiVe0m9RsxOW4nyXm4',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ]




];
