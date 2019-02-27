<?php

return [
    'route' => '/docs',

    'docs' => [
        // Storage path of docs files.
        'path'  => '/resource/docs',

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
    ],

    'cache' => [
        'ttl' => 300, // seconds
    ],
];
