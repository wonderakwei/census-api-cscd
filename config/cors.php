<?php
return [

    'paths' => ['api/*'],  // Apply CORS to all API routes

    'allowed_methods' => ['*'],  // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)

    'allowed_origins' => ['*'],  // Allow all origins (use specific origins in production for security)

    'allowed_headers' => ['*'],  // Allow all headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
