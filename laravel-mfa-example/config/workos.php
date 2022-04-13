<?php

use WorkOS\Laravel\WorkOSServiceProvider;

//update based on the API Secret Key & the client ID in the WorkOS Developer Dashboard in .env
return [
    // WorkOS API Key
    'api_key' => env('WORKOS_API_KEY'),

    // WorkOS Client ID
    'client_id' => env('WORKOS_CLIENT_ID'),
];