<?php

return [
    'api_url' => env('API_URL', 'http://api.lpt.test'),
    'http' => [
        'timeout' => env('HTTP_TIMEOUT', 10),
    ],
    'links' => [
        'storage' => [
            'path' => 'links_cover_images',
        ],
        'cover_image' => [
            'size' => [
                'w' => 368,
                'h' => 256,
            ],
            'format' => 'jpeg',
            'quality' => 90,
        ],
    ],
];
