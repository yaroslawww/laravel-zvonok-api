<?php

return [
    'api_key' => env('ZVONOKCOM_API_KEY'),

    'api_url' => env('ZVONOKCOM_API_URL', 'https://zvonok.com/manager/cabapi_external/api/v1/'),

    // @see http://docs.guzzlephp.org/
    'guzzle_config' => [
        // You can set any number of default request options.
        'timeout'  => env('ZVONOKCOM_REQUEST_TIMEOUT', 5.0),
    ],

];
