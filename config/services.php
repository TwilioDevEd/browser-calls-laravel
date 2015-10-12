<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'twilio' => [
        'accountSid' => env('TWILIO_ACCOUNT_SID'),
        'authToken' => env('TWILIO_AUTH_TOKEN'),
        'applicationSid' => env('TWILIO_APPLICATION_SID'),
        'number' => env('TWILIO_NUMBER'),
    ],
];
