<?php

return [
    'redis_client'      => env('REDIS_CLIENT'),
    'redis_host'        => env('REDIS_HOST'),
    'redis_password'    => env('REDIS_PASSWORD'),
    'redis_port'        => env('REDIS_PORT'),

    'file_upload_dir'   => public_path('/admin/product/'),
];
