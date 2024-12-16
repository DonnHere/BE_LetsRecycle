<?php
return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // Izinkan asal dari frontend
    'allowed_origins' => ['http://localhost:5173'],

    // Jika ingin mengizinkan semua origin (tidak disarankan untuk produksi):
    // 'allowed_origins' => ['*'],

    'allowed_methods' => ['*'], // Izinkan semua metode (GET, POST, PUT, DELETE, dll.)
    'allowed_headers' => ['*'], // Izinkan semua header

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // Jika menggunakan cookie atau autentikasi berbasis sesi
];

