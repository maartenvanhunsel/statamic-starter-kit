<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    |
    | Whether the API should be enabled, and through what route. You
    | can enable or disable the whole API, and expose individual
    | resources per environment, depending on your site needs.
    |
    | https://statamic.dev/content-api#enable-the-api
    |
    */

    'enabled' => env('STATAMIC_API_ENABLED', false),

    'resources' => [
        'collections' => [
            '*' => [
                'allowed_filters' => ['url', 'date'], // Enabled for all collections
            ],
            'pages' => [
                // 'allowed_filters' => ['title']
            ],
            'demo' => true, // Delete me when customizing.
            'demo_blog' => true // Delete me when customizing.
        ],
        'navs' => true,
        'taxonomies' => true,
        'assets' => false,
        'globals' => true,
        'forms' => true,
        'users' => false,
    ],

    'route' => env('STATAMIC_API_ROUTE', 'api'),

    /*
    |--------------------------------------------------------------------------
    | Middleware & Authentication
    |--------------------------------------------------------------------------
    |
    | Define the middleware / middleware group that will be applied to the
    | API route group. If you want to externally expose this API, here
    | you can configure a middleware based authentication layer.
    |
    */

    'middleware' => env('STATAMIC_API_MIDDLEWARE', 'api'),

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    |
    | The numbers of items to show on each paginated page.
    |
    */

    'pagination_size' => 50,

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | By default, Statamic will cache each endpoint until the specified
    | expiry, or until content is changed. See the documentation for
    | more details on how to customize your cache implementation.
    |
    | https://statamic.dev/content-api#caching
    |
    */

    'cache' => [
        'expiry' => 60,
        /**
         * `true`|`null` = enabled using DefaultCacher, `false` = disabled
         * @see ApiCacheManager::getDefaultDriver()
         */
        'class' => env('STATAMIC_API_CACHE', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclude Keys
    |--------------------------------------------------------------------------
    |
    | Here you may provide an array of keys to be excluded from API responses.
    | For example, you may want to hide things like edit_url, api_url, etc.
    |
    */

    'excluded_keys' => [
        //
    ],

];
