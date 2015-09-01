<?php

return [

    'twilio' => [

        'default' => 'twilio',

        'connections' => [

            'twilio' => [

                /*
                |--------------------------------------------------------------------------
                | SID
                |--------------------------------------------------------------------------
                |
                | Your Twilio Account SID #
                |
                */

                'sid' => env('TWILIO_SID', '123'),

                /*
                |--------------------------------------------------------------------------
                | Access Token
                |--------------------------------------------------------------------------
                |
                | Access token that can be found in your Twilio dashboard
                |
                */

                'token' => env('TWILIO_TOKEN', '123'),

                /*
                |--------------------------------------------------------------------------
                | From Number
                |--------------------------------------------------------------------------
                |
                | The Phone number registered with Twilio that your SMS & Calls will come from
                |
                */

                'from' => env('TWILIO_FROM', '123'),

                /*
                |--------------------------------------------------------------------------
                | Verify Twilio's SSL Certificates
                |--------------------------------------------------------------------------
                |
                | Allows the client to bypass verifiying Twilio's SSL certificates.
                | It is STRONGLY advised to leave this set to true for production environments.
                |
                */

                'ssl_verify' => env('TWILIO_SSL', '123'),

            ],
        ],
    ],
];
