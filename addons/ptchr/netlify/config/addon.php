<?php

return [
    'netlify' => [
        'token' => env('NETLIFY_ACCESS_TOKEN'),
        'site' => env('NETLIFY_SITE'),
        'build_hook' => env('NETLIFY_BUILD_HOOK')
    ],
];
