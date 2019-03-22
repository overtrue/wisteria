<?php

return [
    'route' => '/docs',

    'docs' => [
        // Storage path of docs files.
        'path'  => '/resources/docs',

        // Index page file.
        'index' => 'README.md',

        // Homepage
        'home'  => 'overview.md',

        // Versions
        'versions' => [
            '1.0',
        ],
        'default_version' => '1.0',

        // Docs repository
        'repository' => [
            'provider' => 'github',
            'url' => 'https://github.com/overtrue/wisteria',
        ],
    ],

    // UI settings
    'ui' => [
        'logo' => 'vendor/wisteria/img/logo.svg',
        'nav-links' => [
            //  [
            //      'url' => '/',
            //      'label' => 'Home',
            //      'target' => '_self',
            //  ],
        ],
    ],

    // SEO configs
    'seo' => [
        'author' => 'Wisteria',
        'description' => '',
        'keywords' => '',
        'og' => [
            'title' => '',
            'type' => 'article',
            'url' => '',
            'image' => '',
            'description' => '',
        ],
    ],

    'plugins' => [
        'google-analytics' => [
            // 'id' => 'UA-XXXXXXXX-1'
        ],

        // Algolia Docsearch
        'docsearch' => [
            //'api_key' => '',
            //'index_name' => '',
            //'placeholder' => 'Search',
        ],
    ],

    'cache' => [
        'ttl' => 300, // seconds
    ],
];
